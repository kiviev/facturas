<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26/11/2015
 * Time: 10:15
 */

namespace classes\model;


class Producto extends Model{

    public  $id;
    public  $nombre;
    public  $tipo;
    public  $precio_compra;
    public  $precio_venta;

    function __construct($id, $nombre, $tipo, $precio_compra, $precio_venta)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
    }


} 