<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="descripcion"></textarea>
          </div>
          <div class="form-group">
            <textarea name="precio" rows="2" class="form-control" placeholder="precio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="categoria" rows="2" class="form-control" placeholder="categoria"></textarea>
          </div>
          <div class="form-group">
            <textarea name="estatus" rows="2" class="form-control" placeholder="estatus"></textarea>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>nombre</th>
            <th>Description</th>
            <th>precio</th>
            <th>categoria</th>
            <th>estatus</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM producto";
          $result_tasks = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <tr>
              <td><?php echo $row['idProducto']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['precio']; ?></td>
              <td><?php echo $row['categoria']; ?></td>
              <td><?php echo $row['estatus']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row['idProducto'] ?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete_task.php?id=<?php echo $row['idProducto'] ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>