<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_type',
        'Subscription_amount',
        'card_number',
        'expiry_date',
        'cvv',
        'card_holder',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
