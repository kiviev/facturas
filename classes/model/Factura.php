<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26/11/2015
 * Time: 10:13
 */

namespace classes\model;


class Factura extends Model{

    public $id;
    public $fecha_emision;
    public $cliente_id;

    function __construct($id, $fecha_emision, $cliente_id)
    {
        $this->id = $id;
        $this->fecha_emision = $fecha_emision;
        $this->cliente_id = $cliente_id;
    }




}