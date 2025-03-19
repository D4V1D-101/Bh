<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ROLES =
    [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_USER => 'User',
    ];
    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'role'
    ];

    protected $hidden = [
        'password_hash',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $rememberTokenName = 'token';


    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public static function hashPasswordWithSalt(string $password): array
    {

        $salt = random_bytes(16);


        $options = [
            'memory_cost' => 65536,
            'time_cost' => 4,
            'threads' => 1,
        ];


        $hash = password_hash($password, PASSWORD_ARGON2ID, $options);

        return [
            'password_hash' => $hash,

        ];
    }

    public static function verifyPassword(string $password, string $storedHash): bool
    {


        return password_verify($password, $storedHash);
    }


    public function getRememberToken()
    {
        return $this->tokens()
            ->where('expiry_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->value('token');
    }


    public function setRememberToken($value)
    {

        $this->deleteRememberToken();


        $this->tokens()->create([
            'device' => 0,
            'token' => $value,
            'expiry_date' => now()->addDays(7)
        ]);
    }


    public function deleteRememberToken()
    {
        return $this->tokens()
            ->where('device', 0)
            ->delete();
    }


    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin();
    }


    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
