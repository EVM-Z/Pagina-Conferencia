<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if ($cerrar_sesion) {
    // Cerramos sesion
    session_destroy();
}

include 'funciones/funciones.php';
include 'templates/header.php';
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../../index.php"><b>GDL</b>WebCamp</a>
            <h6>admin - admin</h6>
        </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesión</p>

        <form name="login-admin-form" id="login-admin" method="POST" action="modelo-login.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
                <input type="hidden" name="login-admin" value="1">
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
</body>

<?php
include 'templates/footer.php';
?>