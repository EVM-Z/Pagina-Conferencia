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
        <h1>Listado de Eventos</h1>
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
            <h3 class="card-title">Maneja los eventos en esta sección</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="registros" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Categoría</th>
                <th>Invitado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

                <?php
                try {
                $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv=invitados.invitado_id ";
                $sql .= " ORDER BY evento_id ";
                $resultado = $conn->query($sql);
                } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                }

                while($eventos = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $eventos['nombre_evento']; ?></td>
                        <td><?php echo $eventos['fecha_evento']; ?></td>
                        <td><?php echo $eventos['hora_evento']; ?></td>
                        <td><?php echo $eventos['cat_evento']; ?></td>
                        <td><?php echo $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']; ?></td>
                        
                        <td>
                        <a href="editar-admin.php?id=<?php echo $eventos['evento_id'] ?>" class="btn bg-gradient-warning btn-sm margin">
                        <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" data-id="<?php echo $eventos['evento_id']; ?>" data-tipo="evento" class="btn bg-gradient-danger btn-sm borrar_registro">
                        <i class="fas fa-trash-alt"></i>
                        </a>
                        </td>
                    </tr>
    
                    <?php } ?>

            </tbody>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Categoría</th>
                <th>Invitado</th>
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