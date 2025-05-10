<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Api;

class TelegramBotRunner extends Command
{
    protected $signature = 'telegram:run';
    protected $description = 'Run Telegram polling in the background';

    public function handle()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $offset = 649168852;

        $this->info("Telegram polling started...");

        // Temporary file to track user state (for simplicity, you can store this in a database or cache)
        $userStateFile = storage_path('user_state.json');
        $userState = file_exists($userStateFile) ? json_decode(file_get_contents($userStateFile), true) : [];

        while (true) {
            // Fetch updates
            $updates = $telegram->getUpdates([
                'timeout' => 0
            ]);

            foreach ($updates as $update) {
                if (!isset($update['message'])) continue;

                $message = $update['message'];
                $chatId = $message['chat']['id'];
                $text = $message['text'] ?? '';

                // Check if user has previously clicked a button
                if (isset($userState[$chatId])) {
                    $currentState = $userState[$chatId];
                } else {
                    $currentState = 'new'; // Default state when user hasn't clicked any button yet
                }

                // Handle /hello command
                if (strtolower($text) === '/hello' && $currentState === 'new') {
                    $telegram->sendMessage([
                        'chat_id' => $chatId,
                        'text' => 'Hello! 👋 Please choose an option below:',
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [
                                    ['text' => 'Lodge a Complaint', 'callback_data' => 'lodge_complaint'],
                                    ['text' => 'Track your Complaint', 'callback_data' => 'track_complaint'],
                                    ['text' => 'List of Complaints', 'callback_data' => 'list_complaints'],
                                ],
                            ],
                        ]),
                    ]);
                }

                // Process callback queries (button clicks)
                $callbackQueries = $telegram->getUpdates(['offset' => $offset + 1]);
                foreach ($callbackQueries as $callbackQuery) {
                    if (isset($callbackQuery['callback_query'])) {
                        $callbackData = $callbackQuery['callback_query']['data'];
                        $callbackChatId = $callbackQuery['callback_query']['message']['chat']['id'];

                        switch ($callbackData) {
                            case 'lodge_complaint':
                                // Check if the user has already been prompted to lodge a complaint
                                if ($currentState !== 'lodge_complaint') {
                                    // Update user state to lodge_complaint
                                    $userState[$callbackChatId] = 'lodge_complaint';

                                    // Send the prompt only once
                                    $telegram->sendMessage([
                                        'chat_id' => $callbackChatId,
                                        'text' => 'You selected "Lodge a Complaint". Please type your complaint details below.',
                                    ]);
                                }
                                break;

                            case 'track_complaint':
                                // Track complaint
                                $telegram->sendMessage([
                                    'chat_id' => $callbackChatId,
                                    'text' => 'You selected "Track your Complaint". Please provide your complaint ID.',
                                ]);
                                break;

                            case 'list_complaints':
                                // List complaints (replace with actual logic)
                                $telegram->sendMessage([
                                    'chat_id' => $callbackChatId,
                                    'text' => 'Here is the list of your complaints:\n1. Complaint 1\n2. Complaint 2\n3. Complaint 3',
                                ]);
                                break;

                            default:
                                $telegram->sendMessage([
                                    'chat_id' => $callbackChatId,
                                    'text' => 'Invalid selection.',
                                ]);
                                break;
                        }

                        // Acknowledge the callback query to remove the "loading" state on the button
                        $telegram->answerCallbackQuery([
                            'callback_query_id' => $callbackQuery['callback_query']['id'],
                        ]);
                    }
                }

                // Update the offset to avoid processing the same update multiple times
                $offset = $update['update_id'];
            }

            // Save user state after processing updates
            file_put_contents($userStateFile, json_encode($userState));

            // Small delay to avoid hitting Telegram API rate limits
            usleep(500000); // 0.5 second sleep
        }
    }
}