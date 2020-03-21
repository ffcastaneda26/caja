<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable =  [
        'estado',
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


    // Estados <--- Tipos_Prestamo
    public function tipos_prestamo(){
        return $this->hasMany('App\TipoPrestamo');
    }

    // Estados <--- Claves
    public function claves(){
        return $this->hasMany('App\Clave');
    }

    // Estados <--- Empresas: 
    public function empresas(){
        return $this->hasMany('App\Empresa');
    }

    // Estados <--- Socios: 
    public function Socios(){
        return $this->hasMany('App\Socio');
    }

   // Estados <--- Préstamos: 
    public function Prestamos(){
        return $this->hasMany('App\Prestamo');
    }
 
    // Estados <--- Movimientos: 
    public function Movimiento(){
        return $this->hasMany('App\Movimiento');
    }



    /*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Nombre del Estado
    public function scopeEstado($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('estado','LIKE',"%$valor%");   
        }
    }

    // Nombre corto del Estado
    public function scopeCorto($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('corto','LIKE',"%$valor%");   
        }
    }

    // Predeterminado
    public function scopePredeterminado($query)
    {
        return $query->where('predeterminado','=','1');
    } 

	/*+---------+
	  | Listas  |
	  +---------+
	*/
    // Lista de estados
    public function  estados_list(){
        return $this->orderBy('estado')->pluck('estado', 'id');
    } 
   
   // Lista de status nombre corto
    public function  estados_corto_list(){
        return $this->orderBy('corto')->pluck('corto', 'id');
    } 

    /*+-----------+
      | Apoyo     |              
      +-----------+
    */

     public function lee_predeterminado(){
        return $this->where('predeterminado','=','1')->first();
     } 
}
