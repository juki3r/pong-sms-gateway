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
        Message::where('status', 'failed')
            ->where('refunded', false)
            ->each(function ($msg) {
                $user = $msg->user;
                if ($user) {
                    $user->increment('sms_credits');
                    $msg->update(['refunded' => true]);
                }
            });


        // foreach ($failedMessages as $msg) {
        //     $user = $msg->user;
        //     if ($user) {
        //         $user->increment('sms_credits');
        //         $msg->refunded = true;
        //         $msg->save();
        //     }
        // }

        $this->info('Failed messages refunded successfully.');
    }
}
