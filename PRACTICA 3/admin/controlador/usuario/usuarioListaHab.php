<?php
    // Incluye el archivo de modelo "usuario.php" que contiene la definición de la clase Usuario y sus métodos
    include "../../modelo/usuario.php";

    // Crea una nueva instancia de la clase Usuario, sin valores iniciales en sus propiedades
    $us = new Usuario("", "", "", "", "", "", "", "", "", "", "", "", "", "");

    // Llama al método "listaUsuario" de la clase Usuario para obtener la lista de usuarios de la base de datos
    // Guarda el resultado en la variable $res
    $res = $us->listaUsuarioHab();

    // Incluye el archivo de vista "mostrarListaUsr.php" para mostrar la lista de usuarios obtenida
    include "../../vista/ListaUsrHab.php";
?>
