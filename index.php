<?php

/**
 * Created by PhpStorm.
 * User: pack
 * Date: 23/11/15
 * Time: 19:31
 */
<<<<<<< HEAD
use classes\DB\Db;

require_once 'requires.php';


?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Index</title>

    <link href="<?php echo ENV  ?>/css/bootstrap.min.css" rel="stylesheet">
=======
>>>>>>> 9525337cb4ea0688d1d7a806b2883864dcdd3db0


use classes\model\Client;
use classes\views\View;

require_once 'requires.php';
$client = new Client(22,'B-222222','Alberto Perez','Calle de móstoles','Móstoles','Madrid','28937');

View::make('views/app.php',$client);

?>

