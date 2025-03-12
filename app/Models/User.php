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

    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'salt',
        'role'
    ];

    protected $hidden = [
        'password_hash',
        'salt',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $rememberTokenName = 'token';

    // Tokenok kapcsolata
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public static function hashPasswordWithSalt(string $password): array
{
    // Generálunk egy véletlenszerű salt-ot
    $salt = random_bytes(16);
    $salt_base64 = base64_encode($salt);

    // Használjuk a Laravel Hash osztályát az Argon2id hash-eléshez
    $hash = password_hash($password . $salt_base64, PASSWORD_ARGON2ID);

    return [
        'password_hash' => $hash,
        'salt' => $salt_base64
    ];
}

    // Remember token lekérése
    public function getRememberToken()
    {
        return $this->tokens()
            ->where('expiry_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->value('token');
    }

    // Remember token beállítása
    public function setRememberToken($value)
    {
        // Töröljük a felhasználó összes korábbi remember tokenét
        $this->deleteRememberToken();

        // Létrehozunk egy új tokent
        $this->tokens()->create([
            'device' => 0, // Asztali eszköz
            'token' => $value,
            'expiry_date' => now()->addDays(7) // 7 napos érvényesség
        ]);
    }

    // Remember token törlése
    public function deleteRememberToken()
    {
        return $this->tokens()
            ->where('device', 0)
            ->delete();
    }

    // Remember token neve
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    // Jogosultságok ellenőrzése a panelhez
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin(); // Csak adminok férhetnek hozzá
    }

    // Admin jogosultság ellenőrzése
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
