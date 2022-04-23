<?php

include('../connect/coneccion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conectado,$query);
    if (!$resultado) {
        die("algo salio mal broder");
    }

    $_SESSION['message'] = "has eliminado un cliente de la tabla" ;
    $_SESSION['message_type'] = "danger";
    header("Location: ../primer.php");
}
?>