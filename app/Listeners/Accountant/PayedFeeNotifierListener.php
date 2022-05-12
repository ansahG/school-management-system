<?php

namespace App\Listeners\Accountant;
use App\Mail\Accountant\schoolFeeReceiptMail;
use App\Events\Accountant\PayedFeeNotifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class PayedFeeNotifierListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Accountant\PayedFeeNotifier  $event
     * @return void
     */
    public function handle(PayedFeeNotifier $event)
    {
       Mail::to($event->data['guardianMail'])->send(new schoolFeeReceiptMail($event->data));
    }
}
