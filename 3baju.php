<?php
include "conn.php";

// Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $ukuran = $_POST['ukuran'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO baju (nama, ukuran, stok, harga) VALUES ('$nama', '$ukuran', '$stok', '$harga')";
    $result = mysqli_query($conn, $query);
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id_baju'];
    $nama = $_POST['nama'];
    $ukuran = $_POST['ukuran'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $query = "UPDATE baju SET nama='$nama', ukuran='$ukuran', stok='$stok', harga='$harga' WHERE id_baju='$id'";
    $result = mysqli_query($conn, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM baju WHERE id_baju='$id'";
    mysqli_query($conn, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Ambil data untuk diedit
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM baju WHERE id_baju='$id'");
    $editData = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cards</title>

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
                <a class="nav-link" href="2user.php">
                <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="3baju.php">
                    <i class="fas fa-tshirt"></i>
                    <span>Baju</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="3celana.php">
                <i class="fas fa-box"></i>

                <span>Celana</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="3sepatu.php">
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
        <!-- End of Sidebar -->

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
                                                        <div class="row">

                                        <!-- Earnings (Monthly) Card Example -->
                                        <!-- Total Stok Baju -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-success shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                Total Stok Baju</div>
                                                            <?php
                                                            $query = "SELECT SUM(stok) AS total_stok_baju FROM baju";
                                                            $result = mysqli_query($conn, $query);
                                                            $data = mysqli_fetch_assoc($result);
                                                            ?>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                <?= $data['total_stok_baju']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-tshirt fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Total Pendapatan Baju -->
                                        <?php
// Query untuk menghitung total pendapatan dari pembelian baju
$query = "SELECT SUM(total_harga) AS total_harga_baju FROM pembelian_baju";
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
                        Rp <?= number_format($data['total_harga_baju'] ?? 0, 0, ',', '.'); ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>




                                        </div>







<!-- Tambahkan ini di dalam <head> HTML kamu -->

<!-- Form Tambah / Edit Aksesoris -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <?= isset($editData) ? 'Edit Pembelian Baju' : 'Tambah Pembelian Baju' ?>
    </div>
    <div class="card-body">
        <form method="post">
            <input type="hidden" name="id_pembelian" value="<?= $editData['id_pembelian'] ?? '' ?>">

            <div class="mb-3">
                <label for="id_baju" class="form-label">Pilih Baju</label>
                <select class="form-select" id="id_baju" name="id_baju" required onchange="setHarga()">
                    <option value="">-- Pilih Baju --</option>
                    <?php
                    // Query untuk mengambil data baju yang tersedia
                    $queryBaju = mysqli_query($conn, "SELECT * FROM baju WHERE stok > 0");
                    $dataBaju = [];
                    while ($baju = mysqli_fetch_assoc($queryBaju)) {
                        $selected = (isset($editData) && $editData['id_baju'] == $baju['id_baju']) ? 'selected' : '';
                        $dataBaju[$baju['id_baju']] = $baju['harga'];
                        echo "<option value=\"{$baju['id_baju']}\" $selected>{$baju['nama']} (Ukuran: {$baju['ukuran']}, Stok: {$baju['stok']})</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Beli</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" required min="1" oninput="hitungTotal()">
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total Harga (Rp)</label>
                <input type="number" class="form-control" id="total" name="total" placeholder="Total harga" readonly>
            </div>

            <button type="submit" name="<?= isset($editData) ? 'update' : 'beli' ?>" class="btn btn-<?= isset($editData) ? 'warning' : 'success' ?>">
                <?= isset($editData) ? 'Update Pembelian' : 'Beli Sekarang' ?>
            </button>
        </form>

        <?php
        // Proses pembelian baju
        if (isset($_POST['beli'])) {
            $id_baju = $_POST['id_baju'];
            $jumlah = $_POST['jumlah'];

            // Cek stok baju
            $cekBaju = mysqli_query($conn, "SELECT * FROM baju WHERE id_baju = '$id_baju'");
            $dataBaju = mysqli_fetch_assoc($cekBaju);

            if ($dataBaju && $dataBaju['stok'] >= $jumlah) {
                // Update stok baju
                $sisa_stok = $dataBaju['stok'] - $jumlah;
                mysqli_query($conn, "UPDATE baju SET stok = '$sisa_stok' WHERE id_baju = '$id_baju'");

                // Hitung total harga
                $total_harga = $dataBaju['harga'] * $jumlah;

                // Simpan data pembelian
                $queryPembelian = "INSERT INTO pembelian_baju (id_baju, jumlah, total_harga) VALUES ('$id_baju', '$jumlah', '$total_harga')";
                mysqli_query($conn, $queryPembelian);

                echo "<div class='alert alert-success mt-3'>Pembelian berhasil! Sisa stok: $sisa_stok</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Stok tidak cukup!</div>";
            }
        }
        ?>
    </div>
</div>

<script>
// Data harga baju
var hargaBaju = <?= json_encode($dataBaju); ?>;

function setHarga() {
    hitungTotal(); // Saat pilih baju, hitung ulang total
}

function hitungTotal() {
    var idBaju = document.getElementById('id_baju').value;
    var jumlah = document.getElementById('jumlah').value;
    var harga = hargaBaju[idBaju] ?? 0;
    var total = harga * jumlah;
    document.getElementById('total').value = total;
}
</script>


    


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>