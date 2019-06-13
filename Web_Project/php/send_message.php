<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
  $pid = $_POST['product_id'];
  $sender = $_POST['sender_sid'];
  $receiver = $_POST['receiver_sid'];
  $msg = $_POST['message_itself'];
  $time = date("Y-m-d H:i:s");

  $sql = "INSERT INTO message (message_id, sender_sid, receiver_sid, tstamp, product_id, message_value)
          VALUES (0, '$sender', '$receiver', '$time', '$pid', '$msg');";

  $result = mysqli_query($conn, $sql);

  echo $sql;

  if(!$result) {
    header("Location: http://localhost/php/real_sell.php?check_login=$logined&sid=$check_sid&pid=$pid&ssid=$receiver&failed=true");
  } else {
    header("Location: http://localhost/php/real_sell.php?check_login=$logined&sid=$check_sid&pid=$pid&ssid=$receiver");
  }
?>
