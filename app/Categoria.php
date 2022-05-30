<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //para asignar en masa
    protected $fillable =['nombre', 'descripcion', 'condicion'];

    //por la llave fk con articulos
    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }

}
