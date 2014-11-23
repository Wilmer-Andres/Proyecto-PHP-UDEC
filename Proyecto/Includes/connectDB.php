<?php

    $databaseConnection = new mysqli("localhost", "root", "", "proyecto");
    if ($databaseConnection->connect_error)
    {
        die("error en la conexión con la base de datos: " . $databaseConnection->connect_error);
    }

    function eliminar ($id){
	    $consulta = "DELETE FROM users where id = '$id'";
	    $resultado = mysqli_query($databaseConnection,$consulta);   
	    mysqli_close($databaseConnection);
	}
	function modificar ($id,$correo,$nombre, $apellido){
	    $conexion = conectar_base_de_datos();
	    $consulta = "UPDATE usuarios set correo='$correo', nombre='$nombre', apellido='$apellido' where id='$id'";
	    mysqli_query($conexion,$consulta);   
	    cerrar_conexion_db($conexion);
	}
?>