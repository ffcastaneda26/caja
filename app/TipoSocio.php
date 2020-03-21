<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSocio extends Model
{
    protected $table = 'tipos_socio';
	protected $fillable =  [
        'tipo_socio',
        'corto',
        'predeterminado'
    ];

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */


    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */
    
    // Tipos_Socio <--- Socios
    public function socios(){
        return $this->hasMany('App\Socio');
    }
    
    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Tipos_socio -->Estado: El tipo de socio tiene (pertnece) a un estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    /*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Nombre del Estado
    public function scopeTipoSocio($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('tipo_socio','LIKE',"%$valor%");   
        }
    }

    // Nombre corto del Estado
    public function scopeCorto($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('corto','LIKE',"%$valor%");   
        }
    }

	/*+---------+
	  | Listas  |
	  +---------+
	*/
    // Lista de estados
    public function  tipos_socios_list(){
        return $this->orderBy('tipo_socio')->pluck('tipo_socio', 'id');
    } 
   
   // Lista de status nombre corto
    public function  tipos_socios_corto_list(){
        return $this->orderBy('corto')->pluck('corto', 'id');
    } 


}
