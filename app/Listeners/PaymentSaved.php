<?php

namespace App\Listeners;

use App\Events\PaymentSaved as PaymentSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentSaved
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
     * @param  PaymentSaved  $event
     * @return void
     */
    public function handle(PaymentSavedEvent $event)
    {
        $transaction = $event->payment->transaction;
        $transaction->payment_status = 1;
        $transaction->save();
    }
}
