<?php 
    require_once ("session.php"); 
    require_once ("Includes/simplecms-config.php"); 
    ob_start();
    $URI=$_SERVER['REQUEST_URI'];
    $URI = explode ('?',$URI);
    $URI = $URI[0];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Proyecto PHP</title>
        <link href="./css/Site.css" rel="stylesheet" type="text/css" />
        <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="./js/bootstrap.js" type="text/javascript"></script>
        <script src="./js/bootstrap.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1"> 


    </head>
    <body>
        <div class="col-md-12">
            <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                       <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button> 
                   <a class="navbar-brand" href="#">Proyecto PHP</a>
               </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav">
                      <li class="active">
                         <li><a href="./index.php">inicio</a></li>
                         <?php
                             if (logged_on())
                             {
                                echo '<li><a href="usuarios-existentes.php">Lista Usuarios</a></li>'; 
                            }
                            else{
                                if($URI=='/Proyecto/usuarios-existentes.php'){
                                    header("location:upps.php");
                                }
                            }
                        ?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (logged_on())
                        {
                            echo "<li><a href='./'>Bienvenido, <strong>{$_SESSION['username']}</strong></a></li>\n";
                            echo '<li><a href="./logoff.php">> cerrar sesión</a></li>';
                        }
                        else
                        {
                            echo '<li><a href="./logon.php">> Iniciar Sesión</a></li>';
                            echo '<li><a href="./register.php">> Registrarse</a></li>';
                        }
                        ?>
                    </ul>
                </div>


                <div class="clear-fix"></div>
            </div>

                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <?php echo $contenido?>
                        </div>
                    </div>
                </div>
            </div>
        <footer class="limpiar">
            <div class="container">
                <div class="footer-wrapper">
                    <div class="float-left">
                        <p>&copy; Wilmer Andrés Poveda Quintero</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
