<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;
    use HasRoles;
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
//         Allow only users with role "super-admin"
//        return true;
//        $user->role->name;
        return in_array($this->role_id, [1, 2]);
    }

    public function favoriteBooks(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(favorate_books::class);
    }
    public function user(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Roles::class);
    }
    public function role(): User|\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }

    public function myBooks(): User|\Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(My_book::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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
}
