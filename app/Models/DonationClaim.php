<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationClaim extends Model
{
    protected $primaryKey = 'claim_id';

    protected $fillable = [
        'donation_id', 'user_id', 'claim_time', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id', 'donation_id');
    }
}
