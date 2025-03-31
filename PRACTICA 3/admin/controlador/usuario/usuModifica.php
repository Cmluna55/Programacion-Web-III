<?php

    include "../../vista/Modifica.php";
    
    $idu=$_GET['cod'];
    $con_sql="SELECT * FROM cliente WHERE idCliente='$idu'";
    $res=mysqli_query($db,$con_sql);
    $reg=mysqli_fetch_array($res);
    if (isset($_POST['Modificar'])) {
        $n = $_POST['nom'];
        $pat = $_POST['pat'];
        $m = $_POST['mat'];
        $dni = $_POST['ced'];
        $f= $reg['fechaNac'];
        $t = $_POST['tel'];
        $e = $_POST['ema'];
        $c = $_POST['ciu'];
        $d = $_POST['dir'];
        $u = $_POST['usu'];
        $p = $_POST['pas'];
        $r = $_POST['rol'];
        
        $pashas = !empty($p) ? password_hash($p, PASSWORD_DEFAULT) : $reg['pasword'];
    
        include "../../modelo/usuario.php";
        $usu = new Usuario("", "", "", "", "", "", "", "", "", "", "", "", "", "");

        // Pasa como argumentos el correo, la contraseña hasheada y el rol determinado
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == "Administrador") {
            if ($r == 1) {
                $rol = "Administrador";
            } elseif ($r == 2) {
                $rol = "Cliente";
            }

            // Registrar el usuario con el rol definido
            $x = $usu->modificarUsuario1($idu, $n, $pat, $m, $dni, $f, $t, $e, $c, $d, $u, $pashas, $rol);
        } else {
            // Registrar el usuario sin rol adicional
            $x = $usu->modificarUsuario2($idu, $n, $pat, $m, $dni,$f, $t, $e, $c, $d, $u, $pashas);
        }
    
        if ($x) {
            echo "<script>alert('Se modificó con éxito');</script>";
            echo "<script>location.href='usuarioLista.php';</script>";
        } else {
            echo "ERROR: No se pudo modificar el usuario.";
        }
    }
?>
