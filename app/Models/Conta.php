<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable =
    [        
        'tipo_conta_id',
        'user_id',
        'saldo',
    ];
}
