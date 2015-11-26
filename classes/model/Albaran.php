<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26/11/2015
 * Time: 10:09
 */

namespace classes\model;


class Albaran extends Model{

    public $id;
    public $cliente_id;
    public $fecha_emision;
    public $fecha_entrega;
    public $factura_id;

    function __construct($id, $cliente_id, $fecha_emision, $fecha_entrega, $factura_id)
    {
        $this->id = $id;
        $this->cliente_id = $cliente_id;
        $this->fecha_emision = $fecha_emision;
        $this->fecha_entrega = $fecha_entrega;
        $this->factura_id = $factura_id;
    }


} 