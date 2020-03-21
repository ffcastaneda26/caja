<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPrestamo extends Model
{
	protected $table = 'tipos_prestamo';
	protected $fillable =  [
		'tipo_prestamo',
		'corto',
		'tasa',
		'tipo_socio_id',
		'tasa_mensual',
		'capital_x_periodo',
		'interes_x_periodo',
		'cuenta_capital',
		'cuenta_interes',
		'cuenta_puente',
		'cuenta_resultados',
		'predeterminado',
		'prestamo_vs_ahorro',
		'estado_id'
	];



    /*+-----------------------------------------+
      | Setters y Getters de varios Campos      |
      +-----------------------------------------+  
    */
    // Setters
    public function setCortoAttribute($value)
    {
        $this->attributes['corto'] = strtoupper($value);
    }



    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */

    // Tipos_Prestamo <--- Socios
    public function prestamos(){
        return $this->hasMany(TipoPrestamo::class,'tipoprestamo_id','id');
    }

    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Tipos_Prestmo -->Estado: El tipo de préstamo es de un Estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    /*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Descripción Tipo de Préstamo
    public function scopeTipoPrestamo($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('tipo_prestamo','LIKE',"%$valor%");   
        }
    }

    // Nombre corto del Tipo de préstamo
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
    // Lista descripción completa
    public function  tipos_prestamo_list(){
        return $this->orderBy('tipo_prestamo')->pluck('tipo_prestamo', 'id');
    } 
   
   // Lista de tipos de préstamo nombre corto
    public function  tipo_prestamo_corto_list(){
        return $this->orderBy('corto')->pluck('corto', 'id');
    } 


}
