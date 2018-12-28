<?php

namespace aulaonline;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumno';

    protected $primaryKey='idalumno';

    public $timestamps=false;

    protected $fillable=[
    	'idaula',
    	'nombres',
    	'apellidos',
    	'codigo',
    	'celular',
    	'direccion',
    	'email',
        'sexo',
        'foto'
    ];

    protected $guarded =[
    ];
}
