<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function books()
    {
    	return $this->hasMany(Book::class);
    }

    public function setSlugAttribute($slug)
    {
    	$this->attributes['slug'] = Str::slug($slug);
    }
}
