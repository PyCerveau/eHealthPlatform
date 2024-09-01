<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'amount',
        'payment_date',
        'payment_method',
    ];

    /**
     * Get the patient associated with the payment.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
