<?php
    session_start();
    $auth=$_SESSION['login'];
    if(!$auth){
        header('Location:/segunda prueba');
    }
    $inicio=false;
    include "../../../includes/templates/header.php";

?>

<style>
    /* Encapsulación de estilos del modal */
    #modalAgregarCiudad {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        display: none; /* Inicialmente oculto */
        justify-content: center;
        align-items: center;
        z-index: 1050; /* Asegurar que esté por encima de otros elementos */
    }

    #modalAgregarCiudad .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        position: relative;
    }

    #modalAgregarCiudad .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }

    #modalAgregarCiudad .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    #modalAgregarCiudad label {
        display: block;
        margin-bottom: 5px;
    }

    #modalAgregarCiudad input,
    #modalAgregarCiudad select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #modalAgregarCiudad button {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #modalAgregarCiudad button[type="submit"] {
        background-color: #28a745;
        color: white;
    }

    #modalAgregarCiudad button[type="button"] {
        background-color: #dc3545;
        color: white;
    }
</style>
<main class="contenedor seccion">
    <br>
    <a href="/segunda prueba/admin/controlador/usuario/usuarioLista.php" class="btn btn-danger">Volver</a>
    <!-- Modal para agregar una nueva opción -->
    <div id="modalAgregarCiudad">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2>Agregar Nueva Ciudad</h2>
            <form action="registrarCiudad.php" method="POST">
                <input type="hidden" name="tipoOpcion" value="ciudad"> <!-- Identificar que es para ciudad -->
                <div class="form-group">
                    <label for="nombreCiudad">Nombre de la Ciudad:</label>
                    <input type="text" id="nombreCiudad" name="nombreCiudad" required>
                </div>
                <button type="submit">Guardar</button>
                <button type="button" onclick="cerrarModal()">Cancelar</button>
            </form>
        </div>
    </div>

    <!-- Botones para abrir el modal -->
    <button type="button" class="btn btn-success" onclick="mostrarModal()">Agregar Ciudad</button>

    <br>
    <br>
        <h1 style="text-align: center;">LISTADO DE CIUDADES</h1>
        <br>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>CIUDAD</th>
                <!--<th>ESTADO</th>-->
                <th>Acciones</th>
            </tr>
                <?php

                    while($reg = $res->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$reg['idCiudad']."</td>";
                        echo "<td>".$reg['descripCiudad']."</td>";
                        /*echo "<td>".$reg['descripEstadoTraje']."</td>";
                        if($reg['idEstadoTraje']==1){
                            echo "<td> <a href='../controlador/ciudad/ciuInhab.php?cod=".$reg['idCiudad']."' class='btn btn-danger'>inhabilitar</a> </td>";
                        }else{
                            echo "<td> <a href='../controlador/ciudad/ciuHab.php?cod=".$reg['idCiudad']."' class='btn btn-danger'>habilitar</a> </td>";
                        }*/
                        echo "<td> <a href='../controlador/ciudad/ciuModifica.php?cod=".$reg['idCiudad']."' class='btn btn-success'>Modificar</a> </td>";
                        
                        echo "</tr>";
                    }
                ?>
        </table>
</main>

    <script>
        // Mostrar el modal con el tipo de opción seleccionado
        function mostrarModal() {
            document.getElementById('modalAgregarCiudad').style.display = 'flex'; // Mostrar el modal
        }

        // Cerrar el modal
        function cerrarModal() {
            document.getElementById('modalAgregarCiudad').style.display = 'none'; // Ocultar el modal
        }
    </script>

<?php
    include "../../../includes/templates/footer.php";
?>