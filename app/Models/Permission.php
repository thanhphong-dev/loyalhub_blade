<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class Permission extends Model
{
    use FilterTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
