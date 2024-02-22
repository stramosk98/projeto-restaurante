<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'disponivel',
        'updated_at',
        'created_at',
    ];

    public function reservas() {
        return $this->hasMany('App\Models\Reserva');
    }
}
