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
                    <h1>Crear Evento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear Evento</h3>
            </div>
            <div class="card-body">

            <div class="row">
                <div class="col-md-8">

                    <!-- Horizontal Form -->
                    <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Horizontal Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="usuario" class="col-sm-2 col-form-label">Titulo Evento</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo Evento">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Categoría</label>
                            <div class="col-sm-10">
                            <select name="categoria_evento" id="" class="form-control seleccionar">
                            <option value="0">- Seleccione -</option>
                                <?php
                                    try {
                                        $sql = "SELECT * FROM categoria_evento ";
                                        $resultado = $conn->query($sql);
                                        while ($cat_evento = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                            <?php echo $cat_evento['cat_evento']; ?>
                                            </option>
                                        <?php }
                                        
                                    } catch (Exception $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                ?>
                            </select>
                            </div>
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                        <label>Fecha Evento:</label>
                            <div class="input-group date" id="fecha" data-target-input="nearest">
                                <input type="text" name="fecha_evento" id="fecha" class="form-control datetimepicker-input" data-target="#fecha" placeholder="dd/mm/aa"/>
                                <div class="input-group-append" data-target="#fecha" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->


                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Hora</label>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker"/>
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Invitado o Ponente</label>
                            <div class="col-sm-10">
                            <select name="invitado" id="" class="form-control seleccionar">
                            <option value="0">- Seleccione -</option>
                                <?php
                                    try {
                                        $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                                        $resultado = $conn->query($sql);
                                        while ($invitados = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $invitados['invitado_id']; ?>">
                                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                            </option>
                                        <?php }
                                        
                                    } catch (Exception $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                ?>
                            </select>
                            </div>
                        </div>
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-info" >Añadir</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'templates/footer.php';
?>