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
                            <h1>Dashboard</h1>
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

            <div class="row">
                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(ID_registrado) AS registros FROM registrados ";
                        $resultado = $conn->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>

                    <!-- small card -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>
                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(ID_registrado) AS registros FROM registrados WHERE pagado = 1 ";
                        $resultado = $conn->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>

                    <!-- small card -->
                    <div class="small-box bg-olive">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>
                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(ID_registrado) AS registros FROM registrados WHERE pagado = 0 ";
                        $resultado = $conn->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small card -->
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>
                        <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1 ";
                        $resultado = $conn->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small card -->
                    <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>$<?php echo (float) $registrados['ganancias']; ?></h3>
                        <p>Ganancias Totales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->


            </div>
                

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


<?php
include 'templates/footer.php';
?>