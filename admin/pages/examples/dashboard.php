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
                <div class="col-md-12">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Line Chart</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

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

            <h2 class="page-header">Regalos</h2>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE regalo = 1 AND pagado = 1 ";
                        $resultado = $conn->query($sql);
                        $regalo = $resultado->fetch_assoc();
                    ?>
                    <!-- small card -->
                    <div class="small-box bg-pink">
                    <div class="inner">
                        <h3><?php echo (float) $regalo['pulseras']; ?></h3>
                        <p>Pulseras</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE regalo = 2 AND pagado = 1 ";
                        $resultado = $conn->query($sql);
                        $regalo = $resultado->fetch_assoc();
                    ?>
                    <!-- small card -->
                    <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo (float) $regalo['etiquetas']; ?></h3>
                        <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <?php
                        $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE regalo = 3 AND pagado = 1 ";
                        $resultado = $conn->query($sql);
                        $regalo = $resultado->fetch_assoc();
                    ?>
                    <!-- small card -->
                    <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo (float) $regalo['plumas']; ?></h3>
                        <p>Plumas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pencil-alt"></i>
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