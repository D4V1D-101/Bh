<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    use HasFactory;
    protected $fillable = ['title','image','content'];
    public function getImageAttribute($value)
    {
        return $value ?? 'https://i.postimg.cc/L6pL1Zkr/NoImage.png';
    }
}
