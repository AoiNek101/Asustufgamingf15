<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "informacion";

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

//Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$celular = $_POST['celular'] ?? '';
$email = $_POST['email'] ?? '';

if ($nombre !== '' && $apellido !== '' && $celular !== '' && $email !== '') {
    $sql = "INSERT INTO usuarios(nombre, apellido, celular, email) VALUES ('$nombre', '$apellido', '$celular', '$email')";

    if ($conn->query($sql)) {
        $response = array(
            'status' => 'success',
            'message' => 'Gracias por su registro'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error en la inserción en la base de datos'
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error: Datos del formulario incompletos.'
    );
    echo json_encode($response);
}

$conn->close();
?>
