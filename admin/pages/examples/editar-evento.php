<?php

// Si no es un id valido en la URL, muestra un error
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)):
    die("Error");
else:

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
                    <h1>Editar Evento</h1>
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
                <h3 class="card-title">Editar Evento</h3>
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

                    <?php
                        $sql = "SELECT * FROM eventos WHERE evento_id = $id ";
                        $resultado = $conn->query($sql);
                        $evento = $resultado->fetch_assoc();
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="usuario" class="col-sm-2 col-form-label">Titulo Evento</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo Evento" value="<?php echo $evento['nombre_evento']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Categoría</label>
                            <div class="col-sm-10">
                            <select name="categoria_evento" id="" class="form-control seleccionar">
                            <option value="0">- Seleccione -</option>
                                <?php
                                    try {
                                        $categoria_actual = $evento['id_cat_evento'];
                                        $sql = "SELECT * FROM categoria_evento ";
                                        $resultado = $conn->query($sql);
                                        while ($cat_evento = $resultado->fetch_assoc()) { 
                                            if ($cat_evento['id_categoria'] == $categoria_actual){ ?>
                                                <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                                                    <?php echo $cat_evento['cat_evento']; ?>
                                                </option>
                                            <?php } else{ ?>
                                                <option value="<?php echo $cat_evento['id_categoria']; ?>" >
                                                <?php echo $cat_evento['cat_evento']; ?>
                                                </option>
                                            <?php }
                                        }
                                        
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
                        <?php
                            // Cambiamos el formato de la fecha
                            $fecha = $evento['fecha_evento'];
                            $fecha_formato = date('m/d/Y', strtotime($fecha));
                        ?>
                            <div class="input-group date" id="fecha" data-target-input="nearest">
                                <input type="text" name="fecha_evento" id="fecha" class="form-control datetimepicker-input" data-target="#fecha" value="<?php echo $fecha_formato; ?>"/>
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
                            <?php
                                // Cambiamos el formato de la hora
                                $hora = $evento['hora_evento'];
                                $hora_formato = date('h:i a', strtotime($hora));
                            ?>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker" value="<?php echo $hora_formato; ?>"/>
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
                                        $invitado_actual = $evento['id_inv'];
                                        $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                                        $resultado = $conn->query($sql);
                                        while ($invitados = $resultado->fetch_assoc()) {
                                            if ($invitados['invitado_id'] == $invitado_actual) { ?>
                                                <option value="<?php echo $invitados['invitado_id']; ?>" selected>
                                                    <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                                </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $invitados['invitado_id']; ?>">
                                                    <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                                </option>
                                        <?php } //Fin del if
                                        } //Fin del while
                                        
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

endif;
?>