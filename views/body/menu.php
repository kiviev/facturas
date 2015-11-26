<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 25/11/2015
 * Time: 11:03
 */
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
<!--                <span class="sr-only">Toggle Navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
            <a class="navbar-brand" href="<?php echo ENV;?>/index.php">Inicio</a>
            <a class="navbar-brand" href="<?php echo ENV;?>/index.php?action=inicio">Inicio con action</a>
            <a class="navbar-brand" href="<?php echo ENV;?>?action=facturas">Facturas</a>
            <a class="navbar-brand" href="<?php echo ENV;?>?action=albaranes">Albaranes</a>
            <a class="navbar-brand" href="<?php echo ENV;?>?action=clientes">Clientes</a>
            <a class="navbar-brand" href="<?php echo ENV;?>?action=productos">Productos</a>
        </div>


    </div>
</nav>