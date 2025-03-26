<?php

namespace App\Auth;

use Illuminate\Contracts\Hashing\Hasher;

class Argon2idHasher implements Hasher
{
    protected int $memory;
    protected int $time;
    protected int $threads;

    public function __construct(array $options = [])
    {
        $this->memory = $options['memory'] ?? PASSWORD_ARGON2_DEFAULT_MEMORY_COST;
        $this->time = $options['time'] ?? PASSWORD_ARGON2_DEFAULT_TIME_COST;
        $this->threads = $options['threads'] ?? PASSWORD_ARGON2_DEFAULT_THREADS;
    }
    public function make($value, array $options = []): string
    {
        $memory = $options['memory'] ?? $this->memory;
        $time = $options['time'] ?? $this->time;
        $threads = $options['threads'] ?? $this->threads;
        return password_hash($value, PASSWORD_ARGON2ID, [
            'memory_cost' => $memory,
            'time_cost' => $time,
            'threads' => $threads,
        ]);
    }


    public function check(string $value, string $hashedValue, array $options = []): bool
    {
        return password_verify($value, $hashedValue);
    }

    public function needsRehash($hashedValue, array $options = []): bool
    {
        $memory = $options['memory'] ?? $this->memory;
        $time = $options['time'] ?? $this->time;
        $threads = $options['threads'] ?? $this->threads;

        return password_needs_rehash($hashedValue, PASSWORD_ARGON2ID, [
            'memory_cost' => $memory,
            'time_cost' => $time,
            'threads' => $threads,
        ]);
    }


    public function info($hashedValue): array
    {
        return password_get_info($hashedValue);
    }
}
