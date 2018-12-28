<?php

namespace aulaonline;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table='institucion';

    protected $primaryKey='idinstitucion';

    public $timestamps=false;

    protected $fillable=[
    	'nombre',
    	'provincia',
    	'canton',
    	'parroquia',
    	'direccion',
    	'codigo_postal',
        'condicion'
    ];

    protected $guarded =[
    ];
}
