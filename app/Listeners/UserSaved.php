<?php

namespace App\Listeners;

use App\Events\UserSaved as UserSavedEvent;
use App\Models\DetailUser;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserSaved
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
     * @param  UserSaved  $event
     * @return void
     */
    public function handle(UserSavedEvent $event)
    {
        $user = $event->user;

        $user->sendEmailVerificationNotification();
        
        DetailUser::create(['user_id' => $user->id]);
    }
}
