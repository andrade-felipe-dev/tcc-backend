<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pix extends Model
{
    use HasFactory;

    protected $table = 'pixes';

    protected $fillable = [
        'type', 'value', 'id_bank_details'
    ];

    public function bankDetails()
    {
        return $this->belongsTo(BankDetails::class, 'id_bank_details', 'id');
    }
}
