<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxClassificacao extends Model
{
    use HasFactory;

    protected $table = 'aux_metas_categoria';
    protected $fillable = [
        'categoria_id',
        'meta_id'
    ];
}
