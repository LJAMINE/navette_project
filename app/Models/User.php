<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'adress',
        'role_id',
        'status'
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
            'password' => 'hashed',
        ];
    }

    public function announce()
    {
        return $this->hasMany(Announce::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }




    public function hasRole($role)
    {
        return $this->role_id == $role;
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission){
        return $this->role->permissions->contains('name', $permission);

    }
}
