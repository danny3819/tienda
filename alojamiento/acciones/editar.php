<?php

include('../connect/coneccion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conectado,$query);
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $nombre = $row['nombre'];
        $articulos = $row['articulos'];
        $costo = $row['costo'];
        }

if (isset($_POST['actualizar'])) {
   $id = $_GET['id'];
   $nombre = $_POST['nombre'];
   $articulos = $_POST['articulos'];
   $costo = $_POST['costo'];
   $query = "UPDATE clientes SET nombre = '$nombre', articulos = '$articulos', costo = '$costo' WHERE id = $id";
   mysqli_query($conectado,$query);
    $_SESSION['message'] = "has actualizado a un cliente" ;
    $_SESSION['message_type'] = "primary";
    header("Location: ../primer.php");
}
}
?>
<?php include("../estructura/head.php")?>

<div class="container p-4">
<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="editar.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="form-group">
                    <input type="text" name="nombre" placeholder="cambiar nombre" class="form-control" value="<?php echo $nombre;?>"  />
                </div>
                <br>
                <div class="form-group">
                <textarea class="form-control" name="articulos" rows="2" placeholder="actualizar articulos"><?php echo $articulos;?></textarea>
                </div>
                <br>
                <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input name="costo" value="<?php echo $costo; ?>" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                <button class="btn btn-success col-12" name="actualizar"> actualizar </button>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../estructura/footer.php")?>