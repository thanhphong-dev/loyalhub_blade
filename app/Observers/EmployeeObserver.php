<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\CreateEmployeeNotification;
use Illuminate\Support\Str;

class EmployeeObserver
{
    protected static $plainPassword;

    public function creating(User $user)
    {
        $plainPassword       = Str::random(10);
        self::$plainPassword = $plainPassword;

        $user->password = $plainPassword;
        $user->uuid     = Str::uuid();
    }

    public function created(User $user)
    {
        $user->notify(new CreateEmployeeNotification(self::$plainPassword));
    }
}
