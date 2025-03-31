<?php
// Define la clase Ciudad para representar a las ciudades en el sistema
class Ciudad
{
    // Atributos protegidos para almacenar la información de la ciudad
    protected $idCiudad;
    protected $descripCiudad;

    // Constructor de la clase Ciudad que inicializa los atributos con los valores dados
    public function __construct($idCiudad, $descripCiudad)
    {
        $this->idCiudad=$idCiudad;
        $this->descripCiudad=$descripCiudad;
    }

    // Método para obtener la lista general de usuarios
    public function listaCiudad()
    {
        // Incluye el archivo de conexión a la base de datos
        include_once "conexion.php";
        $db = conectarDB();

        // Consulta SQL para seleccionar todos los usuarios con estado "Activo"
        $consql = "SELECT * FROM ciudad;";
        
        // Ejecuta la consulta y almacena el resultado en $res
        $res = mysqli_query($db, $consql);

        // Retorna el resultado de la consulta
        return $res;
    }
}
?>