<?php

namespace aulaonline\Http\Controllers;

use Illuminate\Http\Request;

use aulaonline\Http\Requests;

use Illuminate\Support\Facedes\Redirect;
use Illuminate\Support\Facades\Input;
use aulaonline\Http\Requests\DirectorFormRequest;
use aulaonline\Director;
use DB;

class DirectorController extends Controller
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
            $directores=DB::table('director as d')
			->join('institucion as i','d.idinstitucion','=','i.idinstitucion')
			->select('d.iddirector','d.nombre','d.apellido','d.cargo','d.celular','d.email','d.foto','i.nombre as institucion')
            ->where('d.nombre','LIKE','%'.$query.'%')
            ->orwhere('d.apellido','LIKE','%'.$query.'%')
            ->orderBy('d.iddirector','desc')
            ->paginate(7);
            return view('inicio.director.index',["directores"=>$directores,"searchText"=>$query]);
        }

    }
    public function create()
    {
    	 $instituciones=DB::table('institucion')->where('condicion','=','1')->get();
        return view("inicio.director.create",["instituciones"=>$instituciones]);    	
    }
    public function store(DirectorFormRequest $request)
    {
    	$director=new Director; 
    	$director->iddirector=$request->get('iddirector');
    	$director->nombre=$request->get('nombre');
    	$director->apellido=$request->get('apellido');
    	$director->cargo=$request->get('cargo');
    	$director->celular=$request->get('celular');
    	$director->email=$request->get('email');
    	
    	if (Input::hasFile('foto')){
         $file=Input::file('foto');
         $file->move(public_path().'/imagenes/directores/',$file->getClientOriginalName());
         $director->foto=$file->getClientOriginalName();
        }
        $director->idinstitucion=$request->get('idinstitucion');
        $director->save();
    	return \Redirect::to('inicio/director');

    }
    public function show($id)
    {
    	return view("inicio.director.show",["director"=>Director::findOrFail($id)]);

    }
    public function edit($id)
    {
    	$director=Director::findOrFail($id);
        $instituciones=DB::table('institucion')->where('condicion','=','1')->get();
        return view("inicio.director.edit",["director"=>$director,"instituciones"=>$instituciones]);   	

    }
    public function update(DirectorFormRequest $request,$id)
    {
		$director=Director::findOrFail($id);
    	//$director->iddirector=$request->get('iddirector');
    	$director->idinstitucion=$request->get('idinstitucion');
    	$director->nombre=$request->get('nombre');
    	$director->apellido=$request->get('apellido');
    	$director->cargo=$request->get('cargo');
    	$director->celular=$request->get('celular');
    	$director->email=$request->get('email');
    	
    	if (Input::hasFile('foto')){
         $file=Input::file('foto');
         $file->move(public_path().'/imagenes/directores/',$file->getClientOriginalName());
         $director->foto=$file->getClientOriginalName();
        }
        
    	$director->update();
    	return \Redirect::to('inicio/director');


    }
    public function destroy($id)
    {
    	$director=Director::findOrFail($id);       
    	$director->update();
    	return \Redirect::to('inicio/director');

    }
}
