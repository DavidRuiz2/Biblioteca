<?php 
    include('../../util/conexion.php');
    $ins = mysqli_query($con, "INSERT INTO usuarios (usuDocumento, usuNombre, usuDireccion, usuTelefono, usuCorreo, usuEstado) 
    VALUES('$_POST[identificacion]', '$_POST[nombre]', '$_POST[direccion]', '$_POST[telefono]', '$_POST[correo]', '$_POST[estado]')")
    or die("Problemas en el select ".mysqli_error($con));
    if(isset($ins)){
        echo "<script>
            location.href='/punto6/views/usuario.php?accion=consultar';
            alert('Los datos se guardaron correctamente');
            </script>";
    }else{
        echo "<script>
            location.href='/punto6/views/usuario.php?accion=consultar';
            alert('Los datos no se guardaron');
            </script>";
    }

?>