<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = "empresas";
    public $timestamps = true;
    protected $primaryKey = "empresas_id";
    protected $fillable = [
        'empresas_nome',
        'empresas_cnpj',
        'empresas_telefone',
        'empresas_email',
        'empresas_cidade',
        'empresas_estado',
        'empresas_logo',
        'empresas_user_id'
    ];
}
