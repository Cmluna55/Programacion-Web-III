<?php
    
    $auth=$_SESSION['login'];

    if(!$auth){
        header('Location:/segunda prueba');
    }
    $inicio=false;
    include "../../../includes/templates/header.php";

?>
    <main class="contenedor seccion">
    <br>
    <a href="/segunda prueba/admin/inicio.php" class="btn btn-danger">Volver</a>
    <a href="/segunda prueba/admin/controlador/usuario/nuevoUsuario.php" class="btn btn-success">Nuevo Usuario</a>
    <?php
        if($_SESSION['rol']=="Administrador"){
    ?>
    <a href="/segunda prueba/admin/controlador/usuario/usuarioListaHab.php" class="btn btn-success">Habilitados</a>
    <a href="/segunda prueba/admin/controlador/usuario/usuarioListaInhab.php" class="btn btn-success">Inhabilitados</a>
    <a href="/segunda prueba/admin/controlador/ciudad/ciuLista.php" class="btn btn-success">Ciudades</a>
    <?php
        }
    ?>
    <br>
    <br>
        <h1 style="text-align: center;">LISTADO GENERAL DE USUARIOS</h1>
        <br>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>F. NAC.</th>
                <th>CELULAR</th>
                <th>EMAIL</th>
                <th>CI</th>
                <th>CIUDAD</th>
                <th>DIRECCION</th>
                <th>USUARIO</th>
                <th>ESTADO</th>
                <th>ROL</th>
                <th colspan="2">Acciones</th>
            </tr>
                <?php

                    while($reg = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$reg['idCliente']."</td>";
                        echo "<td>".$reg['nombre']."</td>";
                        echo "<td>".$reg['paterno']."</td>";
                        echo "<td>".$reg['materno']."</td>";
                        echo "<td>".$reg['fechaNac']."</td>";
                        echo "<td>".$reg['celular']."</td>";
                        echo "<td>".$reg['email']."</td>";
                        echo "<td>".$reg['ci']."</td>";
                        echo "<td>".$reg['descripCiudad']."</td>";
                        echo "<td>".$reg['direccion']."</td>";
                        echo "<td>".$reg['usuario']."</td>";  
                        echo "<td>".$reg['descripEstadoTraje']."</td>";                      
                        echo "<td>".$reg['rol']."</td>";
                        if($reg['idEstadoTraje']==3){
                            echo "<td> <a href='/segunda prueba/admin/controlador/usuario/usuInhabilita.php?cod=".$reg['idCliente']."' class='btn btn-danger'>inhabilitar</a> </td>";
                        }else{
                            echo "<td> <a href='/segunda prueba/admin/controlador/usuario/usuHabilita.php?cod=".$reg['idCliente']."' class='btn btn-danger'>habilitar</a> </td>";
                        }
                        echo "<td> <a href='/segunda prueba/admin/controlador/usuario/usuModifica.php?cod=".$reg['idCliente']."' class='btn btn-success'>Modificar</a> </td>";
                        
                        echo "</tr>";
                    }
                ?>
        </table>
    </main>

<?php
    include"../../../includes/templates/footer.php";
?>