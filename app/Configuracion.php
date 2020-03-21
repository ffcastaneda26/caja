<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuracion';
	protected $fillable =  [
		'nombre',
		'corto',
		'ahorro_minimo', 
		'periodos',
		'poliza',
		'penalizacion',
		'minimo_prestamo', 
		'limite_prestamos',
		'liquida_intereses',
		'ajustar_pagos',
		'ajustar_pagos_a',
		'prestamo_id_ahorro',
		'periodo_vence_ahorro',
		'prestamo_id_defecto',
		'ruta_polizas',
		'ruta_pronosticos',
		'cuenta_bancos',
		'subcuenta_bancos',
		'auxiliar_bancos', 
		'cuenta_resultados',
    ];

    /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */

  	/*+----------------------------------------------------------+
      | Uno - Muchos: Pertenece a una Tabla (Es hija de)         |
      +----------------------------------------------------------+
    */

    // Configuracion-->Préstamos: Tipo de Préstamos por defecto
    public function prestamo_defecto()
    {
        return $this->belongsTo('App\TipoPrestamo','prestamo_id_defecto');
    }

    // Configuracion-->Periodos:Tipo de Préstamos vs ahorro
    public function prestamo_ahorro()
    {
        return $this->belongsTo('App\TipoPrestamo','prestamo_id_ahorro');
    }

    // Configuracion-->Periodos:Período para préstamos vs ahorro
    public function periodo_vence_ahorro()
    {
        return $this->belongsTo('App\Periodo','periodo_vence_ahorro');
    }

}
