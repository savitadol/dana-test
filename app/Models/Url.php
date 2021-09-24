<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'slug'
    ];

    protected $appends = ['shortened_url'];


    public function getShortenedUrlAttribute($value)
    {
        return route('destination',['url'=>$this->slug]);
    }
}
