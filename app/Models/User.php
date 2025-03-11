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

        // Az Argon2id paraméterek
        $memory_cost = 65536; // 64 MB
        $time_cost = 4;
        $threads = 8;

        // Használjuk a sodium könyvtárat az Argon2id hash-eléshez
        if (function_exists('sodium_crypto_pwhash')) {
            $hash = sodium_crypto_pwhash(
                32, // 32 bájt hosszú hash
                $password,
                $salt,
                SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE, // időköltség
                SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE, // memóriaköltség
                SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13 // algoritmus
            );

            $hash_base64 = base64_encode($hash);

            return [
                'password_hash' => $hash_base64,
                'salt' => $salt_base64
            ];
        }
        // Alternatív megoldás, ha a sodium nem elérhető
        else {
            // Konkatenáljuk a salt-ot és a jelszót
            $combined = $salt . $password;

            // Használjuk a PHP beépített hash függvényét
            $hash = hash('sha256', $combined, true);

            // Erősítsük meg többszöri hash-eléssel (PBKDF2-szerű megközelítés)
            for ($i = 0; $i < 10000; $i++) {
                $hash = hash('sha256', $hash . $combined, true);
            }

            $hash_base64 = base64_encode($hash);

            return [
                'password_hash' => $hash_base64,
                'salt' => $salt_base64
            ];
        }
    }

    // Jelszó ellenőrzés a tárolt hash és salt alapján
    public static function verifyPassword(string $password, string $storedHash, string $storedSalt): bool
    {
        try {
            // Dekódoljuk a base64 értékeket
            $salt = base64_decode($storedSalt);
            $stored_hash_bin = base64_decode($storedHash);

            // Használjuk a sodium könyvtárat az Argon2id hash-eléshez
            if (function_exists('sodium_crypto_pwhash')) {
                $calculated_hash = sodium_crypto_pwhash(
                    32, // 32 bájt hosszú hash
                    $password,
                    $salt,
                    SODIUM_CRYPTO_PWHASH_OPSLIMIT_MODERATE, // időköltség
                    SODIUM_CRYPTO_PWHASH_MEMLIMIT_MODERATE, // memóriaköltség
                    SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13 // algoritmus
                );

                return hash_equals($stored_hash_bin, $calculated_hash);
            }
            // Alternatív megoldás, ha a sodium nem elérhető
            else {
                // Konkatenáljuk a salt-ot és a jelszót
                $combined = $salt . $password;

                // Használjuk a PHP beépített hash függvényét
                $hash = hash('sha256', $combined, true);

                // Erősítsük meg többszöri hash-eléssel (PBKDF2-szerű megközelítés)
                for ($i = 0; $i < 10000; $i++) {
                    $hash = hash('sha256', $hash . $combined, true);
                }

                return hash_equals($stored_hash_bin, $hash);
            }
        } catch (\Exception $e) {
            return false;
        }
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
