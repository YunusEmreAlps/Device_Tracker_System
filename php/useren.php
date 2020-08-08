<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:index.php');
  exit();
}
?>
<?php
  header("Access-Control-Allow-Origin: *");   
  include_once 'authenticate.php';              // Database connection
  session_start();

  // PDO is the best way to connect database. Because it will protect you from MySQL injection.
  function errorMessages($error_index, $status_index) 
  {
    $messages = array("User name is required", "User name should be longer", "User name that you've entered is incorrect", 
    "User surname is required", "User surname should be longern", "User surname that you've entered is incorrect", 
    "Tracking number is required", "Tracking number should be longer", "Tracking number that you've entered is incorrect", "User name, surname or tracking number that you've entered are incorrect");
    $status = array("danger","success");
    
    // Alert message
    $user_alert_message = array(
      "message" => $messages[$error_index],
      "type" => $status[$status_index]
    );
    $_SESSION["user_alert_message"] = $user_alert_message;
    header("location: loginen.php");
  }


  // User click (English)
  if(isset($_POST['userSubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST')
  {

    // User input
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $surname = htmlspecialchars(stripslashes(trim($_POST['surname'])));
    $user_password = htmlspecialchars(stripslashes(trim($_POST['user_password'])));

    // Variable
    $error_counter = 0;

    // Name control (Upper Case Turkish Character)
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
    if(!preg_match("/^[A-ZĞÜŞİÖÇ]+(([ ][A-ZĞÜŞİÖÇ])?[A-ZĞÜŞİÖÇ]*)*$/", $name))
    {
      $error_counter += 1;
      errorMessages(2, 0);
      exit();
    }
    // Name


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
    if(!preg_match("/^[A-ZĞÜŞİÖÇ]*$/", $surname))
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

    // No error
    if($error_counter == 0)
    {
      // Database connection (success)
      if($conn == true )
      {
        // Variable
        $user_control = false; 
        $query = $conn->query("SELECT * FROM userss WHERE user_id = '{$user_password}' AND  user_name = '{$name}' AND user_surname = '{$surname}'")->fetch(PDO::FETCH_ASSOC); 
        if($query)
        {
          $user_control = true; 
        }       

        // User have in db
        if($user_control == true)
        {
          // Connection Success
          
        }

        // User have not in db
        else
        {
          $error_counter += 1;
          errorMessages(9, 0);
          exit();
        }

      }
      // Database connection (denied)
      else
      {
        die(" - Database Connection failed");
      }
    }
  }

  // User Not Click
  else
  {
    header("location: loginen.php");
  }
?>

<!DOCTYPE html>

<!-- English -->
<html lang="en">
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
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../indexen.php#about">About Us</a>
            </li>
            <!-- About -->
            <!-- Our Services -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../indexen.php#ourservices">Services</a>
            </li>
            <!-- Our Services -->
            <!-- Brands -->
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../indexen.php#product">Products</a>
            </li>
            <!-- Brands -->
            <!-- Device Tracker -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="loginen.php">Device Tracking System</a>
            </li>
            <!-- Device Tracker-->
            <!-- Contact -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="../indexen.php#contactus">Contact Us</a>
            </li>
            <!-- Contact -->
            <!-- Language -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-size:small;" id="languageselector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LANGUAGE</a>
              <div class="dropdown-menu text-center" aria-labelledby="languageselector">
                <a class="dropdown-item" href="login.php">Türkçe</a>
                <a class="dropdown-item" href="loginen.php">English</a>
              </div>
            </li>
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

    <!--  Accident List -->
    <section class="features" id="ourservices">
      <div class="container">
        <!-- Header -->
        <div class="section-heading text-center">
          <h2 class="darkclr" id="featurestitle">YOUR DEVICES</h2>
          <span style="color: #FF3100; text-transform: uppercase; transition: color 0.3s ease-in-out;">Computer / Tablet / Phone</span><br/>
          <hr/>
        </div>
        <!-- Header -->
        
        <!-- List -->
        <ul type="none" style="list-style-type: none; margin: 0; padding: 0;">

          <?php 
          $query = $conn->query("SELECT * FROM accident WHERE accuser_id = '{$user_password}'", PDO::FETCH_ASSOC); 
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
                              <span><?php echo " ".$name." ".$surname." (".$user_password.") " ?></span>
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
                                    echo " <span class='text-success'>Completed <i class='fa'>&#xf00c</i> </span>" ;
                                  } 
                                  else if($row["accident_status"] == "Tamir Sürecinde"){
                                    echo " <span class='text-info'>In Repair <div class='float-right loader'></div> </span>" ;
                                  }
                                  else { 
                                    echo " <span class='text-danger'>Incomplete <i class='fa'>&#xf00d</i></span>" ;
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
                                  
                        <!-- User -->
                        <div class="card-header"> 
                          <h5 class="text-center">User</strong></h5>
                        </div> 
                        <div class="card-body">
                          <?php 
                            $usrquery = $conn->query("SELECT * FROM userss WHERE user_id = '{$row['accuser_id']}'", PDO::FETCH_ASSOC);
                            if ( $usrquery->rowCount() ){
                              foreach($usrquery as $urow) {
                                echo "<strong>Phone Number : </strong>".$urow["user_phone"]."<br/>";
                                // Process status
                                if($urow["user_address"] == "Adres bilgisi girilmemiştir"){
                                  echo "<strong>Address : </strong> No Address";
                                } 
                                else{
                                  echo "<strong>Address : </strong>".$urow["user_address"]."";
                                }
                              }
                            }
                          ?>
                        </div>                        
                        <!-- User -->           

                        <!-- Device -->
                        <div class="card-header"> 
                          <h5 class="text-center">Device</strong></h5>
                        </div> 
                        <div class="card-body">
                          
                          <span>
                            <?php 
                              $devquery = $conn->query("SELECT * FROM device WHERE device_id = '{$row['accdevice_id']}'", PDO::FETCH_ASSOC);
                              if ( $devquery->rowCount() ){
                                foreach($devquery as $drow) {
                                  // Process status
                                  if($drow["device_type"] == "Bilgisayar"){
                                    echo "<strong>Type : </strong><span>Computer</span>";
                                  } 
                                  else if($drow["device_type"] == "Tablet"){
                                    echo "<strong>Type : </strong><span>Tablet</span>" ;
                                  }
                                  else { 
                                    echo "<strong>Type : </strong><span>Phone</span>" ;
                                  }
                                  echo "<br/><strong>Brand : </strong>".$drow["device_brand"]." ";  
                                }
                              }
                            ?>
                          </span>  
                        </div>
                        <!-- Device -->

                        <!-- Problem -->
                        <div class="card-header"> 
                          <h5 class="text-center">Problem</strong></h5>
                        </div> 
                        <div class="card-body">
                          <?php echo "<strong>". $row["accident_type"]."</strong>"?>
                        </div>
                        <!-- Problem -->

                        <!-- Payment -->
                        <div class="card-header"> 
                          <h5 class="text-center">Payment</strong></h5>
                        </div> 
                        <div class="card-body">
                          <?php 
                            $payquery = $conn->query("SELECT * FROM payment WHERE payaccident_id = '{$row['accident_id']}'", PDO::FETCH_ASSOC);
                            if ( $devquery->rowCount() ){
                              foreach($payquery as $prow) {
                                echo "<strong>Total : </strong>".$prow["payment_total"]."<i class='fa fa-try'></i><br/>";
                                if($prow["payment_status"] == "Ödendi"){
                                  echo "<strong>Status : </strong>Paid" ;
                                } 
                                else { 
                                  echo "<strong>Status : </strong>Unpaid" ;
                                }
                              }
                            }
                          ?>
                        </div>
                        <!-- Payment -->  
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
    </section>
    <!--  Accident List -->
    
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
    </script>
  </body>  
</html>


