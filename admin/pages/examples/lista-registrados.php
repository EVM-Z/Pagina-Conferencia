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
          <h1>Listado de Registrados</h1>
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
            <h3 class="card-title">Maneja los registrados</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
                <th>Artículos</th>
                <th>Talleres</th>
                <th>Regalo</th>
                <th>Compra</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>

                <?php
                try {
                  /*Llamar al valor regalo que se ubica en otra tabla*/
                  $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                  $sql .= " JOIN regalos ";
                  $sql .= " ON registrados.regalo = regalos.ID_regalo ";
                  $resultado = $conn->query($sql);
                } catch (Exception $e) {
                  $error = $e->getMessage();
                  echo $error;
                }
                while($registrado = $resultado->fetch_assoc()) { ?>

                    <tr>
                        <td><?php echo $registrado['nombre_registrado'] . " " . $registrado['apellido_registrado'];
                            $pagado = $registrado['pagado'];
                            if ($pagado) {
                                echo '<span class="badge bg-green">No ha pagado</span>';
                            } else {
                                echo '<span class="badge bg-red">No ha pagado</span>';
                            }
                            
                        ?></td>
                        <td><?php echo $registrado['email_registrado']; ?></td>
                        <td><?php echo $registrado['fecha_registro']; ?></td>
                        <td>
                          <?php
                            // json_decode convierte un JSON en arreglo
                            $articulos = json_decode($registrado['pases_articulos'], true);
                            // Creamos un arreglo para cambiar los valores del arreglo anterior
                            $arreglo_articulos = array(
                              'un_dia' => 'Pase 1 día',
                              'pase_2dias' => 'Pase 2 días', 
                              'pase_completo' => 'Pase Completo',
                              'camisas' => 'Camisas',
                              'etiquetas' => 'Etiquetas'
                            );
                            
                            foreach ($articulos as $llave => $articulo) {
                              if (is_array($articulo) && array_key_exists('cantidad', $articulo)) {
                                echo $articulo['cantidad'] . " " . $arreglo_articulos[$llave] . "<br>";
                              } else{
                                echo $articulo . " - " . $arreglo_articulos[$llave] . "<br>";
                              } 
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            $eventos_resultado = $registrado['talleres_registrados'];
                            $talleres = json_decode($eventos_resultado, true);

                            $talleres = implode("', '", $talleres['eventos']);
                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres') ";
                            
                            $resultado_talleres = $conn->query($sql_talleres);
                            

                            while ($eventos = $resultado_talleres->fetch_assoc()) {
                              echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                            }
                          ?>
                        </td>
                        <td><?php echo $registrado['nombre_regalo']; ?></td>
                        <td><?php echo (float) $registrado['total_pagado']; ?></td>
                        <td>
                            <a href="editar-registro.php?id=<?php echo $registrado['ID_registrado']; ?>" class="btn bg-gradient-warning btn-sm margin">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $registrado['ID_registrado']; ?>" data-tipo="registrado" class="btn bg-gradient-danger btn-sm borrar_registro">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        
                    </tr>

                <?php } ?>

              </tbody>
              <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
                <th>Artículos</th>
                <th>Talleres</th>
                <th>Regalo</th>
                <th>Compra</th>
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