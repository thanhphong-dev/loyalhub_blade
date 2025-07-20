<?php

use App\Models\User;
use App\Notifications\CreateEmployeeNotification;
use Illuminate\Support\Str;

class EmployeeObserver
{
    public function creating(User $user)
    {
        $plainPassword = Str::random(10);

        $user->password = bcrypt($plainPassword); // mã hóa
        $user->plain_password = $plainPassword;   // giữ tạm để dùng ở created()
        $user->uuid = Str::uuid();
    }

    public function created(User $user)
    {
        $user->notify(new CreateEmployeeNotification($user->plain_password));

    }
}
