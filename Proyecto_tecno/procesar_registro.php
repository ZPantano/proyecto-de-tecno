<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Conecta a la base de datos (ajusta los detalles de conexión según tu configuración)
    $conexion = new mysqli("localhost", "root", "", "TECNO");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Prepara la consulta SQL para insertar datos en la tabla usuarios (ajusta según tu estructura de tabla)
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";

    // Ejecuta la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>
