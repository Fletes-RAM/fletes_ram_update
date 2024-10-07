<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operador extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'operadores';

	protected $fillable = ['user_id', 'nss', 'telefono', 'contacto', 'tel_contacto','vigencia','medica','unidad_id', 'observaciones'];
}
