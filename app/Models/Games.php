<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_desc',
        'exe_name',
        'description',
        'image_path',
        'release_date',
        'download_link',
        'developer_id',
        'publisher_id'
    ];
    public function getImageAttribute($value)
    {
        return $value ?? 'https://i.postimg.cc/L6pL1Zkr/NoImage.png';
    }
    public function developer()
    {
        return $this->belongsTo(Member::class, 'developer_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Member::class, 'publisher_id');
    }

                public function genres()
    {
        return $this->belongsToMany(Genres::class, 'game_genres', 'game_id', 'genre_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'game_id');
    }
}
