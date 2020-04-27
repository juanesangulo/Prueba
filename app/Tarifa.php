<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    public $timestamps = false;
    //Relacion con la tabla tipo_vehiculo
    public function tipo_vehiculo()
    {
        return $this->belongsTo('App\Tipo_vehiculo');
    }

    protected $guarded=['tipo', 'valor','estado'];
}
