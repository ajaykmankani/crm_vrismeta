<?php

namespace App\Observers;

use App\Events\LogActivity;
use App\Models\User;
use App\Notifications\MyNotification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $users = User::all();

        foreach ($users as $user1) {
            $user1->notify(new MyNotification($user, 'created'));
        }


        $by_user = auth()->user();


        $activity = "User " . $user->name . " registered.";
        event(new LogActivity($by_user, $activity));
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $by_user = auth()->user();
        $activity = $user->name . " updated.";
        event(new LogActivity($by_user, $activity));
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $users = User::all();

        foreach ($users as $user1) {
            $user1->notify(new MyNotification($user, 'deleted'));
        }
        $by_user = auth()->user();
        $activity = $user->name . " deleted.";
        event(new LogActivity($by_user, $activity));
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
