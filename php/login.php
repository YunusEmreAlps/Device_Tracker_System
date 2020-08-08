<!DOCTYPE html>
<?php session_start(); ?>

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

    <!-- Custom styles for this template -->  
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- ReCAPTCHA --> 
    <!-- ReCAPTCHA -->
  </head>
  <body class="light" id="page-top">
    <div id="loader" class="loadcenter"></div> 

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">UZMAN GSM</a>
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
            <!-- Language -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-size:small;" id="languageselector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dil</a>
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


    <!-- Container -->
    <div class="container" style="margin-top:5%;">
      <!-- Grid Row -->
      <div class="row justify-content-center">
        <!-- Grid Col -->
        <div class="col-xl-12 col-lg-12 col-md-12">
          <!-- Card -->
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Row -->
              <div class="row">
                <!-- Image -->
                <div class="col-lg-6 d-none d-lg-block bg-register-image"><img src="" alt=""></div>
                <!-- Image -->
                <!-- Form -->
                <div class="col-lg-6">
                  <div class="p-5">
                    <!-- Header -->
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Kullanıcı Girişi</h1>
                      <span class="text-muted">Cihaz Takip Sistemi</span>
                      <hr/><br/>
                    </div>
                    <!-- Header -->
                    <form action="<?php echo "user.php" ?>" method="POST" id="userform" autocomplete="off" class="user">

                      <!-- User Error Message -->
                      <?php if(isset($_SESSION["user_alert_message"])) { ?>
                        <div class="alert alert-<?php echo $_SESSION["user_alert_message"]["type"]?> mt-4">
                          <?php echo $_SESSION["user_alert_message"]["message"] ?>
                        </div>
                        <?php unset($_SESSION["user_alert_message"]); ?>
                      <?php } ?>
                      <!-- User Error Message -->
 
                      <!-- Name -->
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" maxlength="50" name="name" oninput="this.value = this.value.toUpperCase()" placeholder="Ad" required/>
                      </div>
                      <!-- Name -->
                      <!-- Surname-->
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user"  maxlength="50" name="surname" oninput="this.value = this.value.toUpperCase()" placeholder="Soyad" required/>
                      </div>
                      <!-- Surname -->
                      <!-- Device Tracker Number -->
                      <div class="form-group">
                      <input type="text" class="form-control form-control-user" maxlength="10" name="user_password" oninput="this.value = this.value.toUpperCase()" placeholder="Takip Numarası" required/>
                      </div>
                      <!-- Device Tracker Number -->
                      <br/>
                      <!-- Button -->
                      <button type="submit" class="btn btn-block mt-3 mb-3 text-light"  style="border-color:#FF3100; background-color: #FF3100;" value="Submit" name="userSubmit">Görüntüle</button>
                      <button type="reset" class="btn btn-block btn-primary mt-3 mb-3 text-light" style="background-color: #6830f6;" value="Reset">Reset</button>  
                      <!-- Button -->
                    </form>
                  </div>                
                </div>
                <!-- Form -->
              </div>  
              <!-- Row -->  
            </div>
          </div>   
          <!-- Card -->
        </div> 
        <!-- Grid Col -->
      </div> 
      <!-- Grid Row -->
    </div>
    <!-- Container -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/new-age.min.js"></script>  
    <script>
      function ThemeSwitcher(){  
        var c=document.getElementById('switch');
        // dark
        if(c.checked) {
          document.body.style.backgroundColor="#17141d"; // rgb(15, 18, 25)
          document.getElementById("uzmanmap").style.filter = "grayscale(100%) invert(92%) contrast(83%)";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#818d96";
          }
        } 
        // light
        else {
          document.body.style.backgroundColor="#fff";
          document.getElementById("uzmanmap").style.filter = "grayscale(0%)";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#212529";  
          }
        }
      } 
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
      // Show Password
      $(document).ready(function() {
          $("#show_hide_password a").on('click', function(event) {
              event.preventDefault();
              if($('#show_hide_password input').attr("type") == "text"){
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass( "fa-eye-slash" );
                  $('#show_hide_password i').removeClass( "fa-eye" );
              }else if($('#show_hide_password input').attr("type") == "password"){
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass( "fa-eye-slash" );
                  $('#show_hide_password i').addClass( "fa-eye" );
              }
          });
      });
      // Show Password
    </script>
  </body>  
</html>

