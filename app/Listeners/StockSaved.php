<?php

namespace App\Listeners;

use App\Events\StockSaved as StockSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StockSaved
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
     * @param  StockSavedEvent  $event
     * @return void
     */
    public function handle(StockSavedEvent $event)
    {
        $stock = $event->stock;
        $book = $stock->book;

        $stock->type === 'in' ? $book->increment('stock', $stock->total) : $book->decrement('stock', $stock->total);
    }
}
