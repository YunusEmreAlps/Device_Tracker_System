<?php
  header("Access-Control-Allow-Origin: *");   
  include_once 'authenticate.php';              // Database connection
  session_start();

  // PDO is the best way to connect database. Because it will protect you from MySQL injection.

  $submitted_username = '';

  // Admin click (Turkish)
  if(isset($_POST['adminSubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST')
  {
    // User input
    $email = $_POST['email'];
    $admin_password = htmlspecialchars(stripslashes(trim($_POST['admin_password'])));

    // Variable
    $error_counter = 0;

    // Email length control 
    if((empty($email)) || (strlen($email)>50))
    {
      $error_counter += 1;
      
      // Alert message
      $adminservice_alert_message = array(
        "message" => "Lütfen e-posta adresinizi girin",
        "type" => "danger"
      );

      $_SESSION["adminservice_alert_message"] = $adminservice_alert_message;
      header("location: login.php");
      exit();
    }
    // Email control
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $error_counter += 1;
      
      // Alert message
      $adminservice_alert_message = array(
        "message" => "Hatalı e-posta adresi",
        "type" => "danger"
      );

      $_SESSION["adminservice_alert_message"] = $adminservice_alert_message;
      header("location: login.php");
      exit();
    }
    // Admin password
    if((empty($admin_password)) || (strlen($admin_password)>50) || (!preg_match("/^[a-zA-Z0-9ğüşiöçĞÜŞİÖÇ]*$/", $admin_password)))
    {
      $error_counter += 1;
      
      // Alert message
      $adminservice_alert_message = array(
        "message" => "Lütfen şifrenizi girin",
        "type" => "danger"
      );

      $_SESSION["adminservice_alert_message"] = $adminservice_alert_message;
      header("location: login.php");
      exit();
    }

    // No error
    if($error_counter == 0)
    {
      // Database connection (success)
      if($conn == true )
      {
        // Variable
        $admin_control = false; 

        $query = $conn->query("SELECT * FROM adminn WHERE admin_email = '{$email}'", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
          foreach($query as $row) {
            if($row["admin_password"] == md5($admin_password))
            {
              $admin_control = true;
            }
          }
        }

        // Admin have in db
        if($admin_control == true)
        {
          // Connection success
          define("adminhomepage", true);
          require_once 'adminhomepage.php';
        }

        // Admin have not in db
        else
        {
          $error_counter += 1;
      
          // Alert message
          $adminservice_alert_message = array(
            "message" => "Hatalı e-posta veya şifre",
            "type" => "danger"
          );
    
          $_SESSION["adminservice_alert_message"] = $adminservice_alert_message;
          header("location: login.php");
          exit();
        }

      }
      // Database connection (denied)
      else
      {
        die(" - Veritabanı bağlantı hatası");
      }
    }

  }
  // User Not Click
  else
  {
    if($_GET["login_ok"] == FALSE)
    {
      header("location: login.php");
      exit();
    }
    else if($_GET["login_ok"] == TRUE)
    {
      // Delete User, Send Mail
      define("adminhomepage", true);
      require_once 'adminhomepage.php';
    }
  }
?>
