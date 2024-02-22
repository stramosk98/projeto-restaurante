<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'inicio',
        'fim',
        'user_id',
        'mesa_id',
    ];

    protected $dates = ['data'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function mesa() {
        return $this->belongsTo('App\Models\Mesa');
    }
}
