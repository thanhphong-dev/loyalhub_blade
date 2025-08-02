<?php

namespace App\Models;

use App\Enums\ServiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class Service extends Model
{
    use FilterTrait, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
        'category_id',
    ];

    protected array $allowedFilters = ['name', 'price', 'description'];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'name'        => 'like',
            'price'       => 'like',
            'description' => 'like',
        ],
    ];

    protected $casts = [
        'status' => ServiceStatus::class,
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
