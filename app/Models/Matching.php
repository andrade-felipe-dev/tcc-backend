<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;

    protected $table = 'matchs';

    protected $fillable =  [
        'entity_id',
        'voluntary_id'
    ];

    public function entity()
    {
        return $this->belongsTo(Usuario::class, 'entity_id');
    }

    public function voluntary()
    {
        return $this->belongsTo(Usuario::class, 'voluntary_id');
    }
}
