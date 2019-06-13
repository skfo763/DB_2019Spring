<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $sid = $_POST['check_sid'];
  $pid = $_POST['pid'];
  $comment = $_POST['comment'];
  $logined = $_POST['logined'];
  $time = date("Y-m-d H:i:s");

  echo $sid;

  $sql = "INSERT into buy_instance (buy_instance_key, product_id, buyer_sid, instance_time) VALUES (0, $pid, '$sid', '$time');";
  $result = mysqli_query($conn, $sql);

  if(!$result) {
    header("Location: http://localhost/php/error.php?name=err5&check_login=$logined&sid=$sid");
  } else {
    header("Location: http://localhost/php/show_product.php?check_login=$logined&sid=$sid&pid=$pid&buy=true");
  }
?>
