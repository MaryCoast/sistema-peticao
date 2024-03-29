<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    use HasFactory;
    protected $table = 'peticoes';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'destinatario',
        'descricao',
    ];
}
