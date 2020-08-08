<?php echo !defined("adminhomepage") ? die(header("Location: ../error403.php")) : null;?>
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
    <link href="../css/user.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>
  <body id="page-top">
    <div id="loader" class="loadcenter"></div> 
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="managelogin.php?login_ok=TRUE">
          <div class="sidebar-brand-icon">
            <i class="fa fa-power-off" aria-hidden="true"></i>
          </div>
          <div class="sidebar-brand-text mx-3" style="font-weight:500;">UZMAN GSM</div>
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
              <h1 class="h3 mb-0 text-gray-800">Arızalar</h1>
            
              <a type="button" onclick="addnewuser()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-user-plus fa-sm text-white-50"></i> 
                <span class="text-white">Arıza Ekle</span>
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
                            $pquery = $conn->query('SELECT * FROM device dev INNER JOIN accident acc ON dev.device_id = acc.accdevice_id WHERE dev.device_type = "Bilgisayar";', PDO::FETCH_ASSOC);  
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
                            $pquery = $conn->query('SELECT * FROM device dev INNER JOIN accident acc ON dev.device_id = acc.accdevice_id WHERE dev.device_type="Tablet";', PDO::FETCH_ASSOC); 
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
                            $pquery = $conn->query('SELECT * FROM device dev INNER JOIN accident acc ON dev.device_id = acc.accdevice_id WHERE dev.device_type="Telefon"', PDO::FETCH_ASSOC); 
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
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Hata Mesajları</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <!-- Mail Error --> 
                          <?php
                            if(isset($_SESSION["mail_alert_message"])){ ?>
                              <div class="alert alert-<?php echo $_SESSION["mail_alert_message"]["type"]?>">
                                <?php echo $_SESSION["mail_alert_message"]["message"] ?>
                              </div>
                              <?php unset($_SESSION["mail_alert_message"]); ?>  
                          <?php }?>
                          <!-- Mail Error -->       
                          <!-- Delete Error -->
                          <?php 
                            if(isset($_SESSION["deleteuser_alert_message"])) { ?>
                              <div class="alert alert-<?php echo $_SESSION["deleteuser_alert_message"]["type"]?> mt-4">
                                <?php echo $_SESSION["deleteuser_alert_message"]["message"] ?>
                              </div>
                              <?php unset($_SESSION["deleteuser_alert_message"]); ?>
                          <?php } ?>
                          <!-- Delete Error -->
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-exclamation-circle fa-2x text-gray-300"></i>
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
                <h6 class="m-0 font-weight-bold text-primary">Arızalar</h6>
              </div>
              <!-- Header -->
              <!-- Body -->
              <div class="card-body">
                      
                <!-- List -->
                <ul type="none" style="list-style-type: none; margin: 0; padding: 0;">

                  <?php 
                  $query = $conn->query("SELECT * FROM accident", PDO::FETCH_ASSOC); 
                  $access_number = 0;
                  if ( $query->rowCount() ){
                    foreach($query as $row) {
                  ?>
                    <!-- Data -->
                    <li>
                      
                      <!-- Accordion Module -->
                      <div id="accordionModule">
                      
                        
                        <div class="accordion" id="accordionBox">
                        
                          <div class="card">
                            <div class="card-header hplus" id="headingOne">
                              <h2 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo  $access_number; ?>" aria-expanded="false">
                                  
                                  <!-- Row -->
                                  <div class="row">
                                    <!-- User -->
                                    <div class="col-md-3 col-sm-12 text-center">
                                      <span>
                                      <?php 
                                          $usrquery = $conn->query("SELECT * FROM userss WHERE user_id = '{$row['accuser_id']}'", PDO::FETCH_ASSOC);
                                          if ( $usrquery->rowCount() ){
                                            foreach($usrquery as $urow) {
                                              echo "".$urow["user_name"]." ".$urow["user_surname"]." (".$urow["user_id"].")";
                                            }
                                          }
                                        ?>                            
                                      </span>
                                    </div>
                                    <!-- User -->
                                    <!-- Device -->
                                    <div class="col-md-3 col-sm-12 text-center">
                                      <span>
                                        <?php 
                                          $devquery = $conn->query("SELECT * FROM device WHERE device_id = '{$row['accdevice_id']}'", PDO::FETCH_ASSOC);
                                          if ( $devquery->rowCount() ){
                                            foreach($devquery as $drow) {
                                              echo $drow["device_brand"];
                                            }
                                          }
                                        ?>
                                      </span>
                                    </div>
                                    <!-- Device -->
                                    <!-- Register Date -->
                                    <div class="col-md-3 col-sm-12 text-center">
                                      <span>
                                        <?php 
                                          $newDate = date("H:i:s d-m-Y", strtotime($row["register_date"]));
                                          echo $newDate;
                                        ?> <!-- echo $row["register_date"]; -->
                                      </span>
                                    </div>
                                    <!-- Register Date -->       
                                    <!-- Process -->
                                    <div class="col-md-3 col-sm-12 text-center">
                                      <span>
                                        <?php 
                                          // Process status
                                        
                                          if($row["accident_status"] == "İşlem Tamamlanmıştır"){
                                            echo " <span style='color:#1ECD97;'>".$row["accident_status"]." <i class='fa'>&#xf00c</i> </span>" ;
                                          } 
                                          else if($row["accident_status"] == "Tamir Sürecinde"){
                                            echo " <span class='text-info'>".$row["accident_status"]." <div class='float-right loader'></div> </span>" ;
                                          }
                                          else { 
                                            echo " <span class='text-danger'>".$row["accident_status"]." <i class='fa'>&#xf00d</i></span>" ;
                                          }
                                        ?>
                                      </span>  
                                    </div>
                                    <!-- Process -->
                                  </div>
                                  <!-- Row -->

                                </button>
                              </h2>
                            </div>
                            <div id="collapse<?php echo  $access_number;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionBox" style="">
                              <!-- Card body --> 
                              <div class="card-body">
                                          
                                <div class="text-right"><?php  echo "<strong>Arıza Numarası : </strong>".$row["accident_id"].""; ?></div>
                                <!-- User -->
                                <div class="card-header"> 
                                  <h5 class="text-center">Kullanıcı</h5>
                                </div> 
                                <div class="card-body">
                                  <?php 
                                    $usrquery = $conn->query("SELECT * FROM userss WHERE user_id = '{$row['accuser_id']}'", PDO::FETCH_ASSOC);
                                    if ( $usrquery->rowCount() ){
                                      foreach($usrquery as $urow) {
                                        echo "<strong>E-posta : </strong>".$urow["user_email"]."<br/><strong>Telefon Numarası : </strong>".$urow["user_phone"]."<br/><strong> Adres : </strong>".$urow["user_address"]." ";
                                      }
                                    }
                                  ?>
                                </div>                        
                                <!-- User -->           

                                <!-- Device -->
                                <div class="card-header"> 
                                  <h5 class="text-center">Cihaz</h5>
                                </div> 
                                <div class="card-body">
                                  <?php 
                                    $devquery = $conn->query("SELECT * FROM device WHERE device_id = '{$row['accdevice_id']}'", PDO::FETCH_ASSOC);
                                    if ( $devquery->rowCount() ){
                                      foreach($devquery as $drow) {
                                        echo "<strong>Tipi : </strong>".$drow["device_type"]."<br/><strong> Marka : </strong>".$drow["device_brand"]." ";
                                      }
                                    }
                                  ?>
                                </div>
                                <!-- Device -->

                                <!-- Problem -->
                                <div class="card-header"> 
                                  <h5 class="text-center">Sorun</strong></h5>
                                </div> 
                                <div class="card-body">
                                  <?php echo "<strong>". $row["accident_type"]."</strong>"?>
                                </div>
                                <!-- Problem -->

                                <!-- Payment -->
                                <div class="card-header"> 
                                  <h5 class="text-center">Ödeme</h5>
                                </div> 
                                <div class="card-body">
                                  <?php 
                                    $payquery = $conn->query("SELECT * FROM payment WHERE payaccident_id = '{$row['accident_id']}'", PDO::FETCH_ASSOC);
                                    if ( $devquery->rowCount() ){
                                      foreach($payquery as $prow) {
                                        echo "<strong>Tutar : </strong>".$prow["payment_total"]."<i class='fa fa-try'></i><br/><strong> Durumu : </strong>".$prow["payment_status"]." ";
                                      }
                                    }
                                  ?>
                                </div>
                                <!-- Payment -->  
                                <!-- Delete / Update -->
                                <div class="card-header"> 
                                  <h5 class="text-center">Sil / Güncelle / Mail</h5>
                                </div> 
                                <div class="card-body">
                                  <div class="row text-lg-center">
                                    <a type="button" class="col-md-4 col-sm-12 mt-2" onclick="deleteuser('<?php echo $row['accident_id']; ?>','<?php echo $row['accuser_id']; ?>')">
                                      <i class="fa fa-trash text-danger"></i><span class="btn-link text-dark font-weight-bold"> Sil</span> 
                                    </a>
                                    <a type="button" class="col-md-4 col-sm-12 mt-2" onclick="updateuser('<?php echo $row['accuser_id']; ?>', '<?php echo $row['accdevice_id']; ?>', '<?php echo $row['accident_id']; ?>')">
                                      <i class="fas fa-user-edit text-primary"></i><span class="btn-link text-dark font-weight-bold"> Güncelle</span>
                                    </a>
                                    <a type="button" class="col-md-4 col-sm-12 mt-2" onclick="sendmailuser('<?php echo $row['accuser_id']; ?>', '<?php echo $row['accdevice_id']; ?>', '<?php echo $row['accident_id']; ?>')">
                                      <i class="fa fa-envelope text-info"></i><span class="btn-link text-dark font-weight-bold"> Mail</span>
                                    </a>    
                                  </div>
                                </div>                        
                                <!-- Delete / Update -->        
                              </div>
                              <!-- Card body --> 
                            </div>
                          </div>
                        </div>
                        

                      </div>
                      <!-- Accordion Module -->


                    </li>  
                    <!-- Data -->  
                  <?php
                      $access_number += 1; 
                    }
                  }  
                  ?>

                </ul>
                <!-- List -->

       
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
      function addnewuser(){ // Accident id, User id
        if(confirm("Arıza kaydı eklemek istediğinize emin misiniz ?")){
          window.location.href='addnewuser.php?adduser=TRUE';
          return true;
        }   
      }
      function deleteuser(deleteid,deleteuserid){ // Accident id, User id
        if(confirm("Arıza kaydını silmek istediğinize emin misiniz ?")){
          window.location.href='deleteuser.php?accident_id='+deleteid+'&accuser_id='+deleteuserid+'&userdelete=TRUE';
          return true;
        }   
      }
      function updateuser(updusid, upddevid,updaccid){ // 
        if(confirm("Arıza kaydını güncellemek istediğinize emin misiniz ?")){
          window.location.href='userupdate.php?accident_id='+updaccid+'&accuser_id='+updusid+'&accdevice_id='+upddevid+'&updateuser=TRUE';
          return true;
        }   
      }
      function sendmailuser(updusid, upddevid,updaccid){
        if(confirm("Kullanıcıya mail atmak istediğinize emin misiniz ?")) {
          window.location.href='sendmailuser.php?accident_id='+updaccid+'&accuser_id='+updusid+'&accdevice_id='+upddevid+'&sendmail=TRUE';
          return true;   
        }
      }
    </script>  
    <script>
      document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        };     
    </script>        
  </body>
</html>



