    <?php 
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        ob_start();
     ?>


    <div class="col-md-12">
        <h3>Curso PHP <small>Universidad de Cundinamarca</small></h3>
		<div class="alert alert-warning">
            Para acceder a esta seccion, es necesario que se registre en el sistema y/o iniciar sesión si posee una cuenta.
        </div>
    </div>

</div> 
<?php $contenido = ob_get_clean();?>
<?php include "Includes/master.php";?>