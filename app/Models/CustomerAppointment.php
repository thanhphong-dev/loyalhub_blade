<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class CustomerAppointment extends Model
{
    use FilterTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'customer_id',
    ];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'customer.fullname'     => 'like',
            'customer.email'        => 'like',
            'customer.website'      => 'like',
            'customer.address'      => 'like',
            'customer.phone_number' => 'like',
        ],
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function scopeFilter($query, $request)
    {
        $search = $request->input('search');

        if ($search) {
            $query->whereHas('customer', function ($cq) use ($search) {
                $cq->where('email', 'like', "%{$search}%")
                    ->orWhere('fullname', 'like', "%{$search}%")
                    ->orWhere('website', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        return $query;
    }
}
