
<?php

/**
 * Created by PhpStorm.
 * User: pack
 * Date: 23/11/15
 * Time: 19:31
 */
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

</head>
<body>
<div class="row">

    <div class="col-md-3">



<?php


$db= new Db();
$resul= $db->select(array('ID','Name'),'world.city')
    ->limit(10)
->exe();

echo \fnc\create_table($resul , array( 'Id' , 'Nombre'));

?>

    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo ENV;  ?>/js/bootstrap.min.js"></script>
</body>
</html>

