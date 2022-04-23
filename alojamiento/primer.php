<?php 
include('./connect/coneccion.php');
?>

<?php 
include('./estructura/head.php');
?>
<div class="container-fluid p-4">


  <div class="row">


    <div class="col-md-4 col-xs-12">

      <?php if (isset($_SESSION['message'])) { ?>

       <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">

        <?= $_SESSION['message'] ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php session_unset();} ?>

      <div class="card card-body">


        <form action="./estructura/guardar.php" method="POST">

          <div class="form-group">
            <input type="text" name="titulo" placeholder="nombre" class="form-control" autofocus>
          </div>
            
          <br>

          <div class="form-group">
            <textarea class="form-control" rows="3" name="descripcion" placeholder="articulos"></textarea>
          </div>

          <br>

          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input name="costo" type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
          </div>

          <br>

          <input type="submit" class="btn btn-success btn-block col-12" value="enviar" name="enviar">


        </form>


      </div>


    </div>


    <div class="col-md-8 col-xs-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>  
                <th>nombre</th>
                <th>articulos</th>
                <th>costo</th>
                <th>fecha</th>
                <th>acciones</th>
              </tr>
            </thead>

            <?php 
            $query = "SELECT * FROM  clientes";
            $consulta = mysqli_query($conectado,$query);

            while($row = mysqli_fetch_array($consulta)){
            ?>
            <tr>

              <td><?php echo $row['id'] ?></td>  
              <td><?php echo $row['nombre'] ?></td>
              <td><?php echo $row['articulos'] ?></td>
              <td><?php echo $row['costo'] ?></td>
              <td><?php echo $row['fecha'] ?></td>
              
              <td> 

                <a href="./acciones/editar.php?id=<?php echo $row['id'] ?>"  class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/></svg></a>

                <a href="./acciones/borrar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                </a>

              </td>

            </tr>
            <?php } ?>
          </table>
    </div>


  </div>


</div>
<?php
include('./estructura/footer.php')
?>