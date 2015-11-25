<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 25/11/2015
 * Time: 10:53
 */
?>
<body>


<?php
require 'views/body/header.php';
require 'views/body/menu.php';
?>

<div class="container-fluid">
    <div class="row contenido">
        <div class="col-md-12">
            <div class="panel panel-default">
                <?php  require 'views/body/content.php'; ?>

            </div>
        </div>
    </div>
</div>

<?php
//require 'views/body/footer.php' ;
require 'views/body/footer/scripts/scripts.php';
?>
</body>
