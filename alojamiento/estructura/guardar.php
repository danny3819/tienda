<?php 

include("../connect/coneccion.php");

if (isset($_POST['enviar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $costo = $_POST['costo'];
    echo $titulo;
    echo $descripcion;
    $query = "INSERT INTO clientes (nombre, articulos,costo) VALUES ('$titulo', '$descripcion','$costo')";
    $insertando = mysqli_query($conectado,$query);
    
    if (!$insertando) {
        die("Error no esta bien algo");
    }

    
    $_SESSION['message'] = "mensage guardado con faltas de ortografia";
    $_SESSION['message_type'] = "success";
    
    header("Location: ../primer.php");
    }



?>