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
  error_reporting(-1);

  // PDO is the best way to connect database. Because it will protect you from MySQL injection.
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  // Click control
  if($_GET["sendmail"] == TRUE)
  {
    // Variable
    $have_email = false;

    // User 
    $name = null; // Yunus Emre Alpu
    $email = null;
    $user_password =  $_GET["accuser_id"];

    // Device
    $device_id =  $_GET["accdevice_id"];
    $brand = null;

    // Accident
    $accident_id =  $_GET["accident_id"];
    $accident_status = null;

    // User
    $query = $conn->query("SELECT * FROM userss WHERE user_id = '{$user_password}';", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
      foreach($query as $row) 
      {
        // E-mail control
        if($row["user_email"] != null)
        {
          $have_email = true;
          $name = "".$row["user_name"]." ".$row["user_surname"]."";
          $email = $row["user_email"];
        }
      }
    }

    // Device
    $query = $conn->query("SELECT * FROM device WHERE device_id = '{$device_id}';", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
      foreach($query as $row) 
      {
        // Device brand control
        $brand = $row["device_brand"];
      }
    }

    // Accident
    $query = $conn->query("SELECT * FROM accident WHERE accident_id = '{$accident_id}';", PDO::FETCH_ASSOC);
    if ( $query->rowCount() )
    {
      foreach($query as $row) 
      {
        $accident_status = $row["accident_status"];
      }
    }

    // Message 
    if($accident_status == "Tamir Sürecinde")
      $message = "Merhaba ".$name.",<br/><br/>Arızalı olan ".$brand." cihazınız tamir sürecindedir.<br/>İyi Çalışmalar.<br/>Kendinize İyi Bakın,<br/>UZMAN GSM";
    
    else if($accident_status == "İşlem Tamamlanmıştır")
      $message = "Merhaba ".$name.",<br/><br/>Arızalı olan ".$brand." cihazınızın işlemi tamamlanmıştır.<br/>İyi Çalışmalar.<br/><br/>Kendinize İyi Bakın,<br/>UZMAN GSM";

    else
      $message = "Merhaba ".$name.",<br/><br/>Arızalı olan ".$brand." cihazınızı ".$user_password." takip edebilirsiniz.<br/>İyi Çalışmalar.<br/><br/>Kendinize İyi Bakın,<br/>UZMAN GSM";
      
    
    // Send E-mail
    if(($have_email == true) || ($name != null)) 
    {
      require '../vendor/autoload.php';
      try
      {
        // SMTP server configuration
        $mail = new PHPMailer(true);
        $mail->isSMTP();   
        $mail->SMTPAuth = true; // SMTP auth
        $mail->SMTPDebug  = 2;
        $mail->CharSet = 'UTF-8'; // message character set
        $mail->Mailer = "smtp";
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; // SSL port
        $mail->SMTPSecure = "tls"; 
        $mail->Username   = "info@uzmangsm.com"; // Username
        $mail->Password   = ""; // Password
        $mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";
  
        // Recipients
        $mail->setFrom($mail->Username, "UZMAN GSM"); 
        $mail->addAddress($email, $name);
  
        // Content
        $mail->isHTML(true);
        $mail->Subject = "Cihaz Durum Bilgilendirme";
        $mail->Body    = $message;
  
        if($mail->Send()){
          // Alert message 
          $mail_alert_message = array(
            "message" => "Mail Gönderildi.",
            "type" => "success"
          );
          $_SESSION["mail_alert_message"] = $mail_alert_message;  
          header("location: adminlogin.php?login_ok=TRUE");
        }
        
      }
      catch (Exception $e)
      { 
        // Alert message 
        $mail_alert_message = array(
          "message" => "Mail Gönderilemedi.",
          "type" => "danger"
        );
        $_SESSION["mail_alert_message"] = $mail_alert_message;  
        header("location: adminlogin.php?login_ok=TRUE");
      }
    }
    else
    {
      if(empty($email))
      {
        // Alert message 
        $mail_alert_message = array(
          "message" => "Kullanıcının E-Posta bilgisi girilmemiştir.",
          "type" => "danger"
        );
        $_SESSION["mail_alert_message"] = $mail_alert_message;  
        header("location: adminlogin.php?login_ok=TRUE");
      }
      else if(empty($name))
      {
        // Alert message 
        $mail_alert_message  = array(
          "message" => "Kullanıcının Ad ve Soyad bilgisi girilmemiştir.",
          "type" => "danger"
        );  
        $_SESSION["mail_alert_message"] = $mail_alert_message;  
        header("location: adminlogin.php?login_ok=TRUE");
      }
    }
  }
  else
  {
    header("location: ../error403.php");
    exit();
  }

?>