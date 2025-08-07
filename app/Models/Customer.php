<?php

namespace App\Models;

use App\Enums\CustomerSource;
use App\Enums\CustomerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class Customer extends Model
{
    use FilterTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'logo',
        'uuid',
        'fullname',
        'email',
        'phone_number',
        'website',
        'address',
        'service_id',
        'source',
        'status',
        'assigned_staff_id',
        'user_create',
        'file',
    ];

    protected $casts = [
        'source' => CustomerSource::class,
        'status' => CustomerStatus::class,
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'user_create');
    }

    public function assignedStaff()
    {
        return $this->belongsTo(User::class, 'assigned_staff_id');
    }
}
