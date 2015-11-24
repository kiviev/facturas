<?php
/**
 * Created by PhpStorm.
 * User: pack
 * Date: 23/11/15
 * Time: 19:39
 */
spl_autoload_register( function( $NombreClase )
{
    $NombreClase= str_replace('\\','/',$NombreClase);
//    echo $NombreClase.".php por autoload";
    include_once  $NombreClase . '.php';
}
);

