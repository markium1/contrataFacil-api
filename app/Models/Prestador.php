<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    protected $table = 'prestadores';
    protected $fillable = ['nome', 'telefone', 'email', 'foto'];

    public function servicos(){
        return $this->hasMany(Servico::class);
    }
}
