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

  // Click control
  if($_GET["productdelete"] == TRUE)
  {
    // Product
    $query = $conn->exec("DELETE FROM product WHERE product_id = '".$_GET['product_id']."'");

    
    // Success
    if($query)
    {
      // Db connection close 
      $conn = null;
      $deleteproduct_alert_message = array(
        "message" => "Silme işlemi başarılı",
        "type" => "success"
      );
      $_SESSION['deleteproduct_alert_message'] = $deleteproduct_alert_message;
      header("location: managelogin.php?login_ok=TRUE");
      exit();
    }
    else
    {
      // Db connection close 
      $conn = null;
      $deleteproduct_alert_message = array(
        "message" => "Silme işlemi başarısız",
        "type" => "danger"
      );
      $_SESSION['deleteproduct_alert_message'] = $deleteproduct_alert_message;
      header("location: managelogin.php?login_ok=TRUE");
      exit;
    } 
  }
  else
  {
    header("location: ../error403.php");
    exit();
  }
?>