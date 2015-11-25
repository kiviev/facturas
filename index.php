<?php

/**
 * Created by PhpStorm.
 * User: pack
 * Date: 23/11/15
 * Time: 19:31
 */


use classes\model\Client;
use classes\views\View;

require_once 'requires.php';
$client = new Client(22,'B-222222','Alberto Perez','Calle de móstoles','Móstoles','Madrid','28937');

View::make('views/app.php',$client);

?>

