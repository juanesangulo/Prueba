<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_vehiculo extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    //Relacion con la tabla vehiculo
    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo');
    }
}
