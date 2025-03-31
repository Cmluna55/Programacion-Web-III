<?php
// Define la clase Usuario para representar a los usuarios en el sistema
class Usuario
{
    // Atributos protegidos para almacenar la información del usuario
    protected $idCliente;
    protected $nombre;
    protected $paterno;
    protected $materno;
    protected $fechaNac;
    protected $celular;
    protected $email;
    protected $ci;
    protected $idCiudad;
    protected $direccion;
    protected $usuario;
    protected $contrasena;
    protected $idEstadoTraje;
    protected $rol;

    // Constructor de la clase Usuario que inicializa los atributos con los valores dados
    public function __construct($idCliente, $nombre, $paterno, $materno, $fechaNac, $celular, $email, $ci, 
                                $idCiudad, $direccion, $usuario, $contrasena, $idEstadoTraje, $rol)
    {
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->fechaNac = $fechaNac;
        $this->celular = $celular;
        $this->email = $email;
        $this->ci = $ci;
        $this->idCiudad = $idCiudad;
        $this->direccion = $direccion;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->idEstadoTraje = $idEstadoTraje;
        $this->rol = $rol;
    }

    // Método para obtener la lista de usuarios basada en el rol del usuario
    public function listaUsuario($usuarioActualId, $rolActual)
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Verifica el rol del usuario para definir la consulta
        if ($rolActual === 'Administrador') {
            // Si el usuario es Administrador, muestra toda la lista de usuarios
            $consql = "SELECT cli.*, ciu.*, iet.*
                        FROM cliente cli
                        LEFT JOIN ciudad ciu ON cli.idCiudad = ciu.idCiudad
                        LEFT JOIN estadotraje iet ON cli.idEstadoTraje = iet.idEstadoTraje";
        } else if ($rolActual === 'Cliente') {
            // Si el usuario es Cliente, solo muestra su propio registro
            $consql = "SELECT cli.*, ciu.*, iet.*
                        FROM cliente cli
                        LEFT JOIN ciudad ciu ON cli.idCiudad = ciu.idCiudad
                        LEFT JOIN estadotraje iet ON cli.idEstadoTraje = iet.idEstadoTraje
                        WHERE cli.idCliente = ?";
        } else {
            // Si el rol no es válido, retorna null
            return null;
        }

        // Ejecuta la consulta
        if ($rolActual === 'Cliente') {
            $stmt = $db->prepare($consql);
            $stmt->bind_param("i", $usuarioActualId); // Vincula el id del usuario actual
            $stmt->execute();
            $res = $stmt->get_result();
            $stmt->close();
        } else {
            $res = mysqli_query($db, $consql);
        }

        // Retorna el resultado de la consulta
        return $res;
    }
    // Método para obtener la lista de usuarios habilitados
    public function listaUsuarioHab()
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Consulta SQL para seleccionar todos los usuarios con estado "Habilitado"
        $consql = "SELECT cli.*, ciu.*,iet.*
                    FROM cliente cli
                    INNER JOIN ciudad ciu ON cli.idCiudad = ciu.idCiudad
                    JOIN estadotraje iet ON cli.idEstadoTraje=iet.idEstadoTraje
                    WHERE cli.idEstadoTraje LIKE '3'";
        
        // Ejecuta la consulta y almacena el resultado en $res
        $res = mysqli_query($db, $consql);

        // Retorna el resultado de la consulta
        return $res;
    }
    // Método para obtener la lista de usuarios inhabilitados
    public function listaUsuarioInhab()
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Consulta SQL para seleccionar todos los usuarios con estado "Inhabilitado"
        $consql = "SELECT cli.*, ciu.*,iet.*
                    FROM cliente cli
                    INNER JOIN ciudad ciu ON cli.idCiudad = ciu.idCiudad
                    JOIN estadotraje iet ON cli.idEstadoTraje=iet.idEstadoTraje
                    WHERE cli.idEstadoTraje LIKE '4'";
        
        // Ejecuta la consulta y almacena el resultado en $res
        $res = mysqli_query($db, $consql);

        // Retorna el resultado de la consulta
        return $res;
    }
    // Método para registrar un nuevo usuario en la base de datos(administrador)
    public function registrarUsuario1($n, $pat, $m, $f, $dni, $t, $e, $c, $d, $u, $p, $rol)
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Consulta SQL para insertar un nuevo registro de usuario con los valores dados
        $res = $db->query("INSERT INTO cliente (nombre, paterno, materno, fechaNac, celular, email, ci, idCiudad, direccion, usuario, pasword, idEstadoTraje, rol) VALUES ('$n', '$pat', '$m', '$f', '$t', '$e', '$dni', '$c', '$d', '$u', '$p', '3', '$rol')");

        // Retorna el resultado de la consulta de inserción
        return $res;
    }

    // Método para registrar un nuevo usuario en la base de datos(cliente)
    public function registrarUsuario2($n, $pat, $m, $f, $dni, $t, $e, $c, $d, $u, $p)
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Consulta SQL para insertar un nuevo registro de usuario con los valores dados
        $res = $db->query("INSERT INTO cliente (nombre, paterno, materno, fechaNac, celular, email, ci, idCiudad, direccion, usuario, pasword, idEstadoTraje, rol) VALUES ('$n', '$pat', '$m', '$f', '$t', '$e', '$dni', '$c', '$d', '$u', '$p', '3', 'Cliente')");

        // Retorna el resultado de la consulta de inserción
        return $res;
    }

     // Método para modificar un nuevo usuario en la base de datos(administrador)
     public function modificarUsuario1($idu,$n, $pat, $m, $dni, $f, $t, $e, $c, $d, $u, $p, $rol)
     {
         // Incluye el archivo de conexión a la base de datos
         include_once "conexion.php";
         $db = conectarDB();
 
         // Consulta SQL para insertar un nuevo registro de usuario con los valores dados
         $res = $db->query("UPDATE cliente SET nombre='$n', paterno='$pat', materno='$m', fechaNac='$f', celular='$t', email='$e', ci='$dni', idCiudad='$c', direccion='$d', usuario='$u', pasword='$p', rol='$rol' WHERE idCliente='$idu'");
 
         // Retorna el resultado de la consulta de inserción
         return $res;
     }
 
     // Método para modificar un nuevo usuario en la base de datos(cliente)
     public function modificarUsuario2($idu,$n, $pat, $m, $dni, $f, $t, $e, $c, $d, $u, $p)
     {
         // Incluye el archivo de conexión a la base de datos
         include_once "conexion.php";
         $db = conectarDB();
 
         // Consulta SQL para insertar un nuevo registro de usuario con los valores dados
         $res = $db->query("UPDATE cliente SET nombre='$n', paterno='$pat', materno='$m', fechaNac='$f', celular='$t', email='$e', ci='$dni', idCiudad='$c', direccion='$d', usuario='$u', pasword='$p' WHERE idCliente='$idu'");
 
         // Retorna el resultado de la consulta de inserción
         return $res;
     }
}
?>