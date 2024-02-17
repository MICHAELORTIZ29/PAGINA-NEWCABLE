<?php
/*Funcion para permitir el tamaño de los archivos en la imagen*/
$servername = "localhost";
$username = "newcable_newcable";
$password = "3030m60des@hogo";
$dbname = "newcable_newcable";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Verificar si la carpeta "uploads" tiene permisos de escritura
if (!is_writable('./uploads/')) {
    die("La carpeta 'uploads' no tiene permisos de escritura. Asegúrate de que tenga los permisos correctos (chmod 777).");
}


// Verificar si la variable $_FILES["file"]["tmp_name"] está vacía
if (empty($_FILES['file']['tmp_name'])) {
    die("El archivo no se ha cargado correctamente. Verifica que el formulario HTML esté configurado correctamente.");
}

// Verificar la ruta de la carpeta "uploads"
if (!file_exists('./uploads/')) {
    die("La carpeta 'uploads' no existe. Verifica que la ruta sea correcta.");
}

// Obtener los datos enviados desde el formulario
$puntodeventa = $_POST['puntodeventa'];
$planes = $_POST['planes'];
$nombres_completos = $_POST['nombres_completos'];
$direccion = $_POST['direccion'];
$referencia = $_POST['referencia'];
$celular = $_POST['celular'];
$file = $_FILES['file']['name'];

// Mover archivo de imagen a una carpeta en el servidor
$ruta = "./uploads/".$file;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $ruta)) {
    // Insertar los datos en la tabla "PVBD"
    $sql = "INSERT INTO pvdb (puntodeventa, planes, nombres_completos, direccion, referencia, celular, file) 
            VALUES ('$puntodeventa', '$planes', '$nombres_completos', '$direccion', '$referencia', '$celular', '$ruta')";

    if (mysqli_query($conn, $sql)) {
        echo "Registro creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Se ha producido un error al cargar el archivo
    echo "Error al cargar el archivo: " . $_FILES["file"]["error"];
}

// Cerrar la conexión
mysqli_close($conn);
?>








