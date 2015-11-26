<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26/11/2015
 * Time: 10:18
 */

namespace classes\model;


class Albaran_producto extends Model{

    public  $id;
    public  $albaran_id;
    public  $producto_id;
    public  $cantidad;

    function __construct($id, $albaran_id, $producto_id, $cantidad)
    {
        $this->id = $id;
        $this->albaran_id = $albaran_id;
        $this->producto_id = $producto_id;
        $this->cantidad = $cantidad;
    }


} 