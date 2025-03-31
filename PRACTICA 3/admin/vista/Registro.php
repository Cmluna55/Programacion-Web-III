<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Registro</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" type="text/css" href="../../../build/css/estilos.css">
  <script src="https://kit.fontawesome.com/5baedcb640.js" crossorigin="anonymous"></script>

</head>
<body1>

    <!--Formulario de registro-->
    <div class="Registro">
    	<header>REGISTRO DE DATOS DEL USUARIO</header>

    	<div class="progress-bar">
    		<div class="paso">
    			<p> Personal</p>
    			<div class="num">
    				<span>1</span>
    			</div>
    			<div class="check fas fa-check"></div>
    		</div>
    		<div class="paso">
    			<p> Contacto</p>
    			<div class="num">
    				<span>2</span>
    			</div>
    			<div class="check fas fa-check"></div>
    		</div>
    		<div class="paso">
    			<p> Usuario</p>
    			<div class="num">
    				<span>3</span>
    			</div>
    			<div class="check fas fa-check"></div>
    		</div>
    	</div>

    	<div class="form-princ">
    		<form method="POST">

    			<!--PAGINA 1-->
    			<div class="pagina movPag">
    				<div class="titulo">Datos Personales</div>
    				<div class="campo">
    					<div class="label">Nombres:  </div>
						<input type="text" name="nom" id="nom" placeholder="Nombre">
    				</div>
    				<div class="campo">
    					<div class="label">Apellido Paterno:  </div>
    					<input type="text" name="pat" id="pat" placeholder="Apellido Paterno">
    				</div>
    				<div class="campo">
    					<div class="label">Apellido Materno:  </div>
    					<input type="text" name="mat" id="mat" placeholder="Apellido Materno">
    				</div>
    				<div class="campo">
    					<div class="label">Fecha de Nacimiento:  </div>
    					<input type="date" name="fechaNac" id="fechaNac">
    				</div>
					<div class="campo">
    					<div class="label">CI:  </div>
    					<input type="number" name="ced" id="ced">
    				</div>
    				<div class="campo sigPag">
    					<button>Siguiente</button>
    				</div>
					<p>¿Ya tienes una cuenta?<a href="../../../Iniciar_Sesion.php">Iniciar Sesion</a></p>
    			</div>

    			<!--PAGINA 2-->
    			<div class="pagina movPag">
    				<div class="titulo">Datos de Contacto</div>
    				<div class="campo">
    					<div class="label">Numero de Celular:</div>
    					<input type="number" name="tel" id="tel" placeholder="Telefono">
    				</div>
    				<div class="campo">
    					<div class="label">Correo Electronico:</div>
    					<input type="email" name="ema" id="ema" placeholder="usuario @gmail.com">
    				</div>
    				<div class="campo">
    					<div class="label">Ciudad:</div>
    					<select name="ciu" id="ciu">
						<?php
							// Incluye el archivo de configuración de la base de datos y establece la conexión
							include "../../modelo/conexion.php";
							$db = conectarDB();
							
							// Consulta SQL para obtener todos los vendedores activos
							$con_sql = "SELECT * FROM ciudad";
							$res = mysqli_query($db, $con_sql);
							
							// Itera sobre el resultado y crea una opción en el menú desplegable por cada vendedor
							while ($reg = $res->fetch_assoc()) {
						?>
							<option value="<?php echo $reg['idCiudad']; ?>"><?php echo $reg['descripCiudad']; ?></option>
						<?php
							}
						?>
    					</select>
    				</div>
    				<div class="campo">
    					<div class="label">Direccion:</div>
    					<input type="text" name="dir" id="dir" placeholder="Direccion">
    				</div>
    				<div class="campo btns">
    					<button class="volver-pag1 volver">Anterior</button>
    					<button class="adelante-pag3 adelante">Siguiente</button>
    				</div>
					<p>¿Ya tienes una cuenta?<a href="../../Iniciar_Sesion.php">Iniciar Sesion</a></p>
    			</div>

    			<!--PAGINA 3-->
    			<div class="pagina">
    				<div class="titulo">Datos de Inicio de Sesion</div>
    				<div class="campo">
    					<div class="label">Usuario:</div>
    					<input type="text" name="usu" id="usu" placeholder="Nombre de Usuario">
    				</div>
    				<div class="campo">
    					<div class="label">Contraseña:</div>
    					<input type="password" name="pas" id="pas">
    					<span class="ojos" onclick="mostrarContra1()">
    						<i id="mostrar1" class="fa fa-eye" title="Mostrar Contraseña"></i>
    						<i id="ocultar1" class="fa fa-eye-slash" title="Ocultar Contraseña"></i>
    					</span>
    				</div>
					<?php
						if(isset($_SESSION['rol']) && $_SESSION['rol'] == "Administrador"){
					?>
					<div class="campo">
    					<div class="label">Rol:</div>
    					<select name="rol" id="rol">
							<option value="1">Administrador</option>
							<option value="2">Cliente</option>
						</select>
					</div>
					<?php
							}
					?>
    				<div class="campo btns">
    					<button class="volver-pag2 volver">Anterior</button>
    					<button type="submit" value="registrar Usuario" name="registrarUsu">Registrame</button>
    				</div>
    				<p>¿Ya tienes una cuenta?<a href="../../Iniciar_Sesion.php">Iniciar Sesion</a></p>
    			</div>

    		</form>
    	</div>
    </div>
 
 <!--Scripts-->
  <script src="../../../build/js/movimiento.js"></script>
</body>    
</html>