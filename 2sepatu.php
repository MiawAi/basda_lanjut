<?php
include "conn.php";

// Tambah data Sepatu
if (isset($_POST['tambah_sepatu'])) {
    $nama_sepatu = $_POST['nama_sepatu'];
    $ukuran_sepatu = $_POST['ukuran_sepatu'];
    $stok_sepatu = $_POST['stok_sepatu'];
    $harga_sepatu = $_POST['harga_sepatu'];

    // Query INSERT dengan variabel yang benar
    $query = "INSERT INTO sepatu (nama_sepatu, ukuran_sepatu, stok_sepatu, harga_sepatu) VALUES ('$nama_sepatu', '$ukuran_sepatu', '$stok_sepatu', '$harga_sepatu')";
    $result = mysqli_query($conn, $query);
}

// Update data Sepatu
if (isset($_POST['update_sepatu'])) {
    $id = $_POST['id_sepatu'];
    $nama_sepatu = $_POST['nama_sepatu'];
    $ukuran_sepatu = $_POST['ukuran_sepatu'];
    $stok_sepatu = $_POST['stok_sepatu'];
    $harga_sepatu = $_POST['harga_sepatu'];

    $query = "UPDATE sepatu SET nama_sepatu='$nama_sepatu', ukuran_sepatu='$ukuran_sepatu', stok_sepatu='$stok_sepatu', harga_sepatu='$harga_sepatu' WHERE id_sepatu='$id'";
    $result = mysqli_query($conn, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Delete data Sepatu
if (isset($_GET['delete_sepatu'])) {
    $id = $_GET['delete_sepatu'];
    $query = "DELETE FROM sepatu WHERE id_sepatu='$id'";
    mysqli_query($conn, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Ambil data untuk diedit
$editDataSepatu = null;
if (isset($_GET['edit_sepatu'])) {
    $id = $_GET['edit_sepatu'];
    $result = mysqli_query($conn, "SELECT * FROM sepatu WHERE id_sepatu='$id'");
    $editDataSepatu = mysqli_fetch_assoc($result);
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





                    <!-- Topbar Search -->
                    <!-- Filter berdasarkan ukuran sepatu -->
                    <form method="GET" class="d-flex flex-wrap align-items-end gap-2 mb-4">
                        <div>
                        
                            <select name="ukuran_filter" id="ukuran_filter" class="form-control shadow-sm">
                                <option value="">Semua Ukuran</option>
                                <option value="S" <?= isset($_GET['ukuran_filter']) && $_GET['ukuran_filter'] == 'S' ? 'selected' : '' ?>>S</option>
                                <option value="M" <?= isset($_GET['ukuran_filter']) && $_GET['ukuran_filter'] == 'M' ? 'selected' : '' ?>>M</option>
                                <option value="L" <?= isset($_GET['ukuran_filter']) && $_GET['ukuran_filter'] == 'L' ? 'selected' : '' ?>>L</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-filter me-1"></i> Filter
                            </button>
                        </div>
                    </form>


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

                     <!-- Begin Page Content -->
                      <div class="row">

                            <!-- Total Stok Sepatu -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Stok Sepatu</div>
                                                <?php
                                                $query = "SELECT SUM(stok_sepatu) AS total_stok_sepatu FROM sepatu";
                                                $result = mysqli_query($conn, $query);
                                                $data = mysqli_fetch_assoc($result);
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $data['total_stok_sepatu']; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shoe-prints fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Pendapatan Sepatu -->
                            <?php
                            // Query untuk menghitung total harga (pendapatan) sepatu
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

                        </div>


                        <!-- Tambahkan ini di dalam <head> HTML kamu -->

                        <!-- Form Tambah / Edit Aksesoris -->
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-primary text-white">
                                <?= isset($editDataSepatu) ? 'Edit Sepatu' : 'Tambah Sepatu' ?>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <input type="hidden" name="id_sepatu" value="<?= $editDataSepatu['id_sepatu'] ?? '' ?>">

                                    <div class="mb-3">
                                        <label for="nama_sepatu" class="form-label">Nama Sepatu</label>
                                        <input type="text" class="form-control" name="nama_sepatu" placeholder="Nama Sepatu" required value="<?= $editDataSepatu['nama_sepatu'] ?? '' ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="ukuran_sepatu" class="form-label">Ukuran</label>
                                        <select class="form-select" name="ukuran_sepatu" required>
                                            <option value="S" <?= (isset($editDataSepatu) && $editDataSepatu['ukuran_sepatu'] == 'S') ? 'selected' : '' ?>>S</option>
                                            <option value="M" <?= (isset($editDataSepatu) && $editDataSepatu['ukuran_sepatu'] == 'M') ? 'selected' : '' ?>>M</option>
                                            <option value="L" <?= (isset($editDataSepatu) && $editDataSepatu['ukuran_sepatu'] == 'L') ? 'selected' : '' ?>>L</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stok_sepatu" class="form-label">Stok</label>
                                        <input type="number" class="form-control" name="stok_sepatu" placeholder="Stok" required value="<?= $editDataSepatu['stok_sepatu'] ?? '' ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga_sepatu" class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="harga_sepatu" placeholder="Harga" required value="<?= $editDataSepatu['harga_sepatu'] ?? '' ?>">
                                    </div>

                                    <button type="submit" name="<?= $editDataSepatu ? 'update_sepatu' : 'tambah_sepatu' ?>" class="btn btn-<?= $editDataSepatu ? 'warning' : 'success' ?>">
                                        <?= $editDataSepatu ? 'Update' : 'Tambah' ?>
                                    </button>
                                </form>
                            </div>
                        </div>



                        <?php
                        // Menentukan kondisi filter berdasarkan ukuran
                        $ukuran_filter = isset($_GET['ukuran_filter']) ? $_GET['ukuran_filter'] : '';

                        // Menyusun query untuk mengambil data sepatu
                        $query = "SELECT * FROM sepatu";

                        // Jika ada filter ukuran, tambahkan kondisi WHERE untuk ukuran
                        if ($ukuran_filter != '') {
                            $query .= " WHERE ukuran_sepatu = '$ukuran_filter'";
                        }

                        $result = mysqli_query($conn, $query);
                        ?>

                        <!-- Tabel Data Sepatu -->
                        <div class="card shadow-sm">
                            <div class="card-header bg-secondary text-white">
                                Daftar Sepatu
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID Sepatu</th>
                                            <th>Nama</th>
                                            <th>Ukuran</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?= $data['id_sepatu'] ?></td>
                                            <td><?= $data['nama_sepatu'] ?></td>
                                            <td><?= $data['ukuran_sepatu'] ?></td>
                                            <td><?= $data['stok_sepatu'] ?></td>
                                            <td><?= $data['harga_sepatu'] ?></td>
                                            <td>
                                                <a href="?edit_sepatu=<?= $data['id_sepatu'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="?delete_sepatu=<?= $data['id_sepatu'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Delete</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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