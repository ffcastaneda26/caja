<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable =  [
        'folio',
        'socio_id',
        'tipoprestamo_id',
        'fecha',
        'plazo',
        'fecha_vencimiento',
        'periodo_vence',
        'aval1_id',
        'aval2_id',
        'tasa',
        'capital',
        'intereses',
        'cheque',
        'pago_inicial_capital',
        'pago_inicial_interes',
        'amortizacion_capital',
        'amortizacion_interes',
        'saldo_capital',
        'saldo_interes',
        'pagos_capital',
        'pagos_interes',
        'fecha_inicio_capital',
        'fecha_inicio_interes',
        'penalizacion_porcentaje',
        'importe_penalizacion',
        'estado_id'
    ];

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

    /*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Préstamos -->Socio: El préstamo es para un socio
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
    // Préstamos -->Tipos_prestamo: El préstamo es de un tipo
    public function TipoPrestamo()
    {
        return $this->belongsTo('App\TipoPrestamo','tipoprestamo_id');
    }

    // Préstamos -->Socios: El préstamo tiene un socio que es primer aval
    public function aval1()
    {
        return $this->belongsTo('App\Socio');
    }

 	// Préstamos -->Socios: El préstamo tiene un socio que es segundo aval

    public function aval2()
    {
        return $this->belongsTo('App\Socio');
    }

    // Préstamos -->Prestamos: El préstamo tiene un estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    /*+----------------------------------------------------------+
      | A traves: Accede a otro modelo a través de uno intermedio|
      +----------------------------------------------------------+
    */

      // Préstamo -->Socio-->Empresa


 	/*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */

    // De un socio
    public function scopeSocioId($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('socio_id','=',$valor);      
        }
    }

    // De un socio que es primer aval
    public function scopeAval1($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('aval1_id','=',$valor);      
        }
    }

    // De un socio que es segundo aval
    public function scopeAval2($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('aval2_id','=',$valor);      
        }
    }

    // De un tipo de préstamo
    public function scopeTipoPresamoId($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('tipoprestamo_id','=',$valor);      
        }
    }

    // De un estado
    public function scopeEstado($query,$valor)
    {
        if(trim($valor) != ""){
            $query->where('estado_id','=',$valor);      
        }
    }


    // De una Empresa
    public function scopeEmpresa($query,$valor=1){
        return $this->wherehas('socios',function($query) use($valor){
                                $query->where('empresa_id','=',$valor)
                                      ->orderBy('empresa');
                            });
    }

    /*+---------+
      | Listas  |
      +---------+
    */


}
