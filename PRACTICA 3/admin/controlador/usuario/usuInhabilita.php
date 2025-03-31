<?php

    // Obtiene el ID del usuario a eliminar de los parámetros GET en la URL
    $idc = $_GET['cod'];

    // Incluye el archivo de configuración de base de datos y establece la conexión
    include "../../../includes/config/database.php";
    $db = conectarDB();

    // Consulta SQL para cambiar el estado del usuario a 'Inhabilitado', en lugar de eliminarlo físicamente
    $consql = "UPDATE cliente SET idEstadoTraje='4' WHERE idCliente=$idc";

    // Ejecuta la consulta y almacena el resultado en la variable $res
    $res = mysqli_query($db, $consql);

    // Verifica si la consulta se ejecutó correctamente
    if ($res) {
        echo "<script> location.href='usuarioLista.php'; </script>";
    } else {
        echo "No se ha inhabilitado";
    }
?>