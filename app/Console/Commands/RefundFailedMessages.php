<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;

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
            $user = $msg->user_id;
            if ($user) {
                $user->increment('sms_credits');
                $msg->refunded = true;
                $msg->save();
            }
        }

        $this->info('Failed messages refunded successfully.');
    }
}
