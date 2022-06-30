<?php
include 'php/db.php';
include_once 'php/make_report.php';

 if (isset($_POST['suhu'])) {
  $tglawal = mysqli_real_escape_string($conn, $_POST['tglawal']);
  $tglakhir = mysqli_real_escape_string($conn, $_POST['tglakhir']);
  $jamawal = mysqli_real_escape_string($conn, $_POST['jamawal']).":00";
  $jamakhir = mysqli_real_escape_string($conn, $_POST['jamakhir']).":00";

  $arus_data = $conn->query("SELECT * FROM `data` WHERE `tipe`='suhu' AND `waktu` BETWEEN '$tglawal $jamawal' AND '$tglakhir $jamakhir'")->fetch_all(MYSQLI_ASSOC);

  $pdf = new ReportDevice();
  $pdf->SetFont('Times','B',17);
  $pdf->AddPage();
  $pdf->BuatHeader("Laporan Suhu (C)", "");
  $pdf->InfoDevice($tglawal, $tglakhir, $jamawal, $jamakhir);
  $pdf->Tabel("Suhu",$arus_data); $pdf->Ln();
  $pdf->Output('D', 'Laporan Suhu.pdf', true);
}else if (isset($_POST['kelembaban'])) {
  $tglawal = mysqli_real_escape_string($conn, $_POST['tglawal']);
  $tglakhir = mysqli_real_escape_string($conn, $_POST['tglakhir']);
  $jamawal = mysqli_real_escape_string($conn, $_POST['jamawal']).":00";
  $jamakhir = mysqli_real_escape_string($conn, $_POST['jamakhir']).":00";

  $arus_data = $conn->query("SELECT * FROM `data` WHERE `tipe`='kelembaban' AND `waktu` BETWEEN '$tglawal $jamawal' AND '$tglakhir $jamakhir'")->fetch_all(MYSQLI_ASSOC);

  $pdf = new ReportDevice();
  $pdf->SetFont('Times','B',17);
  $pdf->AddPage();
  $pdf->BuatHeader("Laporan Kelembaban (C)", "");
  $pdf->InfoDevice($tglawal, $tglakhir, $jamawal, $jamakhir);
  $pdf->Tabel("Suhu",$arus_data); $pdf->Ln();
  $pdf->Output('D', 'Laporan kelembaban.pdf', true);
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

  <title>Monitoring Kondisi Cuaca</title>

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
            <h1 class="h3 mb-0 text-gray-800">Buat Laporan</h1>
            
          </div>


            <!-- Card ke dua -->
            <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Suhu</h6>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Awal</label>
                                <input type="date" name="tglawal" class="form-control" onchange="if($(this).val()!='') {$('[name=tglakhir]').removeAttr('disabled');$('[name=tglakhir]').val('');}" required>
                                <small class="form-control-feedback"> Pilih tanggal mulai pencatatan</small> 
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" class="form-control" onchange="if ($(this).val()<$('[name=tglawal]').val()) {alert('Pilih tanggal akhir dengan benar');$(this).val('');}" required disabled>
                                <small class="form-control-feedback"> Pilih tanggal akhir pencatatan</small> 
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jam Awal</label>
                                <div class="input-group clockpicker">
                                    <input type="text" name="jamawal" class="form-control" value="00:00">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <small class="form-control-feedback"> Pilih jam awal pencatatan</small>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jam Akhir</label>
                                <div class="input-group clockpicker">
                                    <input type="text" name="jamakhir" class="form-control" value="23:59">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <small class="form-control-feedback"> Pilih jam akhir pencatatan</small>
                                
                            </div>
                        </div>

                        <script type="text/javascript">
                            $('.clockpicker').clockpicker({
                                donetext: 'Done',
                            });
                        </script>
                        <!--/span-->
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <input type="hidden" name="suhu" value="1">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-download"></i> Unduh Laporan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end card dua -->

         <!-- </div>-->

          <!-- COBA --------------------->


          <!-- Content Row -->
          <!-- <div class="row">-->

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Kelembaban</h6>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Awal</label>
                                <input type="date" name="tglawal" class="form-control" onchange="if($(this).val()!='') {$('[name=tglakhir]').removeAttr('disabled');$('[name=tglakhir]').val('');}" required>
                                <small class="form-control-feedback"> Pilih tanggal mulai pencatatan</small> 
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" class="form-control" onchange="if ($(this).val()<$('[name=tglawal]').val()) {alert('Pilih tanggal akhir dengan benar');$(this).val('');}" required disabled>
                                <small class="form-control-feedback"> Pilih tanggal akhir pencatatan</small> 
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jam Awal</label>
                                <div class="input-group clockpicker">
                                    <input type="text" name="jamawal" class="form-control" value="00:00">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <small class="form-control-feedback"> Pilih jam awal pencatatan</small>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Jam Akhir</label>
                                <div class="input-group clockpicker">
                                    <input type="text" name="jamakhir" class="form-control" value="23:59">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <small class="form-control-feedback"> Pilih jam akhir pencatatan</small>
                                
                            </div>
                        </div>

                        <script type="text/javascript">
                            $('.clockpicker').clockpicker({
                                donetext: 'Done',
                            });
                        </script>
                        <!--/span-->
                    </div>

                  <!--/row-->
                    <div class="form-actions">
                        <input type="hidden" name="kelembaban" value="1">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-download"></i> Unduh Laporan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- end card dua -->

          </div>

        </div>
        <!-- /.container-fluid -->
    

      </div>


      <!--=========================-->
      
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
