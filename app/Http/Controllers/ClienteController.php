<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class ClienteController extends Controller
{
    
    public function index( Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if($buscar==''){
            $personas = Persona::orderBy('id','desc')->paginate(6);
        }
        else{
            $personas = Persona::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id','desc')->paginate(6);
        }
        //listar todos los registros
       // $personas = Persona::paginate(3);
        return[
            'pagination' =>[
                'total' => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page' => $personas->perPage(),
                'last_page' => $personas->lastPage(),
                'from' => $personas->firstItem(),
                'to' => $personas->lastItem(),
            ],
            'personas' => $personas
        ];

    }

    public function selectCliente(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $clientes = Persona::where('nombre', 'like', '%'. $filtro . '%')
        ->orWhere('num_documento', 'like', '%'. $filtro . '%')
        ->select('id','nombre','num_documento')
        ->orderBy('nombre', 'asc')->get();

        return ['clientes' => $clientes];
    }
    
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        //instanciar el modelo
        $persona = new Persona();

        //tomar los datos de request
        $persona->nombre = $request->nombre;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento = $request->num_documento;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;

        //guardar el objeto en la tabla
        $persona->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        //buscar la categoria por el $id del request
        $persona =  Persona::findOrfail($request->id);

         //tomar los datos de request
         $persona->nombre = $request->nombre;
         $persona->tipo_documento = $request->tipo_documento;
         $persona->num_documento = $request->num_documento;
         $persona->direccion = $request->direccion;
         $persona->telefono = $request->telefono;
         $persona->email = $request->email;
 
         //guardar el objeto en la tabla
         $persona->save();
    }
}
