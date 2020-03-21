<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';
	protected $fillable =  [
        'desde',
        'hasta',
        'inicio_pagos',
        'faltan',
        'ahorros',
        'pagos',
        'activo'
    ];


    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */
      
    // Períodos <--- Movimientos: 
    public function Movimiento(){
        return $this->hasMany('App\Periodo');
    }

  	/*+---------+
      | Apoyo   |
      +---------+
    */
    public function activo(){
		  return $this->where('activo','=',1)->first();
    }

    // Activa/Desactiva
    public function activa($active=1){
         $this->active = $active;
         $this->save();
    }



}
