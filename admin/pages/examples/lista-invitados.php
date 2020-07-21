<?php
// Antes que nada, verificamos la sesion
include 'funciones/sesiones.php';
include 'funciones/funciones.php';
include 'templates/header.php';
include 'templates/barra-superior.php';
include 'templates/navegacion-lateral.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Invitados</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Maneja los invitados</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Biografía</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>

                <?php
                try {
                  $sql = "SELECT * FROM invitados";
                  $resultado = $conn->query($sql);
                } catch (Exception $e) {
                  $error = $e->getMessage();
                  echo $error;
                }
                while($invitado = $resultado->fetch_assoc()) { ?>
                    
                    <tr>
                    <td><?php echo $invitado['nombre_invitado'] . " " . $invitado['apellido_invitado']; ?></td>
                    <td><?php echo $invitado['descripcion']; ?></td>
                    <td><?php echo $invitado['url_imagen']; ?></td>
                    <td>
                      <a href="editar-invitado.php?id=<?php echo $invitado['invitado_id'] ?>" class="btn bg-gradient-warning btn-sm margin">
                      <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="#" data-id="<?php echo $invitado['invitado_id']; ?>" data-tipo="invitado" class="btn bg-gradient-danger btn-sm borrar_registro">
                      <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>

                <?php } ?>

              </tbody>
              <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Biografía</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/footer.php';
?>