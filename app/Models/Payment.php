<?php

namespace App\Models;

use App\Events\PaymentSaved;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;

  protected $fillable = ['photo', 'transaction_id'];
  protected $dispatchesEvents = [
  	'saved' => PaymentSaved::class
  ];

  public function transaction()
  {
  	return $this->belongsTo(Transaction::class);
  }

  public function getPhotoSrcAttribute(): String
  {
  	return image($this->photo, 'proof');
  }
}
