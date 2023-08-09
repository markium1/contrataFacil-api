<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'valor', 'prestador_id'];

    public function prestador(){
        return $this->belongsTo(Prestador::class);
    }
}
