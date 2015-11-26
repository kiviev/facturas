<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 25/11/2015
 * Time: 13:21
 */

namespace classes\model;


class Client extends Model{
    public  $id;
    public  $cif;
    public  $nombre;
    public  $direccion;
    public  $poblacion;
    public  $provincia;
    public  $cod_postal;

    function __construct($id, $cif, $nombre, $direccion, $poblacion, $provincia, $cod_postal)
    {
        $this->id = $id;
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->poblacion = $poblacion;
        $this->provincia = $provincia;
        $this->cod_postal = $cod_postal;
    }




} 