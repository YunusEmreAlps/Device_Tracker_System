<?php echo !defined("adminmanagehomepage") ? die(header("Location: ../error403.php")) : null;?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:index.php');
  exit();
}
?>
<!DOCTYPE html>

<!-- Turkish -->
<html lang="tr">
  <head>
    <!-- Metadata is data (information) about data. -->
    <!-- Metadata is used by browsers (how to display content or reload page), search engines (keywords), and other web services. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- It is shown in the browser's title bar or in the page's tab. -->
    <title>UZMAN GSM - İçerik Yönetim Paneli</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="managelogin.php?login_ok=TRUE">
          <div class="sidebar-brand-icon">
          <i class="fa fa-power-off" aria-hidden="true"></i>
          </div>
          <div class="sidebar-brand-text mx-3">UZMAN GSM</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Arayüz
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="managelogin.php?login_ok=TRUE">
            <i class="fas fa-fw fa-cog"></i>
            <span>Ürünler</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="adminlogin.php?login_ok=TRUE">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Arızalar</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Eklenti
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sayfalar</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Pages</h6>
              <a class="collapse-item" href="../admin/index.php">Admin Panel</a>
              <a class="collapse-item" href="../index.php">Ana Sayfa (Türkçe)</a>
              <a class="collapse-item" href="../indexen.php">Ana Sayfa (English)</a>
              <a class="collapse-item" href="../php/login.php">Cihaz Takip Sistemi</a>
            </div>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

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

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Uzman GSM</span>
                  <img class="img-profile rounded-circle" src="../img/admin-settings-male.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Çıkış
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Ürünler</h1>
            
              <a type="button" onclick="addnewproduct()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-user-plus fa-sm text-white-50"></i> 
                <span class="text-white">Ürün Ekle</span>
              </a>
            </div>

            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bilgisayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php 
                            $pquery = $conn->query('SELECT * FROM product WHERE product_category = "Bilgisayar" ', PDO::FETCH_ASSOC); 
                            echo $pquery->rowCount();
                          ?>  
                        </div>
                      </div>
                      <div class="col-auto">
                       <i class="fa fa-laptop fa-2x text-gray-300" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tablet</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php 
                            $pquery = $conn->query('SELECT * FROM product WHERE product_category = "Tablet" ', PDO::FETCH_ASSOC); 
                            echo $pquery->rowCount();
                          ?>  
                        </div>
                      </div>
                      <div class="col-auto">
                      <i class="fa fa-tablet fa-2x text-gray-300" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Telefon</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php 
                            $pquery = $conn->query('SELECT * FROM product WHERE product_category = "Telefon" ', PDO::FETCH_ASSOC); 
                            echo $pquery->rowCount();
                          ?>  
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-mobile fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Diğer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $pquery = $conn->query('SELECT * FROM product WHERE product_category != "Bilgisayar" AND product_category != "Tablet" AND product_category != "Telefon" ', PDO::FETCH_ASSOC); 
                            echo $pquery->rowCount();
                          ?>  
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content Row -->            
            <div class="card shadow mb-4">
              <!-- Header -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ürünler</h6>
              </div>
              <!-- Header -->
              <!-- Body -->
              <div class="card-body">

                <!-- Delete Error -->
                <?php 
                  if(isset($_SESSION["deleteproduct_alert_message"])) { ?>
                    <div class="alert alert-<?php echo $_SESSION["deleteproduct_alert_message"]["type"]?> mt-4">
                      <?php echo $_SESSION["deleteproduct_alert_message"]["message"] ?>
                    </div>
                    <?php unset($_SESSION["deleteproduct_alert_message"]); ?>
                <?php } ?>
                <!-- Delete Error -->

                <div class="table-responsive">
                  <table class="table table-bordered text-center display" id="example" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Ürün Numarası</th>
                        <th>Ürün Adı</th>
                        <th>Ürün Kategori</th>
                        <th>Ürün Resmi</th>
                        <th>Ürün Bilgi</th>
                        <th>Ürün Fiyat</th>
                        <th>Güncelle</th>
                        <th>Sil</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Ürün Numarası</th>
                        <th>Ürün Adı</th>
                        <th>Ürün Kategori</th>
                        <th>Ürün Resmi</th>
                        <th>Ürün Bilgi</th>
                        <th>Ürün Fiyat</th>
                        <th>Güncelle</th>
                        <th>Sil</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $pquery = $conn->query("SELECT * FROM product", PDO::FETCH_ASSOC);
                        if ( $pquery->rowCount() ){
                        foreach($pquery as $prow) { 
                             
                      ?>  
                      
                        <tr>
                          <td><?php echo $prow["product_id"]?></td>
                          <td><?php echo $prow["product_name"]?></td>
                          <td><?php echo $prow["product_category"]?></td>
                          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $prow['product_image'] ).'" width="100" height="100"/>'; ?></td>
                          <td><?php echo $prow["product_information"]?></td>
                          <td><?php echo $prow["product_price"]?> TL</td>
                          <td>
                            <a class="btn btn-primary btn-circle" type="button" onclick="updateproduct('<?php echo $prow['product_id']; ?>')">
                              <i class="fas fa-user-edit text-white"></i>
                              <!-- <i class="fas fa-user-edit text-primary"></i><span class="btn-link text-dark font-weight-bold"> Güncelle</span>-->
                            </a>
                          </td>
                          <td>
                            <a class="btn btn-danger btn-circle" type="button" onclick="deleteproduct('<?php echo $prow['product_id']; ?>')">
                              <i class="fas fa-trash text-white"></i>
                              <!-- <i class="fa fa-trash text-danger"></i><span class="btn-link text-dark font-weight-bold"> Sil</span> -->
                            </a>
                          </td>
                        </tr>
                        
                      <?php  
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>        
              </div>
              <!-- Body -->

          </div>
          <!-- Row -->                  

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>© 2020 Copyright: UZMAN GSM.</span>
            </div>
          </div>
        </footer>
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
            <h5 class="modal-title" id="exampleModalLabel">Emin Misin ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Eğer oturumu kapatmak istiyorsan "Oturumu Kapat" butonuna tıkla.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
            <a class="btn btn-primary" href="../index.php">Oturumu Kapat</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
           
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/datatables-demo.js"></script>
    <script lang="javascript">
      function addnewproduct(){ // Accident id, User id
        if(confirm("Ürün eklemek istediğinize emin misiniz ?")){
          window.location.href='addproduct.php?productadd=TRUE';
          return true;
        }   
      }
      function deleteproduct(product_id){ // Accident id, User id
        if(confirm("Ürünü silmek istediğinize emin misiniz ?")){
          window.location.href='deleteproduct.php?product_id='+product_id+'&productdelete=TRUE';
          return true;
        }   
      }
      function updateproduct(product_id){ // 
        if(confirm("Ürün kaydını güncellemek istediğinize emin misiniz ?")){
          window.location.href='updateproduct.php?product_id='+product_id+'&productupdate=TRUE';
          return true;
        }   
      }
    </script>                      
  </body>
</html>



