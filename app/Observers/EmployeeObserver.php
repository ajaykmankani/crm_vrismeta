<?php

namespace App\Observers;

use App\Events\LogActivity;
use App\Models\User;
use App\Models\Employee;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        $user = auth()->user();
        $activity = "employee " . $employee->fname . " Created.";
        event(new LogActivity($user, $activity));
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        $user = auth()->user();
        $activity = "employee " . $employee->fname . " Updated.";
        event(new LogActivity($user, $activity));
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        $user = auth()->user();
        $activity = "employee " . $employee->fname . " Deleted.";
        event(new LogActivity($user, $activity));
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}
