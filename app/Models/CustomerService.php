<?php

namespace App\Models;

use App\Enums\CustomerStatusPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class CustomerService extends Model
{
    use FilterTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'start_date',
        'end_date',
        'payment_method',
        'note',
        'total_paid',
        'status_payment',
    ];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'customer.fullname'     => 'like',
            'customer.email'        => 'like',
            'customer.phone_number' => 'like',
        ],
    ];

    protected $casts = [
        'status_payment' => CustomerStatusPayment::class,
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
                    ->orWhere('website', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        return $query;
    }
}
