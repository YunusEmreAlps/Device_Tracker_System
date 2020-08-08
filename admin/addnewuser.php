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

  // All Error Messages
  function errorMessages($error_index, $status_index) 
  {
    $messages = array("Kullanıcı adı boş bırakılamaz", "Kullanıcı adı çok uzun", "Kullanıcı adı hatalı girilmiştir",
    "Kullanıcı soyadı boş bırakılamaz", "Kullanıcı soyadı çok uzun", "Kullanıcı soyadı hatalı girilmiştir",		
    "Takip numarası boş bırakılamaz", "Takip numarası çok uzun", "Takip numarası hatalı girilmiştir",
    "E-posta adresi boş bırakılamaz", "E-posta adresi hatalı girilmiştir",
    "Telefon numarası boş bırakılamaz", "Telefon numarası hatalı girilmiştir",
    "Adres bilgisi boş bırakılamaz", "Adres bilgisi çok uzun",
    "Cihaz numarası boş bırakılamaz", "Cihaz numarası çok uzun", "Cihaz numarası hatalı girilmiştir",
    "Cihaz tipi boş bırakılamaz", "Cihaz tipi hatalı girilmiştir",
    "Cihazın markası boş bırakılamaz", "Cihazın markası çok uzun", "Cihazın markası hatalı girilmiştir",
    "Arıza numarası boş bırakılamaz", "Arıza numarası çok uzun", "Arıza numarası hatalı girilmiştir",
    "Arıza tipi boş bırakılamaz", "Arıza tipi hatalı girilmiştir",
    "Arıza durumu boş bırakılamaz", "Arıza durumu hatalı girilmiştir",
    "Ücret bilgisi boş bırakılamaz", "Ücret bilgisi çok uzun", "Ücret bilgisi hatalı girilmiştir",
    "Ücret durumu boş bırakılamaz", "Ücret durumu hatalı girilmiştir",
    "Kullanıcı Bilgileri eklenirken hata oluştu", "Cihaz Bilgileri eklenirken hata oluştu", 
    "Arıza Bilgileri eklenirken hata oluştu", "Ücret Bilgileri eklenirken hata oluştu");
    $status = array("danger","success");
    
    // Alert message
    $add_alert_message = array(
      "message" => $messages[$error_index],
      "type" => $status[$status_index]
    );
    $_SESSION["add_alert_message"] = $add_alert_message;
    header("location: addnewuser.php?adduser=TRUE");
  }

  // Click control
  if($_GET["adduser"] == TRUE)
  {
    // Form button control
    if(isset($_POST['useraddbtn'])) 
    {
      // Variable
      $error_counter = 0;

      // User input
      $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
      $surname = htmlspecialchars(stripslashes(trim($_POST['surname'])));
      $user_password = htmlspecialchars(stripslashes(trim($_POST['user_password'])));
      $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
      $phonenumber = htmlspecialchars(stripslashes(trim($_POST['phonenumber'])));
      $address = htmlspecialchars(stripslashes(trim($_POST['address'])));

      // Name control (Yunus Emre)
      if(empty($name))
      {
        $error_counter += 1;
        errorMessages(0, 0);
        exit();
      }
      if(strlen($name)>50)
      {
        $error_counter += 1;
        errorMessages(1, 0);
        exit();
      }
      if(!preg_match("/^[A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç]+(([ ][A-ZĞÜŞİÖÇ])?[a-zğüşıöç]*)*$/", $name))
      {
        $error_counter += 1;
        errorMessages(2, 0);
        exit();
      }
      //  Name
      // Surname control (Upper Case Turkish Character)
      if(empty($surname))
      {
        $error_counter += 1;
        errorMessages(3, 0);
        exit();
      }
      if(strlen($surname)>50)
      {
        $error_counter += 1;
        errorMessages(4, 0);
        exit();
      }
      if(!preg_match("/^[A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç]*$/", $surname))
      {
        $error_counter += 1;
        errorMessages(5, 0);
        exit();
      }
      // Surname
      // User Password (Upper Case)
      if(empty($user_password))
      {
        $error_counter += 1;
        errorMessages(6, 0);
        exit();
      }
      if(strlen($user_password)>10)
      {
        $error_counter += 1;
        errorMessages(7, 0);
        exit();
      }
      if(!preg_match("/^[A-Z0-9]*$/", $user_password))
      {
        $error_counter += 1;
        errorMessages(8, 0);
        exit();
      }
      // User Password
      // Email
      if((empty($email)))
      {
        $error_counter += 1;
        errorMessages(9, 0);
        exit();
      }
      if((strlen($email)>50) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
      {
        $error_counter += 1;
        errorMessages(10, 0);
        exit();
      }      
      // Email
      // Phone Number
      if(empty($phonenumber))
      {
        $error_counter += 1;
        errorMessages(11, 0);
        exit();
      }
      if((strlen($phonenumber)>11) || (!preg_match("/^([0]{1}[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2})*$/", $phonenumber)))
      {
        $error_counter += 1;
        errorMessages(12, 0);
        exit();
      }   
      // Phone Number
      // Address

      // Address
      if(empty($address))
      {
        $error_counter += 1;
        errorMessages(13, 0);
        exit();
      }
      if(strlen($address)>255)
      {
        $error_counter += 1;
        errorMessages(14, 0);
        exit();
      }
      // Address

      // Device
      if($error_counter == 0)
      {
        $device_id = htmlspecialchars(stripslashes(trim($_POST['device_id'])));
        $device_type = htmlspecialchars(stripslashes(trim($_POST['device_type'])));
        $device_brand = htmlspecialchars(stripslashes(trim($_POST['device_brand'])));


        // Device Number
        if(empty($device_id))
        {
          $error_counter += 1;
          errorMessages(15, 0);
          exit();
        }
        if(strlen($device_id)>10)
        {
          $error_counter += 1;
          errorMessages(16, 0);
          exit();
        }
        if(!preg_match("/^[A-Z0-9]*$/", $device_id))
        {
          $error_counter += 1;
          errorMessages(17, 0);
          exit();
        }
        // Device Number
        // Device Type
        $devtypes = array("Bilgisayar", "Tablet", "Telefon");
        $types_result = 0; // false
        
        for($i=0; $i<count($devtypes); $i++)
        {
            if($device_type == $devtypes[$i])
            {
                $types_result = 1; // true
                break;
            }
        }

        if(empty($device_type))
        {
          $error_counter += 1;
          errorMessages(18, 0);
          exit();
        }
        if($types_result == 0)
        {
          $error_counter += 1;
          errorMessages(19, 0);
          exit();
        }
        // Device Type
        // Device Brand
        if(empty($device_brand))
        {
          $error_counter += 1;
          errorMessages(20, 0);
          exit();
        }
        if(strlen($device_brand)>50)
        {
          $error_counter += 1;
          errorMessages(21, 0);
          exit();
        }
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $device_brand))
        {
          $error_counter += 1;
          errorMessages(22, 0);
          exit();
        }
        // Device Brand

        // Accident
        if($error_counter == 0)
        {
          $accident_id = htmlspecialchars(stripslashes(trim($_POST['accident_id'])));
          $accident_type = htmlspecialchars(stripslashes(trim($_POST['accident_type'])));
          $accident_status = htmlspecialchars(stripslashes(trim($_POST['accident_status'])));

          // Accident Number
          if(empty($accident_id))
          {
            $error_counter += 1;
            errorMessages(23, 0);
            exit();
          }
          if(strlen($accident_id)>10)
          {
            $error_counter += 1;
            errorMessages(24, 0);
            exit();
          }
          if(!preg_match("/^[A-Z0-9]*$/", $accident_id))
          {
            $error_counter += 1;
            errorMessages(25, 0);
            exit();
          }
         // Accident Number
         // Accident Type
         if(empty($accident_type))
         {
           $error_counter += 1;
           errorMessages(26, 0);
           exit();
         }
         if(strlen($accident_type)>50)
         {
           $error_counter += 1;
           errorMessages(27, 0);
           exit();
         }
         if(!preg_match("/^[a-zğüşıöçA-ZĞÜŞİÖÇ ]*$/", $accident_type))
         {
           $error_counter += 1;
           errorMessages(28, 0);
           exit();
         }
         // Accident Type 
         // Accident Status
          $acctypes = array("İşlem Tamamlanmıştır", "Tamir Sürecinde", "İşlem Tamamlanmamıştır");
          $acctypes_result = 0; // false
          
          for($i=0; $i<count($acctypes); $i++)
          {
              if($accident_status == $acctypes[$i])
              {
                  $acctypes_result = 1; // true
                  break;
              }
          }

          if(empty($accident_status))
          {
            $error_counter += 1;
            errorMessages(29, 0);
            exit();
          }
          if($acctypes_result == 0)
          {
            $error_counter += 1;
            errorMessages(30, 0);
            exit();
          }
          // Accident Status
        }
        // Accident
        
        // Payment
        if($error_counter == 0)
        {
          $payment_total = htmlspecialchars(stripslashes(trim($_POST['payment_total'])));
          $payment_status = htmlspecialchars(stripslashes(trim($_POST['payment_status'])));

          // Payment Total
          if(empty($payment_total))
          {
            $error_counter += 1;
            errorMessages(31, 0);
            exit();
          }
          if(strlen($payment_total)>10)
          {
            $error_counter += 1;
            errorMessages(32, 0);
            exit();
          }
          if(!preg_match("/^(\d{1,6})(,\d{1,4})*$/", $payment_total))
          {
            $error_counter += 1;
            errorMessages(33, 0);
            exit();
          }
         // Payment Total
         // Payment Status
         $paytypes = array("Ödendi", "Ödenmedi");
         $paytypes_result = 0; // false
         
         for($i=0; $i<count($paytypes); $i++)
         {
             if($payment_status == $paytypes[$i])
             {
                 $paytypes_result = 1; // true
                 break;
             }
         }

         if(empty($payment_status))
         {
           $error_counter += 1;
           errorMessages(34, 0);
           exit();
         }
         if($paytypes_result == 0)
         {
           $error_counter += 1;
           errorMessages(35, 0);
           exit();
         } 
         // Payment Status

         // No error
         if($error_counter == 0)
         {
            // Variable
            $user_control = 0; // false 
            $device_control = 0; // false
            $accident_control = 0; // false
            $payment_control = 0; // false

            // User
            $query = $conn->query("SELECT * FROM userss WHERE user_id = '$user_password'", PDO::FETCH_ASSOC); 
            if ( $query->rowCount() ){
              foreach($query as $row) {
                $user_control = 1; // true   
              }
            }
          
            // new user (insert)
            if($user_control == 0)
            {
              $query = $conn->prepare("INSERT INTO userss SET
              user_id = ?,
              user_name = ?,
              user_surname = ?,
              user_email = ?,
              user_phone = ?,
              user_address = ?");
              $insert = $query->execute(array($user_password, $name, $surname, $email, $phonenumber, $address));
              
              if(!$insert)
              {
                $error_counter += 1;
                errorMessages(36, 0);
                exit();          
              }
            }

            // Device
            $query = $conn->query("SELECT * FROM device WHERE device_id = '$device_id'", PDO::FETCH_ASSOC); 
            if ( $query->rowCount() ){
              foreach($query as $row) {
                $device_control = 1; // true   
              }
            }

            // new device (insert)
            if($device_control == 0)
            {
              $query = $conn->prepare("INSERT INTO device SET
              device_id = ?,
              device_type = ?,
              device_brand = ?");
              $insert = $query->execute(array($device_id, $device_type, $device_brand));
              
              if(!$insert)
              {
                $error_counter += 1;
                errorMessages(37, 0);
                exit();          
              }
            }

            // Accident
            $query = $conn->query("SELECT * FROM accident WHERE accident_id = '$accident_id'", PDO::FETCH_ASSOC); 
            if ( $query->rowCount() ){
              foreach($query as $row) {
                $accident_control = 1; // true   
              }
            }

            // new accident (insert)
            if($accident_control == 0)
            {
              $query = $conn->prepare("INSERT INTO accident SET
              accuser_id = ?,
              accdevice_id = ?,
              accident_id = ?,
              accident_type = ?,
              accident_status = ?");
              $insert = $query->execute(array($user_password, $device_id, $accident_id, $accident_type, $accident_status));
              
              if(!$insert)
              {
                $error_counter += 1;
                errorMessages(38, 0);
                exit();          
              }              
            }

            // Payment
            $query = $conn->query("SELECT * FROM payment WHERE payaccident_id = '$accident_id'", PDO::FETCH_ASSOC); 
            if ( $query->rowCount() ){
              foreach($query as $row) {
                $payment_control = 1; // true   
              }
            }

            // new payment (insert)
            if($payment_control == 0)
            {
              $query = $conn->prepare("INSERT INTO payment SET
              payaccident_id = ?,
              payment_total = ?,
              payment_status = ?");
              $insert = $query->execute(array($accident_id, $payment_total, $payment_status));
              
              if(!$insert)
              {
                $error_counter += 1;
                errorMessages(39, 0);
                exit();          
              }              
            }

            if($error_counter == 0)
            {
              $deleteuser_alert_message = array(
                "message" => "Ekleme işlemi başarılı",
                "type" => "success"
              );
              $_SESSION['deleteuser_alert_message'] = $deleteuser_alert_message;
              header("location: adminlogin.php?login_ok=TRUE");
              exit();
            }

         }
         // No error         



        }
        // Payment
      }
      // Device

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
              <h1 class="h3 mb-0 text-gray-800">Arıza</h1>
              <!-- Error Message -->
              <?php if(isset($_SESSION["add_alert_message"])) { ?>
                <div class="alert alert-<?php echo $_SESSION["add_alert_message"]["type"]?> mt-4">
                  <?php echo $_SESSION["add_alert_message"]["message"] ?>
                </div>
                <?php unset($_SESSION["add_alert_message"]); ?>
              <?php } ?>
              <!-- Error Message -->
            </div>

            <!-- Content Row -->            
            <div class="card shadow mb-4">
              <!-- Header -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Arıza Kaydı Ekle</h6>
              </div>
              <!-- Header -->
              <!-- Body -->
              <div class="card-body">

              <form method="POST" autocomplete="off">
                  
                  <!-- User -->
                  <div class="card-header"> 
                    <h5 class="text-center">Kullanıcı Bilgileri</h5>
                  </div> 
                  <div class="card-body">

                    <!-- Device Tracker Number -->
                    <div class="form-group user-box mt-4 mb-3">
                      <input type="text" maxlength="10" name="user_password" oninput="this.value = this.value.toUpperCase()" placeholder="Takip Numarası" required/>
                      <span for="tracker-label">Takip numarası</span>
                    </div>
                    <!-- Device Tracker Number -->
                    <!-- Name -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="50" name="name" placeholder="Ad" required/>
                      <span for="name-label">Ad</span>
                    </div>
                    <!-- Name -->
                    <!-- Surname -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="50" name="surname" placeholder="Soyad" required/>
                      <span for="surname-label">Soyad</span>
                    </div>
                    <!-- Surname -->
                    <!-- Email -->
                    <div class="form-group user-box mb-3">
                      <input type="email" maxlength="50" name="email" placeholder="E-posta" required/>
                      <span for="email-label">E-posta</span>
                    </div>
                    <!-- Email --> 
                    <!-- Phone Number -->
                    <div class="form-group user-box mb-3">
                      <input type="tel" maxlength="11" name="phonenumber" placeholder="Telefon Numarası" required/>
                      <span for="phone-label">Telefon Numarası</span>
                    </div>
                    <!-- Phone Number -->
                    <!-- Address -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="255" name="address" placeholder="Adres" value="Adres bilgisi girilmemiştir" required/>
                      <span for="address-label">Adres</span>
                    </div>                      
                    <!-- Address -->        

                  </div>
                  <!-- User -->
                      
                  <!-- Device -->      
                  <div class="card-header"> 
                    <h5 class="text-center">Cihaz Bilgileri</h5>
                  </div> 
                  <div class="card-body">
                    <!-- Device Number (Upper Case)-->
                    <div class="form-group user-box mt-4 mb-3">
                      <input type="text" maxlength="10" name="device_id" list="devlist" oninput="this.value = this.value.toUpperCase()" placeholder="Cihaz Numarası" required/>
                      <datalist id="devlist">
                        <?php
                          $dquery = $conn->query("SELECT * FROM device", PDO::FETCH_ASSOC); 
                          if ($dquery->rowCount())
                          {
                            foreach($dquery as $drow) 
                            {
                              echo "<option value='".$drow['device_id']."'>(".$drow['device_brand'].")</option>";
                            }
                          }                 
                        ?>
                      </datalist>
                      <span for="devicenumber-label">Cihaz Numarası</span>
                    </div>
                    <!-- Device Number -->
                    <!-- Device Type -->
                    <div class="form-group user-box mb-3">
                      <select name="device_type" id="devtype">
                        <option disabled>Seçiminiz...</option>
                        <option value="Bilgisayar">Bilgisayar</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Telefon">Telefon</option>
                      </select>
                      <span for="devicetype-label">Cihaz Tipi</span>
                    </div>                      
                    <!-- Device Type -->  
                    <!-- Device Brand -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="50" name="device_brand" placeholder="Cihaz Markası" required/>
                      <span for="devicebrand-label">Cihaz Markası</span>
                    </div>
                    <!-- Device Brand -->
                  </div>
                  <!-- Device -->                   

                  <!-- Accident -->   
                  <div class="card-header"> 
                    <h5 class="text-center">Arıza Bilgileri</h5>
                  </div> 
                  <div class="card-body">
                    <!-- Accident Number -->
                    <div class="form-group user-box mt-4 mb-3">
                      <input type="text" maxlength="10" name="accident_id" oninput="this.value = this.value.toUpperCase()" placeholder="Arıza Numarası" required/>
                      <span for="accidentid-label">Arıza Numarası</span>
                    </div>
                    <!-- Accident Number -->
                    <!-- Accident Type -->
                    <div class="form-group user-box mb-3">
                      <input type="text" maxlength="50" name="accident_type" placeholder="Arıza Tipi" required/>
                      <span for="accidenttype-label">Arıza Tipi</span>
                    </div>
                    <!-- Accident Type -->
                    <!-- Accident Status -->
                    <div class="form-group user-box mb-3">
                       <select name="accident_status" id="accstatus">
                        <option disabled>Seçiminiz...</option> 
                        <option value="İşlem Tamamlanmıştır">İşlem Tamamlanmıştır</option>
                        <option value="Tamir Sürecinde">Tamir Sürecinde</option>
                        <option value="İşlem Tamamlanmamıştır">İşlem Tamamlanmamıştır</option>
                      </select>
                      <span for="accstatus-label">Arıza Durumu</span>
                    </div>
                    <!-- Accident Status -->   
                  </div>   
                  <!-- Accident -->               
              
                  <!-- Payment -->
                  <div class="card-header"> 
                    <h5 class="text-center">Ödeme Bilgileri</h5>
                  </div> 
                  <div class="card-body">
                    <!-- Total Payment -->
                    <div class="form-group user-box mt-4 mb-3">
                      <input type="number" maxlength="10" name="payment_total" placeholder="Ücret" required/>
                      <span for="paymenttotal-label">Ücret</span>
                    </div>
                    <!-- Total Payment -->
                    <!-- Payment Status -->
                    <div class="form-group user-box mb-3">
                       <select name="payment_status" id="paystatus">
                        <option disabled>Seçiminiz...</option> 
                        <option value="Ödendi">Ödendi</option>
                        <option value="Ödenmedi">Ödenmedi</option>
                      </select>
                      <span for="paymentstatus-label">Ücret Durumu</span>
                    </div>
                    <!-- Payment Status -->   
                  </div>   
                  <!-- Payment -->    
              
                  <!-- Button -->  
                  <button type="submit" class="btn btn-block mt-3 mb-3 text-light"  style="border-color:#FF3100; background-color: #FF3100;" value="Submit" name="useraddbtn">EKLE</button> 
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
