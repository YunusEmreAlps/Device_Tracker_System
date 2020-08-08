<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:index.php');
  exit();
}
?>
<?php
  header("Access-Control-Allow-Origin: *");   
  include_once '../php/authenticate.php';              // Database connection
  session_start();

  // All error messages
  function errorMessages($error_index, $status_index) 
  {
    $messages = array("Ürün Adı boş bırakılamaz", "Ürün Adı çok uzun", "Ürün Adı Türkçe karakter içeremez", "Ürün Kategori boş bırakılamaz",
    "Ürün Kategorisi çok uzun", "Ürünün Kategorisi rakam içeremez", "Uzantı desteklenmiyor, Lütfen JPEG, JPG veya PNG uzantılı dosya seçiniz.",
    "Dosya boyutu 16MB'dan küçük olmalıdır.", "Ürün Bilgisi boş bırakılamaz", "Ürün Bilgisi çok uzun", "Ürün Bilgisi hatalı girilmiştir", 
    "Ürün Fiyatı boş bırakılamaz", "Ürün Fiyatı çok uzun", "Ürün Fiyatı hatalı girilmiştir", "Ürün Kaydı güncellenemedi"); 
    $status = array("danger","success");
    
    // Alert message
    $updateproduct_alert_message = array(
      "message" => $messages[$error_index],
      "type" => $status[$status_index]
    );
    $_SESSION["updateproduct_alert_message"] = $updateproduct_alert_message;
    header("location: updateproduct.php?product_id=".$_GET["product_id"]."&productupdate=TRUE");
  }

  // Click control
  if($_GET["productupdate"] == TRUE)
  {
    // User button click control
    if(isset($_POST['productupdatebtn'])) 
    {
      // Variable
      $error_counter = 0;

      // User input
      $product_name = htmlspecialchars(stripslashes(trim($_POST['product_name'])));
      $product_category = htmlspecialchars(stripslashes(trim($_POST['product_category'])));
      $product_information = htmlspecialchars(stripslashes(trim($_POST['product_information'])));
      $product_price = htmlspecialchars(stripslashes(trim($_POST['product_price'])));
      $file_name = NULL;
      $file_size = NULL;
      $file_tmp = NULL;
      $file_type= NULL;
      $image = NULL;

      // Product Name control (Xiaomi Mi 8)
      if(empty($product_name))
      {
        $error_counter += 1;
        errorMessages(0, 0);
        exit();
      }
      if(strlen($product_name)>100)
      {
        $error_counter += 1;
        errorMessages(1, 0);
        exit();
      }
      if(!preg_match("/^[a-zA-Z0-9 ]*$/", $product_name))
      {
        $error_counter += 1;
        errorMessages(2, 0);
        exit();
      }

      // Product Category (Computer/Tablet/Phone/Other)
      if(empty($product_category))
      {
        $error_counter += 1;
        errorMessages(3, 0);
        exit();
      }
      if(strlen($product_category)>100)
      {
        $error_counter += 1;
        errorMessages(4, 0);
        exit();
      }
      if(!preg_match("/^[a-zğüşıöçA-ZĞÜŞİÖÇ ]*$/", $product_category))
      {
        $error_counter += 1;
        errorMessages(5, 0);
        exit();
      }
      
      // Product Image      
      if(isset($_FILES['pimage']))
      {
        $file_name = addslashes($_FILES['pimage']['name']);
        $file_size =$_FILES['pimage']['size'];
        $file_tmp = addslashes(file_get_contents($_FILES['pimage']['tmp_name'])) ;
        $file_type=$_FILES['pimage']['type'];
        // $file_ext=strtolower(end(explode('.',$_FILES['pimage']['name'])));
        $file_ext = strtolower(pathinfo($_FILES['pimage']['name'],PATHINFO_EXTENSION));
        
        $image = file_get_contents(addslashes($_FILES['pimage']['tmp_name']));

        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions) === false){
          $error_counter += 1;
          errorMessages(6, 0);
          exit();
        }
        
        if($file_size > 16777215){
          $error_counter += 1;
          errorMessages(7, 0);
          exit();
        }
      }

      // Product Information
      if(empty($product_information))
      {
        $error_counter += 1;
        errorMessages(8, 0);
        exit();
      }
      if(strlen($product_information)>512)
      {
        $error_counter += 1;
        errorMessages(9, 0);
        exit();
      }
      if(!preg_match("/^[a-zğüşıöçA-ZĞÜŞİÖÇ0-9, ]*$/", $product_information))
      {
        $error_counter += 1;
        errorMessages(10, 0);
        exit();
      }

      // Price
      if(empty($product_price))
      {
        $error_counter += 1;
        errorMessages(11, 0);
        exit();
      }
      if(strlen($product_price)>10)
      {
        $error_counter += 1;
        errorMessages(12, 0);
        exit();
      }
      if(!preg_match("/^(\d{1,6})(,\d{1,4})*$/", $product_price))
      {
        $error_counter += 1;
        errorMessages(13, 0);
        exit();
      }

      // No Error
      if($error_counter == 0)
      {
        $query = $conn->prepare("UPDATE product SET
        product_name = ?,
        product_category = ?,
        product_image = ?,
        product_information = ?,
        product_price = ?
        WHERE product_id = '".$_GET['product_id']."'");
        $update = $query->execute(array($product_name, $product_category, $image, $product_information, $product_price));
        
        if(!$update)
        {
          $error_counter += 1;
          errorMessages(14, 0);               
          exit();          
        }

          // Alert message
          $deleteproduct_alert_message = array(
            "message" => "Güncelleme işlemi başarılı",
            "type" => "success"
          );
          $_SESSION["deleteproduct_alert_message"] = $deleteproduct_alert_message;
          header("location: managelogin.php?login_ok=TRUE");
          exit();
      }
      // No Error
    }
    // User
  }
  else
  {
    header("location: ../error403.php");
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
    <!-- Custom styles for this template -->  
    <link href="../css/user.css" rel="stylesheet">
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
                  <img class="img-profile rounded-circle" src="https://img.icons8.com/nolan/60/admin-settings-male.png">
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
              <!-- Error Message -->
              <?php if(isset($_SESSION["updateproduct_alert_message"])) { ?>
                <div class="alert alert-<?php echo $_SESSION["updateproduct_alert_message"]["type"]?> mt-4">
                  <?php echo $_SESSION["updateproduct_alert_message"]["message"] ?>
                </div>
                <?php unset($_SESSION["updateproduct_alert_message"]); ?>
              <?php } ?>
              <!-- Error Message -->
            </div>

            <!-- Content Row -->            
            <div class="card shadow mb-4">
              <!-- Header -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ürün Kaydını Güncelle</h6>
              </div>
              <!-- Header -->
              <!-- Body -->
              <div class="card-body">
              <form method="POST" autocomplete="off" enctype="multipart/form-data">
                  
                  <!-- Product -->
                  <div class="card-header"> 
                    <h5 class="text-center">Ürün Bilgileri</h5>
                  </div> 
                  <div class="card-body">
                    <?php 
                      $proquery = $conn->query("SELECT * FROM product WHERE product_id = '".$_GET['product_id']."'", PDO::FETCH_ASSOC); 
                      if ( $proquery->rowCount() )
                      {
                        foreach($proquery as $prow) 
                        {
                    ?>
                    <!-- Product Name -->
                    <div class="form-group user-box mt-4 mb-3">
                      <input type="text" maxlength="100" name="product_name" value="<?php echo $prow['product_name'];?>" placeholder="Ürün Ad" required/>
                      <span for="productid-label">Ürün Ad</span>
                    </div>
                    <!-- Product Name -->   
                    <!-- Product Category -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="100"  name="product_category" value="<?php echo $prow['product_category'];?>" placeholder="Ürün Kategori" required/>
                      <span for="productcategory-label">Ürün Kategori</span>
                    </div>
                    <!-- Product Category -->
                    <!-- Product Image -->
                    <div class="form-group user-box mb-3">
                      <input type="file" name="pimage" /> 
                      <span for="productcategory-label">Ürün Resmi</span>
                    </div>
                    <!-- Product Image -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="512" name="product_information" value="<?php echo $prow['product_information'];?>"  placeholder="Ürün Bilgisi" required/>
                      <span for="paymenttotal-label">Ürün Bilgisi</span>
                    </div>                      
                    <!-- Product Image -->
                    <!-- Price -->
                    <div class="form-group user-box mb-3">
                      <input type="number" maxlength="10" name="product_price" value="<?php echo $prow['product_price'];?>"  placeholder="Ücret" required/>
                      <span for="paymenttotal-label">Ücret</span>
                    </div>
                    <!-- Price -->
                    <?php     
                        }
                      }
                    ?>
                  </div>
                  <!-- User -->
                                                                        
                  <!-- Button -->  
                  <button type="submit" class="btn btn-block mt-3 mb-3 text-light"  style="border-color:#FF3100; background-color: #FF3100;" value="Submit" name="productupdatebtn">GÜNCELLE</button> 
                  <!-- Button -->     
                </form>
       
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
  </body>
</html>
