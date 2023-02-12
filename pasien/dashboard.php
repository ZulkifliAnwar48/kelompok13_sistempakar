<?php  
session_start();
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PENYAKIT IKAN LELE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="images/logo3.jpg" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?module=home" class="nav-link">Home</a>
      </li>
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?module=home" class="brand-link">
      <center><img src="images/logo3.jpg" alt="AdminLTE Logo" width="70px"><br>
      <small>PASIEN</small>
      </center>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/users.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?module=edit_user&id=" class="d-block"><?php echo $_SESSION["nama"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?module=penyakit" class="nav-link">
              <i class="fas fa-atom"></i>
              <p>Penyakit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=petani" class="nav-link">
              <i class="fas fa-bug"></i>
              <p>Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=konsultasi" class="nav-link">
              <i class="fab fa-adversal"></i>
              <p>Konsultasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=hasil" class="nav-link">
              <i class="fas fa-balance-scale"></i>
              <p>Hasil Konsultasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-archway"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <?php  
        $module=$_GET["module"];
        
            switch ($module) {
              default:
                # code...
                ?>
                <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->


                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <?php    
                              $penyakit=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penyakit"));
                            ?>
                            <h3><?php   echo $penyakit ?></h3>

                            <p>Data Penyakit Ikan Lele</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="?module=penyakit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <?php    
                              $konsultasi=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM konsultasi WHERE kode_pasien='$_SESSION[kode_pasien]'"));
                            ?>
                            <h3><?php   echo $konsultasi ?></h3>

                            <p>History Konsultasi</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="?module=hasil" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div> 
                    <!-- /.row -->
                    <!-- TABLE: LATEST ORDERS -->
                          <div class="card">
                            <div class="card-header border-transparent">
                              <h3 class="card-title">Hasil Konsultasi Terbaru</h3>

                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table m-0">
                                  <thead>
                                  <tr>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Hasil Konsultasi</th>
                                    <th>Rekomendasi Pengobatan</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php  
                                    $sql=mysqli_query($koneksi, "SELECT * FROM konsultasi, pasien, penyakit WHERE konsultasi.kode_pasien=pasien.kode_pasien AND konsultasi.hasil=penyakit.kode_penyakit AND pasien.kode_pasien='$_SESSION[kode_pasien]' ORDER BY konsultasi.kode_konsultasi DESC LIMIT 5 ");
                                    $no = 1;
                                    while($row = mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                          <td><?php echo $row["nama"] ?></td>
                                          <td><?php echo $row["tanggal"] ?></td>
                                          <td><?php echo $row["keterangan"] ?></td>
                                          <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $row["pengobatan"] ?></div>
                                          </td>
                                        </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-footer -->
                          </div>
                          <!-- /.card -->
                        </div>
                        <!-- /.col -->
                <?php 
                break;
                
                case "penyakit" :
                        include "modul/penyakit/penyakit.php";
                break;
                case "input_penyakit" :
                        include "modul/penyakit/input.php";
                break;
                case "edit_penyakit" :
                        include "modul/penyakit/edit.php";
                break;
                case "gejala" :
                        include "modul/gejala/gejala.php";
                break;
                case "input_gejala" :
                        include "modul/gejala/input.php";
                break;
                case "edit_gejala" :
                        include "modul/gejala/edit.php";
                break;
                case "pakar" :
                        include "modul/pakar/pakar.php";
                break;
                case "input_pakar" :
                        include "modul/pakar/input.php";
                break;
                case "edit_pakar" :
                        include "modul/pakar/edit.php";
                break;
                case "pasien" :
                        include "modul/pasien/pasien.php";
                break;
                case "input_pasien" :
                        include "modul/pasien/input.php";
                break;
                case "edit_pasien" :
                        include "modul/pasien/edit.php";
                break;
                case "rule_base" :
                        include "modul/rule_base/rule_base.php";
                break;
                case "konsultasi" :
                        include "modul/konsultasi/input.php";
                break;
                 case "hasil" :
                        include "modul/konsultasi/konsultasi.php";
                break;
            }
        ?>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- isi utama disini -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 1000);
</script>

</body>
</html>
