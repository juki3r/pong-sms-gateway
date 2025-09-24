<?php


namespace App\Console\Commands;

use Log;
use App\Models\Message;
use Illuminate\Console\Command;

class RefundFailedMessages extends Command
{
    // Command signature
    protected $signature = 'messages:refund-failed';

    // Description
    protected $description = 'Refund SMS credits for failed messages every minute';

    public function handle()
    {
        $failedMessages = Message::where('status', 'failed')
            ->where('refunded', false)
            ->get();

        foreach ($failedMessages as $msg) {
            $user = $msg->user;
            if ($user) {
                $user->increment('sms_credits');
                $msg->refunded = true;
                $msg->save();

                Log::info("Refunded message ID {$msg->id} for user {$user->id}");
            }
        }

        $this->info('Failed messages refunded successfully.');
        \Log::info('Refund command run at ' . now());
    }
}
