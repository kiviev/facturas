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


    /**
     * @return mixed
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * @param mixed $cif
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
    }

    /**
     * @return mixed
     */
    public function getCodPostal()
    {
        return $this->cod_postal;
    }

    /**
     * @param mixed $cod_postal
     */
    public function setCodPostal($cod_postal)
    {
        $this->cod_postal = $cod_postal;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param mixed $poblacion
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }


} 