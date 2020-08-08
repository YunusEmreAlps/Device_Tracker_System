<?php
  header("Access-Control-Allow-Origin: *");   
  include_once 'authenticate.php';              // Database connection
  session_start();

  // All error messages
  function errorMessages($error_index, $status_index) 
  {
    $messages = array("Lütfen ad bilgisini girin", "Lütfen soyad bilgisini girin", "Girdiğiniz takip numarası hatalı", "Lütfen e-posta bilgisini girin", 
    "Girdiğiniz e-posta adresi hatalı", "Girdiğiniz telefon numarası hatalı", "Adres bilgisi boş bırakılamaz", "Girdiğiniz cihaz numarası hatalı",
    "Lütfen cihaz tipini girin", "Lütfen cihazın markasını ve modelini girin", "Girdiğiniz arıza numarası hatalı", "Lütfen arıza tipini girin",
    "Lütfen arıza durumunu girin", "Lütfen ücret bilgisini girin", "Lütfen ücret durumunu girin", "Kullanıcı Bilgileri eklenirken hata oluştu",
    "Kullanıcı Bilgileri güncellenirken hata oluştu", "Cihaz Bilgileri eklenirken hata oluştu", "Cihaz Bilgileri güncellenirken hata oluştu", "Arıza Bilgileri eklenirken hata oluştu",
    "Arıza Bilgileri güncellenirken hata oluştu", "Ücret Bilgileri eklenirken hata oluştu", "Ücret Bilgileri güncellenirken hata oluştu");
    $status = array("danger","success");
    
    // Alert message
    $update_alert_message = array(
      "message" => $messages[$error_index],
      "type" => $status[$status_index]
    );
    $_SESSION["update_alert_message"] = $update_alert_message;
    header("location: userupdate.php?accident_id=".$_GET["accident_id"]."&accuser_id=".$_GET["accuser_id"]."&accdevice_id=".$_GET["accdevice_id"]."&updateuser=TRUE");
  }

  // Click control
  if($_GET["updateuser"] == TRUE)
  {
    // User button click control
    if(isset($_POST['userupdatebtn'])) 
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
      if((empty($name)) || (strlen($name)>50) || (!preg_match("/^[A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç]+(([ ][A-ZĞÜŞİÖÇ])?[a-zğüşıöç]*)*$/", $name)))
      {
        $error_counter += 1;
        errorMessages(0, 0);
        exit();
      }

      // Surname control (Alpu)
      if((empty($surname)) || (strlen($surname)>50) || (!preg_match("/^[A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç]*$/", $surname))) 
      {
        $error_counter += 1;
        errorMessages(1, 0);
        exit();
      }

      // User Password (Upper Case)
      if((empty($user_password)) || (strlen($user_password)>10) || (!preg_match("/^[A-Z0-9]*$/", $user_password))) 
      {
        $error_counter += 1;
        errorMessages(2, 0);
        exit();
      }
      // User Password
      // Email control
      if((empty($email)) || (strlen($email)>50))
      {
        $error_counter += 1;
        errorMessages(3, 0);
        exit();
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $error_counter += 1;
        errorMessages(4, 0);
        exit();
      }
      // Email control
      // Phone Number
      if((empty($phonenumber)) || (strlen($phonenumber)>11) || (!preg_match("/^([0]{1}[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2})*$/", $phonenumber))) 
      {
        $error_counter += 1;
        errorMessages(5, 0);
        exit();
      }
      // Phone Number
      // Address
      if((empty($address)) || (strlen($address)>255)) 
      {
        $error_counter += 1;
        errorMessages(6, 0);
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
        if((empty($device_id)) || (strlen($device_id)>10) || (!preg_match("/^[A-Z0-9]*$/", $device_id)))
        {
          $error_counter += 1;
          errorMessages(7, 0);
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

        if(empty($device_type) || ($types_result == 0))
        {
          $error_counter += 1;
          errorMessages(8, 0);
          exit();
        }
        // Device Type
        // Device Brand
        if((empty($device_brand)) || (strlen($device_brand)>50) || (!preg_match("/^[a-zA-Z0-9 ]*$/", $device_brand)))
        {
          $error_counter += 1;
          errorMessages(9, 0);
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
          if((empty($accident_id)) || (strlen($accident_id)>10) || (!preg_match("/^[A-Z0-9]*$/", $accident_id)))
          {
            $error_counter += 1;
            errorMessages(10, 0);
            exit();
          }
         // Accident Number
         // Accident Type
         if((empty($accident_type)) || (strlen($accident_type)>50) || (!preg_match("/^[a-zğüşıöçA-ZĞÜŞİÖÇ ]*$/", $accident_type)))
         {
           $error_counter += 1;
           errorMessages(11, 0);
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

          if(empty($accident_status) || ($acctypes_result == 0))
          {
            $error_counter += 1;
            errorMessages(12, 0);
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
          if((empty($payment_total)) || (strlen($payment_total)>10) || (!preg_match("/^(\d{1,6})(,\d{1,4})*$/", $payment_total)))
          {
            $error_counter += 1;
            errorMessages(13, 0);
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

         if(empty($payment_status) || ($paytypes_result == 0))
         {
           $error_counter += 1;
           errorMessages(14, 0);
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
                errorMessages(15, 0);
                exit();          
              }
            }
            // (update)
            else
            {
              $query = $conn->prepare("UPDATE userss SET
              user_id = ?,
              user_name = ?,
              user_surname = ?,
              user_email = ?,
              user_phone = ?,
              user_address = ?
              WHERE user_id = '".$_GET['accuser_id']."'");
              $update = $query->execute(array($user_password, $name, $surname, $email, $phonenumber, $address));
              
              if(!$update)
              {
                $error_counter += 1;
                errorMessages(16, 0);               
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
                errorMessages(17, 0);
                exit();          
              }
            }
            // (update)
            else
            {
              $query = $conn->prepare("UPDATE device SET
              device_id = ?,
              device_type = ?,
              device_brand = ?
              WHERE device_id = '".$_GET['accdevice_id']."'");
              $update =$query->execute(array($device_id, $device_type, $device_brand));
              
              if(!$update)
              {
                $error_counter += 1;
                errorMessages(18, 0);
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
                errorMessages(19, 0);
                exit();          
              }              
            }
            // (update)
            else
            {
              $query = $conn->prepare("UPDATE accident SET
              accuser_id = ?,
              accdevice_id = ?,
              accident_id = ?,
              accident_type = ?,
              accident_status = ?
              WHERE accident_id = '".$_GET['accident_id']."'");
              $update = $query->execute(array($user_password, $device_id, $accident_id, $accident_type, $accident_status));
              
              if(!$update)
              {
                $error_counter += 1;
                errorMessages(20, 0);
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
                errorMessages(21, 0);
                exit();          
              }              
            }
            // (update)
            else
            {
              $query = $conn->prepare("UPDATE payment SET
              payaccident_id = ?,
              payment_total = ?,
              payment_status = ?
              WHERE payaccident_id = '".$_GET['accident_id']."'");
              $update = $query->execute(array($accident_id, $payment_total, $payment_status));
              
              if(!$update)
              {
                $error_counter += 1;
                errorMessages(22, 0);
                exit();          
              }
            }

            if($error_counter == 0)
            {
              $deleteuser_alert_message = array(
                "message" => "Güncelleme işlemi başarılı",
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- It is shown in the browser's title bar or in the page's tab. -->
    <title>UZMAN GSM</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../device-mockups/device-mockups.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Custom styles for this template -->  
    <link href="../css/user.css" rel="stylesheet">
  </head>
  <body class="light" id="page-top">
    <div id="loader" class="loadcenter"></div> 

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">UZMAN GSM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <!-- About -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../index.php#about">Hakkımızda</a>
            </li>
            <!-- About -->
            <!-- Our Services -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../index.php#ourservices">Hizmetlerimiz</a>
            </li>
            <!-- Our Services -->
            <!-- Brands -->
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../index.php#product">Ürünler</a>
            </li>
            <!-- Brands -->
            <!-- Device Tracker -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="login.php">Cihaz Takip Sistemi</a>
            </li>
            <!-- Device Tracker-->
            <!-- Contact -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../index.php#contactus">İletişim</a>
            </li>
            <!-- Contact -->
            <!-- Theme  -->
            <li class="nav-item dropdown theme-visible" >
              <div class="toggle-container mx-auto" id="themebtn">
                <input type="checkbox" id="switch" name="theme" onclick="ThemeSwitcher()"/>
                <label class="text-left" for="switch">Toggle</label>
              </div>
            </li>
            <!-- Theme -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation Bar -->

    <!-- Update User -->    
    <section class="features" id="ourservices">
      <!-- Container -->
      <div class="container">
        
        <!-- Header -->
        <div class="section-heading text-center">
          <h2 class="darkclr" id="featurestitle">ARIZA GÜNCELLE</h2>
          <!-- Error Message -->
          <?php if(isset($_SESSION["update_alert_message"])) { ?>
            <div class="alert alert-<?php echo $_SESSION["update_alert_message"]["type"]?> mt-4">
              <?php echo $_SESSION["update_alert_message"]["message"] ?>
            </div>
            <?php unset($_SESSION["update_alert_message"]); ?>
          <?php } ?>
          <!-- Error Message -->
          <hr/>
        </div>
        <!-- Header -->

        <!-- Accordion Module -->
        <div id="accordionModule">
          <div class="accordion" id="accordionBox">
            <!-- Card -->
            <div class="card">
              
              <!-- Card Header -->
              <div class="card-header hplus" id="headingOne">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#updatecollapse" aria-expanded="false">
                    ARIZA KAYDINI GÜNCELLE
                    <i class="fa fa-plus"></i> 
                  </button>
                </h2>
              </div>
              <!-- Card Header -->
              <div id="updatecollapse" class="collapse" aria-labelledby="headingOne" data-parent="#accordionBox" style="">
                
                <!-- Card Body --> 
                <div class="card-body">
                  
                  <form method="POST" autocomplete="off">
                  
                    <!-- User -->
                    <div class="card-header"> 
                      <h5 class="text-center">Kullanıcı Bilgileri</h5>
                    </div> 
                    <div class="card-body">
                      <?php 
                        $usrquery = $conn->query("SELECT * FROM userss WHERE user_id = '".$_GET['accuser_id']."'", PDO::FETCH_ASSOC); 
                        if ( $usrquery->rowCount() )
                        {
                          foreach($usrquery as $urow) 
                          {
                      ?>
                      <!-- Device Tracker Number -->
                      <div class="form-group user-box mt-4 mb-3">
                        <input type="text" maxlength="10" name="user_password" value="<?php echo $_GET['accuser_id'];?>" oninput="this.value = this.value.toUpperCase()" placeholder="Takip Numarası" required/>
                        <span for="tracker-label">Takip numarası</span>
                      </div>
                      <!-- Device Tracker Number -->
                      <!-- Name -->
                      <div class="form-group user-box mb-3">
                        <input type="text" maxlength="50" name="name" value="<?php echo $urow['user_name'];?>" placeholder="Ad" required/>
                        <span for="name-label">Ad</span>
                      </div>
                      <!-- Name -->
                      <!-- Surname -->
                      <div class="form-group user-box mb-3">
                        <input type="text" maxlength="50" name="surname" value="<?php echo $urow['user_surname'];?>"  placeholder="Soyad" required/>
                        <span for="surname-label">Soyad</span>
                      </div>
                      <!-- Surname -->
                      <!-- Email -->
                      <div class="form-group user-box mb-3">
                        <input type="email" maxlength="50" name="email" value="<?php echo $urow['user_email'];?>" placeholder="E-posta" required/>
                        <span for="email-label">E-posta</span>
                      </div>
                      <!-- Email --> 
                      <!-- Phone Number -->
                      <div class="form-group user-box mb-3">
                        <input type="tel" maxlength="11" name="phonenumber" value="<?php echo $urow['user_phone'];?>" placeholder="Telefon Numarası" required/>
                        <span for="phone-label">Telefon Numarası</span>
                      </div>
                      <!-- Phone Number -->
                      <!-- Address -->
                      <div class="form-group user-box mb-3">
                        <input type="text" maxlength="255" name="address" value="<?php echo $urow['user_address'];?>" placeholder="Adres" required/>
                        <span for="address-label">Adres</span>
                      </div>                      
                      <!-- Address -->        
                      <?php     
                          }
                        }
                      ?>
                    </div>
                    <!-- User -->
                        
                    <!-- Device -->      
                    <div class="card-header"> 
                      <h5 class="text-center">Cihaz Bilgileri</h5>
                    </div> 
                    <div class="card-body">
                      <?php 
                        $devquery = $conn->query("SELECT * FROM device WHERE device_id = '".$_GET['accdevice_id']."'", PDO::FETCH_ASSOC); 
                        if ( $devquery->rowCount() )
                        {
                          foreach($devquery as $drow) 
                          {
                      ?>
                      <!-- Device Number (Upper Case)-->
                      <div class="form-group user-box mt-4 mb-3">
                        <input type="text" maxlength="10" name="device_id" value="<?php echo $_GET['accdevice_id'];?>" oninput="this.value = this.value.toUpperCase()" placeholder="Cihaz Numarası" required/>
                        <span for="devicenumber-label">Cihaz Numarası</span>
                      </div>
                      <!-- Device Number -->
                      <!-- Device Type -->
                      <div class="form-group user-box mb-3">
                        <script> 
                          $(function(){
                            $("#devtype").val("<?php echo $drow['device_type'];?>");
                          });
                        </script>
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
                        <input type="text" maxlength="50" name="device_brand" value="<?php echo $drow['device_brand'];?>"  placeholder="Cihaz Markası" required/>
                        <span for="devicebrand-label">Cihaz Markası</span>
                      </div>
                      <!-- Device Brand -->
                      
                      <?php     
                          }
                        }
                      ?>
                    </div>
                    <!-- Device -->                   

                    <!-- Accident -->   
                    <div class="card-header"> 
                      <h5 class="text-center">Arıza Bilgileri</h5>
                    </div> 
                    <div class="card-body">
                      <?php 
                        $accquery = $conn->query("SELECT * FROM accident WHERE accident_id = '".$_GET['accident_id']."'", PDO::FETCH_ASSOC); 
                        if ( $accquery->rowCount() )
                        {
                          foreach($accquery as $arow) 
                          {
                      ?>

                      <!-- Accident Number -->
                      <div class="form-group user-box mt-4 mb-3">
                        <input type="text" maxlength="10" name="accident_id" value="<?php echo $_GET['accident_id'];?>" oninput="this.value = this.value.toUpperCase()" placeholder="Arıza Numarası" required/>
                        <span for="accidentid-label">Arıza Numarası</span>
                      </div>
                      <!-- Accident Number -->
                      <!-- Accident Type -->
                      <div class="form-group user-box mb-3">
                        <input type="text" maxlength="50" name="accident_type" value="<?php echo $arow['accident_type'];?>" placeholder="Arıza Tipi" required/>
                        <span for="accidenttype-label">Arıza Tipi</span>
                      </div>
                      <!-- Accident Type -->
                      <!-- Accident Status -->
                      <div class="form-group user-box mb-3">
                        <script>
                          $(function(){
                            $("#accstatus").val("<?php echo $arow['accident_status'] ?>");
                          });
                        </script>
                         <select name="accident_status" id="accstatus">
                          <option disabled>Seçiminiz...</option> 
                          <option value="İşlem Tamamlanmıştır">İşlem Tamamlanmıştır</option>
                          <option value="Tamir Sürecinde">Tamir Sürecinde</option>
                          <option value="İşlem Tamamlanmamıştır">İşlem Tamamlanmamıştır</option>
                        </select>
                        <span for="accstatus-label">Arıza Durumu</span>
                      </div>
                      <!-- Accident Status -->      

                      <?php     
                          }
                        }
                      ?>
                    </div>   
                    <!-- Accident -->               
                
                    <!-- Payment -->
                    <div class="card-header"> 
                      <h5 class="text-center">Ödeme Bilgileri</h5>
                    </div> 
                    <div class="card-body">
                      <?php 
                        $payquery = $conn->query("SELECT * FROM payment WHERE payaccident_id = '".$_GET['accident_id']."'", PDO::FETCH_ASSOC); 
                        if ( $payquery->rowCount() )
                        {
                          foreach($payquery as $prow) 
                          {
                      ?>
                      <!-- Total Payment -->
                      <div class="form-group user-box mt-4 mb-3">
                        <input type="text" maxlength="10" name="payment_total" value="<?php echo $prow['payment_total'];?>"  placeholder="Ücret" required/>
                        <span for="paymenttotal-label">Ücret</span>
                      </div>
                      <!-- Total Payment -->
                      <!-- Payment Status -->
                      <div class="form-group user-box mb-3">
                        <script>
                          $(function(){
                            $("#paystatus").val("<?php echo $prow['payment_status'] ?>");
                          });
                        </script>
                         <select name="payment_status" id="paystatus">
                          <option disabled>Seçiminiz...</option> 
                          <option value="Ödendi">Ödendi</option>
                          <option value="Ödenmedi">Ödenmedi</option>
                        </select>
                        <span for="paymentstatus-label">Ücret Durumu</span>
                      </div>
                      <!-- Payment Status -->   
                      <?php     
                          }
                        }
                      ?>
                    </div>   
                    <!-- Payment -->    
                
                    <!-- Button -->  
                    <button type="submit" class="btn btn-block mt-3 mb-3 text-light"  style="border-color:#FF3100; background-color: #FF3100;" value="Submit" name="userupdatebtn">GÜNCELLE</button> 
                    <!-- Button -->     
                  </form>
                </div>
                <!-- Card Body -->         
              </div>          
              



            </div>
            <!-- Card -->
          

          </div>
        </div>
        <!-- Accordion Module -->
    


      </div>
      <!-- Container -->
    </section>
    <!-- Update User -->

    
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/new-age.min.js"></script>  
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

    
      // Desktop Theme Switcher   
      function ThemeSwitcher(){  
        var c=document.getElementById('switch');
        // dark
        if(c.checked) {
          document.body.style.backgroundColor="#17141d";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#818d96";
          }
        } 
        // light
        else {
          document.body.style.backgroundColor="#fff";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#212529";  
          }
        }
      } 
      // Desktop Theme Switcher

      // ICON 
      $(".collapse.show").each(function(){
        $(this).prev(".card-header").addClass("hminus");
        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
      });

      $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        $(this).prev(".card-header").removeClass("hplus").addClass("hminus");
      }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        $(this).prev(".card-header").removeClass("hminus").addClass("hplus");
      });
    </script>
  </body>  
</html>