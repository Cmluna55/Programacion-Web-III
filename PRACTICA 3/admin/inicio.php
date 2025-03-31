<?php
    session_start();
    $auth=$_SESSION['login'];
    if (!$auth){
        header('Location:/segunda prueba');
    }
    $inicio=false;
    include"../includes/templates/header.php";
?>
    <main class="contenedor seccion">
        <br>
        <h1 style="text-align: center;">Bienvenido</h1>
        <br>
        <?php
            if($_SESSION['rol']=="Administrador"){
        ?>
        <center><a href="./trajes/listaTrajes.php" class="btn btn-danger btn-lg">Inventario Trajes</a>
        <a href="./controlador/usuario/usuarioLista.php" class="btn btn-warning btn-lg">Usuarios</a></center>
        <?php
            }else{
        ?>
                <center><a href="./controlador/usuario/usuarioLista.php" class="btn btn-success btn-lg">Usuario</a></center>
        <?php
                }
        ?>
    </main>
    <br><br>

<?php
    include"../includes/templates/footer.php";
?>