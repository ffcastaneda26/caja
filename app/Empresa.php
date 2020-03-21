<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable =  [
        'empresa',
        'corto',
        'subcuenta',
        'responsable',
        'estado_id',
    ];

    /*+-----------------------------------------+
      | Setters y Getters de varios Campos      |
      +-----------------------------------------+  
    */
    // Setters
    public function setEmpresaAttribute($value)
    {
        $this->attributes['empresa'] = ucwords($value);
    }

    public function setCortoAttribute($value)
    {
        $this->attributes['corto'] = ucwords($value);
    }

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */


    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */
    
    // Empresas <--- Socios
    public function socios(){
        return $this->hasMany('App\Socio');
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
    // Nombre empresa
    public function scopeEmpresa($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('empresa','LIKE',"%$valor%");   
        }
    }

    // Nombre Corto
    public function scopeCorto($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('corto','LIKE',"%$valor%");   
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
    // Lista Empresas
    public function  empresas_list(){
        return $this->orderBy('empresa')->pluck('empresa', 'id');
    } 
   
   // Lista de empresas x nombre corto
    public function  empresa_corto_list(){
        return $this->orderBy('corto')->pluck('corto', 'id');
    } 

    
}
