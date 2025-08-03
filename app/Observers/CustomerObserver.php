<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerObserver
{
    public function creating(Customer $customer)
    {
        $customer->uuid        = Str::uuid();
        $customer->user_create = auth()->user()->id;
    }
}
