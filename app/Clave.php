<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clave extends Model
{
    protected $table = 'claves';
	protected $fillable =  [
        'clave',
        'corta',
        'tipo',
        'cuenta',
        'estado_id'
    ];

    /*+-----------------------------------------+
      | Setters y Getters de varios Campos      |
      +-----------------------------------------+  
    */
    // Setters
    public function setClaveAttribute($value)
    {
        $this->attributes['clave'] = ucwords($value);
    }

    public function setCortaAttribute($value)
    {
        $this->attributes['corta'] = strtoupper($value);
    }

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */

    // Claves <--- Maestras_Contables: Una clave tiene muchas maestras contables
    public function maestras_contables(){
        return $this->hasMany('App\MaestraContable');
    }
    
    // Claves <--- Movimientos: 
    public function Movimiento(){
        return $this->hasMany('App\Movimiento');
    }

    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Claves -->Estado: La clave tiene un Estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

 	/*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Descripción Tipo de Préstamo
    public function scopeClave($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('clave','LIKE',"%$valor%");   
        }
    }

    // Nombre corto del Tipo de préstamo
    public function scopeCorta($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('corta','LIKE',"%$valor%");   
        }
    }

    // De una estado
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
    // Lista claves
    public function  claves_list(){
        return $this->orderBy('clave')->pluck('clave', 'id');
    } 
   
   // Lista de claves x nombre corto
    public function  clave_corta_list(){
        return $this->orderBy('corta')->pluck('corta', 'id');
    } 

}


