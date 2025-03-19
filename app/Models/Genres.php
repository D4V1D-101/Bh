<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public $timestamps = false;

    public function games()
    {
        return $this->belongsToMany(Games::class, 'game_genres', 'genre_id', 'game_id');
    }

    public function getArticles()
    {
        return Article::whereHas('game', function($query) {
            $query->whereHas('genres', function($q) {
                $q->where('genres.id', $this->id);
            });
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }
}
