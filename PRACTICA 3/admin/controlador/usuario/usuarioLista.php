<?php
session_start();

// Verifica que las variables de sesión estén definidas
if (isset($_SESSION['idCliente']) && isset($_SESSION['rol'])) {
    $usuarioActualId = $_SESSION['idCliente'];
    $rolActual = $_SESSION['rol'];
} else {
    // Si no están definidas, redirige al inicio o muestra un mensaje de error
    echo "Error: Usuario no autenticado.";
    exit;
}

// Incluye el archivo del modelo
include "../../modelo/usuario.php";

// Crea una instancia de Usuario
$usuario = new Usuario("", "", "", "", "", "", "", "", "", "", "", "", "", "");

// Obtén la lista de usuarios según el rol
$listaUsuarios = $usuario->listaUsuario($usuarioActualId, $rolActual);

// Asigna la variable $listaUsuarios a $res para que sea consistente con `mostrarListaUsr.php`
$res = $listaUsuarios;

// Incluye la vista para mostrar los datos
include "../../vista/mostrarListaUsr.php";
