<?php

namespace aulaonline\Http\Controllers;

use Illuminate\Http\Request;

use aulaonline\Http\Requests;
use aulaonline\Institucion;
use Illuminate\Support\Facedes\Redirect;
use aulaonline\Http\Requests\InstitucionFormRequest;
use DB;

class InstitucionController extends Controller
{
    public function __construct()
    {    	
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $instituciones=DB::table('institucion')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idinstitucion','desc')
            ->paginate(7);
            return view('inicio.institucion.index',["instituciones"=>$instituciones,"searchText"=>$query]);
        }

    }
    public function create()
    {
    	return view("inicio.institucion.create");
    }
    public function store(InstitucionFormRequest $request)
    {
    	$institucion=new Institucion;
    	$institucion->nombre=$request->get('nombre');
    	$institucion->provincia=$request->get('provincia');
    	$institucion->canton=$request->get('canton');
    	$institucion->parroquia=$request->get('parroquia');
    	$institucion->direccion=$request->get('direccion');
    	$institucion->codigo_postal=$request->get('codigo_postal');
    	$institucion->condicion='1';
        $institucion->save();
    	return \Redirect::to('inicio/director/create');

    }
    public function show($id)
    {
    	return view("inicio.institucion.show",["institucion"=>Institucion::findOrFail($id)]);

    }
    public function edit($id)
    {
    	return view("inicio.institucion.edit",["institucion"=>Institucion::findOrFail($id)]);

    }
    public function update(InstitucionFormRequest $request,$id)
    {
    	$institucion=Institucion::findOrFail($id);
    	$institucion->nombre=$request->get('nombre');
    	$institucion->provincia=$request->get('provincia');
    	$institucion->canton=$request->get('canton');
    	$institucion->parroquia=$request->get('parroquia');
    	$institucion->direccion=$request->get('direccion');
    	$institucion->codigo_postal=$request->get('codigo_postal');
    	$institucion->update($request->all());
    	return \Redirect::to('inicio/institucion');


    }
    public function destroy($id)
    {
    	$institucion=Institucion::findOrFail($id);
        $institucion->condicion='0';
    	$institucion->update();
    	return \Redirect::to('inicio/institucion');

    }
}
