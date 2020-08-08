<?php
  header("Access-Control-Allow-Origin: *");   
  include_once 'authenticate.php';              // Database connection
  session_start();

  // Click control
  if($_GET["userdelete"] == TRUE)
  {
    // Variable
    $accident_counter = 0; 
    $user_password =  $_GET["accuser_id"];
    $have_accident = false;

    // Total accident number for one user
    $query = $conn->query("SELECT * FROM accident WHERE accuser_id = '{$user_password}';", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach($query as $row) {
        $accident_counter++;
      }
    }

    // Delete

    // Accident 
    $query = $conn->exec("DELETE FROM accident WHERE accident_id = '".$_GET['accident_id']."'");

    // Payment
    $query = $conn->exec("DELETE FROM payment WHERE payaccident_id = '".$_GET['accident_id']."'"); // Delete problem

    // Total accident number is equal 1
    if($accident_counter == 1)
    {
      $query = $conn->exec("DELETE FROM userss WHERE user_id = '{$user_password}'");
    }
    
    // Total Accident number is equal 0
    // User
    $linker = $conn->query("SELECT user_id FROM userss;", PDO::FETCH_ASSOC);
    if ($linker->rowCount())
    {
      // Accident
      $linker2 = $conn->query("SELECT accuser_id FROM accident;", PDO::FETCH_ASSOC);
      foreach($linker as $row) 
      {
        $have_accident = false;
        foreach($linker2 as $row2)
        {
          if((substr_compare($row['user_id'], $row2['accuser_id'], 0) == 0) || ($row['user_id'] == $row2['accuser_id']))
          {
            $have_accident= true;
            break;
          }
        }
        if($have_accident == false)
        {
          $query = $conn->exec("DELETE FROM userss WHERE user_id = '{$row['user_id']}'");
        }
      }
    }

    // Success
    if($linker)
    {
      // Db connection close 
      $conn = null;
      $deleteuser_alert_message = array(
        "message" => "Silme işlemi başarılı",
        "type" => "success"
      );
      $_SESSION['deleteuser_alert_message'] = $deleteuser_alert_message;
      header("location: adminlogin.php?login_ok=TRUE");
      exit();
    }
    else
    {
      // Db connection close 
      $conn = null;
      $deleteuser_alert_message = array(
        "message" => "Silme işlemi başarısız",
        "type" => "danger"
      );
      $_SESSION['deleteuser_alert_message'] = $deleteuser_alert_message;
      header("location: adminlogin.php?login_ok=TRUE");
      exit;
    } 
  }
  else
  {
    header("location: ../error403.php");
    exit();
  }
?>