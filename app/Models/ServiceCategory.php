<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class ServiceCategory extends Model
{
    use FilterTrait, HasFactory;

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
