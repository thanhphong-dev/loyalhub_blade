<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class Task extends Model
{
    use FilterTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'assigned_staff_id',
        'customer_ids',
        'pregress',
        'employee_id',
        'status',
        'description',
        'status_customer',
    ];

    protected $casts = [
        'customer_ids' => 'array',
    ];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'title' => 'like',
            // 'description' => 'like',
        ],
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function assignedStaff()
    {
        return $this->belongsTo(User::class, 'assigned_staff_id');
    }
}
