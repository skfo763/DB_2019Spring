<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $title = $_POST['title'];
  $stuffname = $_POST['stuffname'];
  $buydate = $_POST['buydate'];
  $seller_sid = $_POST['seller_id'];
  $stuffstate = $_POST['stuffstate'];
  $contents = $_POST['contents'];
  $price = $_POST['price'];
  $location = $_POST['campus_name']." ".$_POST['building_name'];
  $time = date("Y-m-d H:i:s");

  $logined = $_POST['check_login'];

  $sql1 = "INSERT INTO product (product_id, product_title, product_explanation, seller_student_id, buyer_student_id) VALUES (0, '$title', '$contents', '$seller_sid', null);";
  $sql2 = "INSERT INTO data (product_id, location, product_instance_status, upload_time, price) VALUES (0, '$location', '$stuffstate', '$time', '$price');";

  $result1 = mysqli_query($conn, $sql1);
  $result2 = mysqli_query($conn, $sql2);

  if(!$result1 || !$result2) {
    header("Location: http://localhost/php/error.php?name=err4&check_login=$logined&sid=$seller_sid");
  } else {
    header ("Location: http://localhost/php/home.php?check_login=$logined&sid=$seller_sid");
  }
?>
