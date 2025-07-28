<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LaravelWakeUp\FilterSort\Traits\FilterTrait;

class User extends Authenticatable
{
    use FilterTrait, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'frist_name',
        'last_name',
        'avatar_url',
        'email',
        'password',
        'role_id',
        'phone_number',
        'address',
    ];

    protected array $allowedFilters = ['frist_name', 'last_name', 'email', 'phone_number', 'address'];

    protected array $multiColumnSearch = [
        'search_field' => 'search',
        'fields'       => [
            'frist_name'   => 'like',
            'last_name'    => 'like',
            'email'        => 'like',
            'phone_number' => 'like',
            'address'      => 'like',
        ],
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return $this->frist_name.' '.$this->last_name;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function hasPermission($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('slug', $permission)->count() > 0) {
                return true;
            }
        }

        return false;
    }
}
