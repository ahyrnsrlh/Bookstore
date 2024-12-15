<?php

namespace App\Models;

use App\Traits\AttributeTrait;
use App\Events\TransactionUpdated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, AttributeTrait;

    protected $fillable = ['invoice', 'status', 'payment_status', 'user_id'];
    protected $dispatchesEvents = [
        'updated' => TransactionUpdated::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getTotalAttribute(): String
    {
        return number_format($this->books_sum_price);
    }

    public function getPaymentBadgeAttribute(): String
    {
    	$payment = $this->payment_status ? ['green', 'Paid'] : ['yellow', 'Unpaid'];

    	return badge($payment, '<span class="badge rounded color">text</span>');
    }

    public function getPaymentBadgeAdminAttribute(): String
    {
        $payment = $this->payment_status ? ['success', 'Paid'] : ['warning', 'Unpaid'];

        return badge($payment);
    }

    public function getStatusBadgeAttribute(): String
    {
    	$payment = [];

    	switch ($this->status) {
    		case 'unconfirmed':
    			$payment = ['yellow', 'Unconfirmed'];
    			break;

    		case 'confirmed':
    			$payment = ['blue', 'Confirmed'];
    			break;

    		case 'failed':
    			$payment = ['red', 'Failed'];
    			break;
    		
    		default:
	    		$payment = ['green', 'Success'];
    			break;
    	}
    	
    	return badge($payment, '<span class="badge rounded color">text</span>');
    }

    public function getStatusBadgeAdminAttribute(): String
    {
        $payment = [];

        switch ($this->status) {
            case 'unconfirmed':
                $payment = ['warning', 'Unconfirmed'];
                break;

            case 'confirmed':
                $payment = ['primary', 'Confirmed'];
                break;

            case 'failed':
                $payment = ['danger', 'Failed'];
                break;
            
            default:
                $payment = ['success', 'Success'];
                break;
        }
        
        return badge($payment);
    }
}
