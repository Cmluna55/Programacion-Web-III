<?php
	session_start();

	include "../../modelo/conexion.php";
	$db = conectarDB();
	    
    $idu=$_GET['cod'];
    $con_sql="SELECT * FROM cliente WHERE idCliente='$idu'";
    $res=mysqli_query($db,$con_sql);
    $reg=mysqli_fetch_array($res);
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
    	<header>ACTUALIZACION DE DATOS DEL USUARIO</header>

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
						<input type="text" name="nom" id="nom" value="<?php echo $reg['nombre']?>">
    				</div>
    				<div class="campo">
    					<div class="label">Apellido Paterno:  </div>
    					<input type="text" name="pat" id="pat" value="<?php echo $reg['paterno']?>">
    				</div>
    				<div class="campo">
    					<div class="label">Apellido Materno:  </div>
    					<input type="text" name="mat" id="mat" value="<?php echo $reg['materno']?>">
    				</div>
					<div class="campo">
    					<div class="label">CI:  </div>
    					<input type="number" name="ced" id="ced" value="<?php echo $reg['ci']?>">
    				</div>
    				<div class="campo sigPag">
    					<button>Siguiente</button>
    				</div>
    			</div>

    			<!--PAGINA 2-->
    			<div class="pagina movPag">
    				<div class="titulo">Datos de Contacto</div>
    				<div class="campo">
    					<div class="label">Numero de Celular:</div>
    					<input type="number" name="tel" id="tel" value="<?php echo $reg['celular']?>">
    				</div>
    				<div class="campo">
    					<div class="label">Correo Electronico:</div>
    					<input type="email" name="ema" id="ema" value="<?php echo $reg['email']?>">
    				</div>
    				<div class="campo">
    					<div class="label">Ciudad:</div>
    					<select name="ciu" id="ciu" value="<?php echo $reg['idCiudad']?>">
						<?php							
							// Consulta SQL para obtener todos los vendedores activos
							$con_sql = "SELECT * FROM ciudad";
							$y = mysqli_query($db, $con_sql);
							
							// Itera sobre el resultado y crea una opción en el menú desplegable por cada vendedor
							while ($z = $y->fetch_assoc()) {
								$selected = ($z['idCiudad'] == $reg['idCiudad']) ? 'selected' : '';
								?>
								<option value="<?php echo $z['idCiudad']; ?>" <?php echo $selected; ?>>
									<?php echo $z['descripCiudad']; ?>
								</option>
						<?php
							}
						?>
    					</select>
    				</div>
    				<div class="campo">
    					<div class="label">Direccion:</div>
    					<input type="text" name="dir" id="dir" value="<?php echo $reg['direccion']?>">
    				</div>
    				<div class="campo btns">
    					<button class="volver-pag1 volver">Anterior</button>
    					<button class="adelante-pag3 adelante">Siguiente</button>
    				</div>
    			</div>

    			<!--PAGINA 3-->
    			<div class="pagina">
    				<div class="titulo">Datos de Inicio de Sesion</div>
    				<div class="campo">
    					<div class="label">Usuario:</div>
    					<input type="text" name="usu" id="usu" value="<?php echo $reg['usuario']?>">
    				</div>
    				<div class="campo">
    					<div class="label">Contraseña:</div>
    					<input type="password" name="pas" id="pas" >
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
    					<select name="rol" id="rol" value="<?php echo $reg['rol']?>">
							<option value="1">Administrador</option>
							<option value="2">Cliente</option>
						</select>
					</div>
					<?php
							}
					?>
    				<div class="campo btns">
    					<button class="volver-pag2 volver">Anterior</button>
    					<button type="submit" value="modificar Usuario" name="Modificar">Modificar</button>
    				</div>
    			</div>

    		</form>
    	</div>
    </div>
 
 <!--Scripts-->
  <script src="../../../build/js/movimiento.js"></script>
</body>    
</html>