from telegram import Update, InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import (
    ApplicationBuilder, CommandHandler, CallbackQueryHandler,
    MessageHandler, filters, ContextTypes
)
import requests

# State tracking per user
user_states = {}

# Constants
LODGING = 'lodging'
TRACKING = 'tracking'
LISTING = 'listing'

# Start command handler
async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    keyboard = [[
        InlineKeyboardButton("Complaint", callback_data='lodge'),
        InlineKeyboardButton("Track", callback_data='track'),
        InlineKeyboardButton("List Complaints", callback_data='list')
    ]]
    reply_markup = InlineKeyboardMarkup(keyboard)
    await update.message.reply_text('Choose an option:', reply_markup=reply_markup)

# Button click handler
async def button(update: Update, context: ContextTypes.DEFAULT_TYPE):
    query = update.callback_query
    user_id = query.from_user.id
    await query.answer()

    data = query.data
    if data == 'lodge':
        user_states[user_id] = LODGING
        await context.bot.send_message(
            chat_id=user_id,
            text="You selected 'Lodge a Complaint'. Please type your complaint details below or send an image."
        )
    elif data == 'track':
        user_states[user_id] = TRACKING
        await context.bot.send_message(
            chat_id=user_id,
            text="You selected 'Track your Complaint'. Please enter your tracking ID."
        )
    elif data == 'list':
        user_states[user_id] = LISTING
        await context.bot.send_message(
            chat_id=user_id,
            text="You selected 'List of Complaints'. Fetching your complaint list..."
        )

# Message handler
async def handle_message(update: Update, context: ContextTypes.DEFAULT_TYPE):
    user_id = update.message.from_user.id
    text = update.message.text
    photo = update.message.photo
    state = user_states.get(user_id)

    if text and text.lower() == '/exit':
        user_states.pop(user_id, None)
        await update.message.reply_text("Session reset. Send /start to begin again.")
        return

    if state == LODGING:
        if photo:
            file = await context.bot.get_file(photo[-1].file_id)
            file_path = await file.download_to_drive()
            with open(file_path, 'rb') as img:
                try:
                    res = requests.post('http://localhost:8000/api/upload-complaint', files={'image': img})
                    await update.message.reply_text("Complaint image submitted successfully!")
                except Exception as e:
                    await update.message.reply_text("Image upload failed: " + str(e))
        elif text:
            try:
                res = requests.post('http://localhost:8000/api/complaint', json={'text': text})
                await update.message.reply_text("Complaint submitted: " + text)
            except Exception as e:
                await update.message.reply_text("Error submitting complaint: " + str(e))

    elif state == TRACKING and text:
        try:
            complaint_id = str(text).strip()
            res = requests.post(f'http://localhost:8000/api/complaint/track/{complaint_id}')
            data = res.json()

            message_lines = [f"{key.replace('_', ' ').title()}: {value}" for key, value in data.items()]
            message = "\n".join(message_lines)

            if len(message) <= 4096:
                await update.message.reply_text(f"Tracking result:\n{message}")
            else:
                await update.message.reply_text("Tracking result (split):")
                for i in range(0, len(message), 4096):
                    await update.message.reply_text(message[i:i+4096])
        except Exception as e:
            await update.message.reply_text("Error tracking complaint: " + str(e))

    elif state == LISTING:
        try:
            res = requests.get('http://localhost:8000/api/list-complaints')
            await update.message.reply_text("Complaint List:\n" + res.text)
        except Exception as e:
            await update.message.reply_text("Error fetching complaints: " + str(e))

    else:
        await update.message.reply_text("Please select an option using /start.")

# Run the bot
if __name__ == '__main__':
    app = ApplicationBuilder().token("7780265531:AAFqrbp0_mzyuhbZpfCKZmii6MaZe0r1PNg").build()

    app.add_handler(CommandHandler("start", start))
    app.add_handler(CallbackQueryHandler(button))
    app.add_handler(MessageHandler(filters.TEXT | filters.PHOTO, handle_message))

    print("Bot is running...")
    app.run_polling()