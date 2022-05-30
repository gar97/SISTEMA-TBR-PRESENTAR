<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
  protected $fillable=[
    'dcliente',
    'idusuario',
    'tipo_comprobante',
    'num_factura',
    'fecha_hora',
    'total',
    'estado'
    ];
}
