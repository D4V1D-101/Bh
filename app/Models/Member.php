<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name','designation','git_url','linkedin_url','image'];
    public function getImageAttribute($value)
    {
        return $value ?? 'https://i.postimg.cc/L6pL1Zkr/NoImage.png';
    }
    public function developedGames()
    {
        return $this->hasMany(Games::class, 'developer_id');
    }

    public function publishedGames()
    {
        return $this->hasMany(Games::class, 'publisher_id');
    }
}
