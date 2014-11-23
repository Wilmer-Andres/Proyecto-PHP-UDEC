<?php 
    require_once  ("Includes/connectDB.php");
    ob_start();
?>


    <div class="col-md-12">
    	<h3>Usuarios <small>existentes</small></h3>
        <table border="1" cellspacing="0">
        	<caption>Usuarios registrados</caption>
        	<tr>
        		<th>Número</th>
        		<th>Nombre usuario</th>
                <!--<th colspan="2">acciones</th>-->
        	</tr>
        	<?php 
	        	$consulta='SELECT id, username FROM users WHERE id > 1';
	        	$resultado=mysqli_query($databaseConnection,$consulta);
	        	while($fila=mysqli_fetch_assoc($resultado)){
	        		echo "<tr>";
	        		foreach($fila as $usuario){ 
		        			echo "<td>". "$usuario "."</td>";
	        		}
                        //echo "<td><a href='modificar?id='".$usuario["id"].">editar </a></td>";
                        //echo "<td><a href='eliminar?id='".$usuario["id"].">eliinar</a></td>";
	        		echo "</tr>";
	        	}
        	?>
        </table>
    </div>

</div> 
<?php $contenido = ob_get_clean();?>
<?php include "includes/master.php";?>