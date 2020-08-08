<!DOCTYPE html>
<?php session_start(); ?>

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
    <title>UZMAN GSM - Giriş</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body>

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
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <!-- Image -->
                <!-- Form -->
                <div class="col-lg-6">
                  <div class="p-5">
                    <!-- Header -->
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Admin Girişi</h1>
                      <span class="text-muted">İçerik Yönetim Sistemi</span>
                      <hr/><br/>
                    </div>
                    <!-- Header -->
                    <form action="managelogin.php" method="POST" class="user">
                      <!-- Error Message -->
                      <?php if(isset($_SESSION["adminmanage_alert_message"])) { ?>
                        <div class="alert alert-<?php echo $_SESSION["adminmanage_alert_message"]["type"]?> mt-4">
                          <?php echo $_SESSION["adminmanage_alert_message"]["message"] ?>
                        </div>
                        <?php unset($_SESSION["adminmanage_alert_message"]); ?>
                      <?php } ?>
                      <!-- Error Message -->
                      <!-- Email -->
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user" maxlength="50" id="admin_email" name="email" aria-describedby="emailHelp" placeholder="E-posta" required/>
                      </div>
                      <!-- Email -->
                      <!-- Password -->
                      <div class="form-group">
                        <div class="input-group" id="show_hide_password">
                        <input type="password"  class="form-control form-control-user" maxlength="10" id="password" name="admin_password" placeholder="Şifre" required/>
                          <div class="input-group-addon ml-3 mt-3">
                            <a href=""><i class="fa fa-eye-slash text-dark" aria-hidden="true"></i></a>
                          </div>
                        </div>    
                      </div>
                      <!-- Password -->
                      <br/>
                      <!-- Button -->
                      <button type="submit" class="btn btn-block mt-3 mb-3 text-light"  style="border-color:#FF3100; background-color: #FF3100;" value="Submit" name="adminmanageSubmit">Giriş</button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
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
