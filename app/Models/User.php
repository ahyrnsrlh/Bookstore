<?php

namespace App\Models;

use App\Events\UserSaved;
use App\Traits\AttributeTrait;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, AttributeTrait;

    protected $dispatchesEvents = [
        'saved' => UserSaved::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail()
    {
        return $this->hasOne(DetailUser::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getActiveAttribute(): String
    {
        $user = $this->email_verified_at ? ['success', 'Active'] : ['danger', 'Non-Active'];

        return badge($user);
    }
}
