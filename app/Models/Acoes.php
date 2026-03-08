<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acoes extends Model
{
    protected $table = 'acoes';
    protected $primaryKey = 'acoes_id';
    protected $fillable = [
        'acoes_descricao',
        'acoes_titulo',
    ];

    public function leads(){
        return $this->hasMany(Leads::class, 'leads_acoes_id');
    }
}
