<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Api;

class ClearTelegramQueues extends Command
{
    protected $signature = 'telegram:clear-queues';
    protected $description = 'Clear all updates in the /getUpdates queue by resetting the offset';

    public function handle()
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $this->info("Clearing all message queues...");

        // Get the latest update ID and set the new offset to skip all previous updates
        $updates = $telegram->getUpdates(['timeout' => 0, 'offset' => -1]);

        // Check if there are any updates
        if (count($updates) > 0) {
            // Get the last update ID
            $lastUpdate = end($updates);
            $offset = $lastUpdate['update_id'] + 1; // Skip all updates before the last one

            // Set the new offset to start from the next update
            file_put_contents(storage_path('telegram_offset.txt'), $offset);

            $this->info("Queues cleared successfully. New offset is $offset.");
        } else {
            $this->info("No updates found to clear.");
        }
    }
}