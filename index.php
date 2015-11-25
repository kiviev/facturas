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
use classes\views\View;

require_once 'requires.php';
$client = new Client(22,'B-222222','Alberto Perez','Calle de móstoles','Móstoles','Madrid','28937');
$client2 = new Client(33,'B-333333','Juan Gomez','Calle de alcorcon','Alcorcon','Madrid','28958');

$clients= array('client'=>$client, 'client2'=>$client2);
View::make('views/app.php',array('clients'=>$clients));
$_POST['clients']= 'hola';


?>

