<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;

    protected $table="bank_details";

    protected $fillable = [
        'name', 'agency', 'account'
    ];

    public function pix()
    {
        return $this->hasMany(Pix::class, 'id_bank_details');
    }
}
