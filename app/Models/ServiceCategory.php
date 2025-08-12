<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class ServiceCategory extends Model
{
    use FilterTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    protected array $allowedFilters = ['name', 'description'];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'name'        => 'like',
            'description' => 'like',
        ],
    ];
}
