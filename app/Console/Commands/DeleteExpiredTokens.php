<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Token;

class DeleteExpiredTokens extends Command
{
    protected $signature = 'tokens:delete-expired';
    protected $description = 'Delete expired tokens from the database';

    public function handle()
    {
        $deletedCount = Token::where('expiry_date', '<', now())->delete();

        $this->info("Deleted {$deletedCount} expired tokens.");
    }
}
