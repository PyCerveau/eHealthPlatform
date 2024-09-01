<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'report_data',
        'generated_at',
    ];

    /**
     * Get the user associated with the report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
