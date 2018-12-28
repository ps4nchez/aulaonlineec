<?php

namespace aulaonline;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table='director';

    protected $primaryKey='iddirector';

    public $timestamps=false;

    protected $fillable=[
    	'idinstitucion',
    	'nombre',
    	'apellido',
    	'cargo',
    	'celular',    	
    	'email',        
        'foto'
    ];

    protected $guarded =[
    ];
}
