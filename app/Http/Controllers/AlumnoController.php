<?php

namespace aulaonline\Http\Controllers;

use Illuminate\Http\Request;
use aulaonline\Http\Requests;

use Illuminate\Support\Facedes\Redirect;
use Illuminate\Support\Facedes\Input;
use aulaonline\Http\Requests\AlumnoFormRequest;
use aulaonline\Alumno;
use DB;


class AlumnoController extends Controller
{
    public function __construct()
    {    	

    }
    public function index(Request $request)
    {
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $alumnos=DB::table('alumno as a')
			->join('aula as au','a.idaula','=','au.idaula')
			->select('a.idalumno','a.nombres','a.apellidos','a.codigo','a.celular','a.direccion','a.email','a.sexo','a.foto','au.nombre as aula')
            ->where('a.nombres','LIKE','%'.$query.'%')
            ->orderBy('a.idalumno','desc')
            ->paginate(7);
            return view('inicio.alumno.index',["alumnos"=>$alumnos,"searchText"=>$query]);
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
    	return \Redirect::to('inicio/institucion');

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
