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
                    <h1>Crear Invitado</h1>
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
                <h3 class="card-title">Crear Invitado</h3>
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
                    <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-invitado.php">
                        <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="nombre_invitado" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_invitado" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_invitado" class="col-sm-2 col-form-label">Biografía</label>
                            <div class="col-sm-10">
                            <textarea  class="form-control" name="biografia_invitado" id="biografia_invitado" cols="" rows="8" placeholder="Biografía"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen_invitado">Imagen</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                                <label class="custom-file-label" for="imagen_invitado">Elije una imagen</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Subir</span>
                            </div>
                            </div>
                        </div>

                        
                        
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-info" id="crear_registro">Añadir</button>
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