<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Events\StockSaved;
use App\Traits\AttributeTrait;

class Stock extends Model
{
    use HasFactory, AttributeTrait;

    protected $fillable = ['total', 'book_id', 'supplier_id', 'type'];

    protected $dispatchesEvents = [
    	'saved' => StockSaved::class
    ];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }

    public function getTypeLabelAttribute(): String
    {
        return $this->type === 'in' ? badge(['success', 'Stock '.$this->type]) : badge(['danger', 'Stock '.$this->type]);
    }
}
