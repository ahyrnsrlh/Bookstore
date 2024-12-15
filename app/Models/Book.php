<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'slug', 'author', 'publisher', 'lang', 'pages', 'price', 'publish_date', 'description', 'cover', 'category_id', 'stock'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getPriceConvertedAttribute(): String
    {
    	return number_format($this->price);
    }

    public function getCoverSrcAttribute(): String
    {
    	return image($this->cover);
    }

    public function getPublishDateLocalAttribute(): String
    {
    	return localDate($this->publish_date);
    }

    public function getDescriptionFormattedAttribute(): String
    {
    	return nl2br($this->description);
    }

    public function getDescriptionMoreAttribute(): String
    {
        return substr($this->description, 0, 400);
    }
}
