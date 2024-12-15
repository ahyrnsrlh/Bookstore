<?php

namespace App\Listeners;

use App\Events\TransactionUpdated as TransactionUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionUpdated
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
     * @param  TransactionUpdated  $event
     * @return void
     */
    public function handle(TransactionUpdatedEvent $event)
    {
        $transaction = $event->transaction;

        if ($transaction->payment_status && $transaction->status === 'confirmed') {
            foreach ($transaction->books as $book) {
                $book->decrement('stock');
            }
        }
    }
}
