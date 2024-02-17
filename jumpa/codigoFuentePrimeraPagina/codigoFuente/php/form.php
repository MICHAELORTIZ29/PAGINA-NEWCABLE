<?php 
    $servidor = "localhost";
    $usuario = "newcable_newcable";
    $clave = "3030m60des@hogo";
    $basedeDatos = "newcable_newcable";
    
    //Creamos la conexion con la base de  datos

    $conexion = new mysqli($servidor, $usuario,$clave,$basedeDatos); 

    //Comprobamos si la conexión se realizó de manera correcta
      if($conexion -> connect_error){
            die("Conexión Fallida".$conexion -> connect_error);
      }  

    //Obtenemos los datos del formulario 
    $nombre = $_POST["nombre"];
    $apellidopaterno = $_POST["apellidopaterno"];
    $apellidomaterno = $_POST["apellidomaterno"];
    $departamento = $_POST["departamento"];
    $direccion = $_POST["direccion"];
    $referencia = $_POST["referencia"];
    $celular  = $_POST["celular"];
    $correo_electronico = $_POST["correo_electronico"];
    $planesdeservicio = $_POST["planesdeservicio"];

    //Insertamos los datos en la tabla de la base de datos
    $sql = "INSERT INTO regiscliente (nombre,apellidopaterno,apellidomaterno,departamento,direccion,referencia,celular,correo_electronico,planesdeservicio)
        VALUES ('$nombre','$apellidopaterno','$apellidomaterno','$departamento','$direccion','$referencia','$celular',
    '$correo_electronico','$planesdeservicio')";   

    if($conexion -> query($sql) === true){
        echo "Los datos se han registrado de manera exitosa";
    }else{
        echo"Error".$sql."<br>".$conexion -> error;
    }
    //Por ultimo, cerramos la conexion a la base de datos
    $conexion -> close();


?>