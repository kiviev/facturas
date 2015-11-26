<?php

/**
 * Created by PhpStorm.
 * User: pack
 * Date: 23/11/15
 * Time: 19:31
 */

require_once 'requires.php';
use classes\DB\Db;
use classes\model\Client;
use classes\model\Factura;
use classes\views\View;

require_once 'requires.php';

$client1 = new Client(22,'B-222222','Alberto Perez','Calle de móstoles','Móstoles','Madrid','28937');
$client2 = new Client(23,'B-222222','Juan Gonzalez','Calle de Alcorcon','alcorcon','Madrid','28566');
$clients=array($client1,$client2);

$factura1 = new Factura(33,'2014-10-23',22);
$factura2 = new Factura(355,'2015-11-12',23);
$facturas = array($factura1,$factura2);

$vars= array('clients'=>$clients, 'facturas'=>$facturas);
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'factura':
            View::make('views/app.php',$vars);
    }
}


//View::make('views/app.php',array('clients'=>$clients));



?>

