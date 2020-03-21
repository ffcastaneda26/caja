<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable =  [
        'nombre',
        'empresa_id',
        'tiposocio_id',
        'empleado',
        'ahorro',
        'auxiliar',
        'capacidad',
        'estado_id',
    ];

    /*+-----------------------------------------+
      | Setters y Getters de varios Campos      |
      +-----------------------------------------+  
    */
    // Setters
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */


    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */

    // Socios <--- Préstamos: 
    public function Prestamos(){
        return $this->hasMany('App\Prestamo');
    }

    // Socios <--- Movimientos: 
    public function Movimiento(){
        return $this->hasMany('App\Movimiento');
    }
    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Socios -->Empresa: El socio es de una empresa
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    // Socios -->Empresa: El socio es de un cierto tipo
    public function tiposocio()
    {
        return $this->belongsTo('App\TipoSocio');
    }

    // Socios -->Estado: El socio tiene un estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }


 	/*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Nombre empresa
    public function scopeNombre($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('nombre','LIKE',"%$valor%");   
        }
    }

    // De una estado
    public function scopeEmpresaId($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('empresa_id','=',$valor);      
        }
    }

    // De un estado
    public function scopeEstadoId($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('estado_id','=',$valor);      
        }
    }

	/*+---------+
	  | Listas  |
	  +---------+
	*/
    // Lista socios
    public function  socios_list($empresa_id=Null){
    	if($empresa_id){
		  return $this->where('empresa_id','=',$empresa_id)
		           ->orderBy('nombre')
		           ->pluck('nombre', 'id');
    	}
        return $this->orderBy('nombre')->pluck('nombre', 'id');
    } 
   

    // Lista de empresas que tienen préstamos
    public function socios_con_prestamos(){
        return $this->wherehas('prestamos')
                   ->orderBy('nombre')
                   ->pluck('nombre', 'id');           
    }
    
}
