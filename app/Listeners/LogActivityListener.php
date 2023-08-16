<?php

namespace App\Listeners;

use App\Events\LogActivity;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogActivityListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  LogActivity  $event
     * @return void
     */
    public function handle(LogActivity $event)
    {
        $user = $event->user;
        $activity = $event->activity;

        // Create a new activity log entry
        ActivityLog::create([
            'user_id' => $user->id,
            'activity_description' => $activity,
        ]);
    }
}