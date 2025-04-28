<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['level'] != 'admin') {
    header('Location: dashboard_user.php');
    exit();
}

?>


<?php
include "conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">Fasion</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="2baju.php">
                    <i class="fas fa-tshirt"></i>
                    <span>Baju</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="2celana.php">
                <i class="fas fa-box"></i>

                <span>Celana</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="2sepatu.php">
                    <i class="fas fa-shoe-prints"></i>
                    <span>Sepatu</span>
                </a>
            </li>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $query = "SELECT SUM(harga) AS total_harga_baju FROM baju";
                        $result = mysqli_query($conn, $query);
                        $data = mysqli_fetch_assoc($result);
                                        ?>
                          <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                     <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Pendapatan Baju</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        Rp <?= number_format($data['total_harga_baju'], 0, ',', '.'); ?>
                                                     </div>
                                            </div>
                                                 <div class="col-auto">
                                                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                                 </div>
                                         </div> 
                                     </div>
                                 </div>
                          </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <?php
                            // Query untuk menghitung total pendapatan dari celana
                            $query = "SELECT SUM(harga_celana) AS total_harga_celana FROM celana";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            ?>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Pendapatan Celana</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp <?= number_format($data['total_harga_celana'], 0, ',', '.'); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <?php
                            $query = "SELECT SUM(harga_sepatu) AS total_harga_sepatu FROM sepatu";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            ?>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Pendapatan Sepatu</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp <?= number_format($data['total_harga_sepatu'], 0, ',', '.'); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <?php
                            // Ambil total dari masing-masing kategori
                            $total_baju = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga) as total FROM baju"))['total'] ?? 0;
                            $total_celana = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga_celana) as total FROM celana"))['total'] ?? 0;
                            $total_sepatu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga_sepatu) as total FROM sepatu"))['total'] ?? 0;

                            // Hitung total keseluruhan
                            $total_pendapatan = $total_baju + $total_celana + $total_sepatu;
                            ?>

                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Pendapatan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>



                    <?php
                    include "conn.php";

                    // Ambil total masing-masing kategori
                    $baju = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga) as total FROM baju"))['total'] ?? 0;
                    $celana = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga_celana) as total FROM celana"))['total'] ?? 0;
                    $sepatu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(harga_sepatu) as total FROM sepatu"))['total'] ?? 0;

                    // Total semua pendapatan
                    $total = $baju + $celana + $sepatu;

                    // Fungsi hitung persen
                    function persen($kategori, $total) {
                        return $total > 0 ? round(($kategori / $total) * 100) : 0;
                    }
                    ?>

                    <!-- Progress bar kategori penghasilan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Persentase Pendapatan per Kategori</h6>
                        </div>
                        <div class="card-body">
                            <!-- Baju -->
                            <h4 class="small font-weight-bold">Baju <span class="float-right"><?= persen($baju, $total); ?>%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" style="width: <?= persen($baju, $total); ?>%"></div>
                            </div>

                            <!-- Celana -->
                            <h4 class="small font-weight-bold">Celana <span class="float-right"><?= persen($celana, $total); ?>%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" style="width: <?= persen($celana, $total); ?>%"></div>
                            </div>

                            <!-- Sepatu -->
                            <h4 class="small font-weight-bold">Sepatu <span class="float-right"><?= persen($sepatu, $total); ?>%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" style="width: <?= persen($sepatu, $total); ?>%"></div>
                            </div>

                        
                           
                    </div>






                </div>

                </div>

            </div>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>




</body>

</html>