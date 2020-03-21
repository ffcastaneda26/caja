<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable =  [
        'folio',
        'socio_id',
        'clave_id',
        'periodo_id',
        'fecha',
        'importe',
        'descripcion',
        'referencia',
        'prestamo_id',
        'cuenta',
        'subcuenta',
        'auxiliar',
        'contabilizado'
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

    // Movimiento -->Socio: El movimiento es de un socio
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    // Movimiento -->Clave: El movimiento es de una clave
    public function Clave()
    {
        return $this->belongsTo('App\Clave');
    }

    // Movimiento -->Periodo: El movimiento se hizo en un período
    public function Periodo()
    {
        return $this->belongsTo('App\Periodo');
    }

    // Movimiento -->Prestamo: El movimiento es de un prestamo
    public function Prestamo()
    {
        return $this->belongsTo('App\Prestamo');
    }

    // Movimiento -->Estado: El movimiento tiene un estado
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    
}
