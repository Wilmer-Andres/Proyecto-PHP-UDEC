    <?php 
        require_once ("Includes/simplecms-config.php"); 
        require_once  ("Includes/connectDB.php");
        ob_start();

     ?>


    <div class="col-md-12">
        <h3>Curso PHP <small>Universidad de Cundinamarca</small></h3>
		<p>Este es un pequeño resumen de lo que se aprendio en el curso de php dde la univesidad.</p>
		<p>Para poder tener acceso a este curso, es necesario que inicie sesión.</p>
		<p>Si no posee un usuario, dirigirce a la opción de registro ubicada debajo del sistema de autenticación de usuario</p>
    </div>

</div> 

<?php $contenido = ob_get_clean();?>
<?php include "Includes/master.php";?>