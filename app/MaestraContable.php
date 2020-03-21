<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaestraContable extends Model
{
    protected $table = 'maestras_contables';
	protected $fillable =  [
        'clave_id',
        'tipo',
        'cuenta',
        'subcuenta',
        'auxiliar',
        'importe'
    ];


    /*+-----------------------------------------+
      | Setters y Getters de varios Campos      |
      +-----------------------------------------+  
    */
    // Setters
    public function setCuentaAttribute($value)
    {
        $this->attributes['cuenta'] = strtoupper($value);
    }

    public function setSubcuentaAttribute($value)
    {
        $this->attributes['subcuenta'] = strtoupper($value);
    }

    public function setAuxiliarAttribute($value)
    {
        $this->attributes['auxiliar'] = strtoupper($value);
    }

     public function setImporteAttribute($value)
    {
        $this->attributes['importe'] = strtoupper($value);
    }

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

    /*+----------------------------------------------------------+
      | Mucho - Uno: Tiene a muchos en otra Tabla (Es Pader de)  |
      +----------------------------------------------------------+
    */

    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Maestras_Contable -->Clave:La Maestra Contable es para una clave de movimiento
    public function clave()
    {
        return $this->belongsTo('App\Clave');
    }

    /*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */

    // De una clave
    public function scopeClaveId($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('clave_id','=',$valor);      
        }
    }

    // De un Tipo
    public function scopeTipo($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('tipo','LIKE',"%$valor%");   
        }
    }

    // Cuenta
    public function scopeCuenta($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('cuenta','LIKE',"%$valor%");   
        }
    }
    // SubCuenta
    public function scopeSubCuenta($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('subcuenta','LIKE',"%$valor%");   
        }
    }

    // Auxiliar
    public function scopeAuxiliar($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('auxiliar','LIKE',"%$valor%");   
        }
    }

    // Importe
    public function scopeImporte($query,$valor)
    {
        if(trim($valor) != ""){
           $query->where('importe','LIKE',"%$valor%");   
        }
    }


}
