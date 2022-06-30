<?php

include 'php/db.php';
include_once 'php/make_report.php';

if (isset($_POST['kondisi1'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi1']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='1'");
}else if (isset($_POST['kondisi2'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi2']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='2'");
}else if (isset($_POST['kondisi3'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi3']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='3'");
}else if (isset($_POST['kondisi4'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi4']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='4'");
}else if (isset($_POST['kondisi5'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi5']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='5'");
}else if (isset($_POST['kondisi6'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi6']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='6'");
}else if (isset($_POST['kondisi7'])) {
  $kondisi = mysqli_real_escape_string($conn, $_POST['kondisi7']);
  $conn->query("UPDATE `relay` SET `relay`='$kondisi' WHERE `id`='7'");
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

  <title>Monitoring Arus</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <link href="vendor/clockpicker/clockpicker.css" rel="stylesheet">
  <script src="vendor/clockpicker/clockpicker.js"></script>
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'leftside.php'?>
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Kondisi Relay</h1>
            
          </div>

          <!-- Content Row -->

          <!-- Content Row -->

          <!-- Content Row -->
          <div class="row">

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 1</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='1' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi1" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>

          
          
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 2</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='2' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi2" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 3</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='3' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi3" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>

        </div>
        <br>
        <br>
        <div class="row">

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 4</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='4' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi4" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>


          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 5</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='5' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi5" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Lampu 6</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='6' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi6" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>

        </div>

        <br>
        <br>
        <div class="row">

          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Air Conditioner</h5>
                  <form action="" method="post">
                    <?php
                    $statrelay = $conn->query("SELECT * FROM `relay` WHERE `id`='7' LIMIT 1")->fetch_array(MYSQLI_ASSOC);
                    if ($statrelay['relay'] == 'nyala') {
                        echo "Relay : On";
                    } else {
                        echo "Relay : Off";
                    }
                    ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ubah Kondisi</label>
                          <select name="kondisi7" class="form-control" required >
                            <option value="nyala">Aktif</option>
                            <option value="mati">NonAktif</option>
                          </select>
                          <small class="form-control-feedback">Masukkan kondisi baru</small>
                        </div>
                      </div>
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan perubahan</button>
                    </div>
                  </form>           
              </div>
            </div>
          </div>
          </div>

      </div>

     

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  

</body>

</html>
