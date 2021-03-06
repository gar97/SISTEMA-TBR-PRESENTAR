<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = [
        'idproveedor',
        'idusuario',
        'tipo_comprobante',
        'num_factura',
        'fecha_hora',
        'total',
        'estado'
    ];  
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
}
