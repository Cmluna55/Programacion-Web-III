<?php
    // Incluye el archivo de la vista "usuarioNuevo.php" para mostrar el formulario de registro de usuario
    include "../../vista/Registro.php";
    
    // Verifica si se ha enviado el formulario de registro de usuario
    if (isset($_POST['registrarUsu'])) {
        // Obtiene los valores ingresados en el formulario
        $n = $_POST['nom'];
        $pat = $_POST['pat'];
        $m = $_POST['mat'];
        $f = $_POST['fechaNac'];
        $dni = $_POST['ced'];
        $t = $_POST['tel'];
        $e = $_POST['ema'];
        $c = $_POST['ciu'];
        $d = $_POST['dir'];
        $u = $_POST['usu'];
        $p = $_POST['pas'];
        $r = isset($_POST['rol']) ? $_POST['rol'] : null; // Obtén el rol si está disponible
        // Genera un hash seguro de la contraseña ingresada usando el algoritmo de hashing por defecto de PHP
        $pashas = password_hash($p, PASSWORD_DEFAULT);

        // Incluye el modelo "usuario.php", que contiene la clase Usuario y sus métodos
        include "../../modelo/usuario.php";

        // Crea una nueva instancia de la clase Usuario, sin valores iniciales
        $usu = new Usuario("", "", "", "", "", "", "", "", "", "", "", "", "", "");

        // Pasa como argumentos el correo, la contraseña hasheada y el rol determinado
         if (isset($_SESSION['rol']) && $_SESSION['rol'] == "Administrador") {
            if ($r == 1) {
                $rol = "Administrador";
            } elseif ($r == 2) {
                $rol = "Empleado";
            }

            // Registrar el usuario con el rol definido
            $x = $usu->registrarUsuario1($n, $pat, $m, $f, $dni, $t, $e, $c, $d, $u, $pashas, $r);
        } else {
            // Registrar el usuario sin rol adicional
            $x = $usu->registrarUsuario2($n, $pat, $m, $f, $dni, $t, $e, $c, $d, $u, $pashas);
        }
        // Verifica si el registro fue exitoso
        if ($x) {
            // Muestra una alerta de éxito y redirige a la página de lista de usuarios
            echo "<script>alert('Se registró');</script>";
            echo "<script>location.href='usuarioLista.php';</script>";
        } else {
            // Muestra un mensaje de error en caso de fallo en el registro
            echo "ERROR";
        }
    }
?>
