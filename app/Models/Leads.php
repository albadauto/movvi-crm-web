<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';
    protected $primaryKey = 'leads_id';
    public $timestamps = true;
    protected $fillable = [
        'leads_nome',
        'leads_cpf',
        'leads_email',
        'leads_whatsapp',
        'leads_empresa_id',
        'leads_acoes_id',
        'leads_prox_acao_hora'
    ];

    public function acoes(){
        return $this->belongsTo(Acoes::class, 'leads_acoes_id');
    }
}
