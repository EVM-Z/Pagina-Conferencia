<?php
// Antes que nada, verificamos la sesion
include 'funciones/sesiones.php';
include 'funciones/funciones.php';

// Toma el id del usuario
$id = $_GET['id'];
// Validamos que el id sea un entero
if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error.");
}

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
                    <h1>Editar Categoría de Eventos</h1>
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
                <h3 class="card-title">Editar Categoría de Eventos</h3>
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
                        $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                        $resultado = $conn->query($sql);
                        $categoria = $resultado->fetch_assoc();

                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-categoria.php">
                        <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?php echo $categoria['cat_evento']; ?>" placeholder="Categoría">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Icono:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-address-book"></i>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" id="icono" name="icono" class="form-control pull-right" value="<?php echo $categoria['icono']; ?>" placeholder="fa-icon">
                            </div>
                        </div>
                        
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-info" id="crear_registro">Editar</button>
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