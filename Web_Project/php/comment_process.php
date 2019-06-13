<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $sid = $_POST['check_sid'];
  $pid = $_POST['pid'];
  $comment = $_POST['comment'];
  $logined = $_POST['logined'];
  $time = date("Y-m-d H:i:s");

  $sql_select = "SELECT nickname FROM user WHERE user.student_id = '$sid';";
  $select_result = mysqli_query($conn, $sql_select);

  if(!$select_result) {
      header("Location: http://localhost/php/error.php?name=err5&check_login=$logined&sid=$sid");

  } else {
    $row_search = mysqli_fetch_array($select_result);
    $nickname = $row_search['nickname'];
    $sql_insert = "INSERT into comments (product_id, comment_id, comment_value, comment_writer_id, comment_writer_nickname, write_timestamp) VALUES ($pid, 0, '$comment', '$sid', '$nickname', '$time');";

    $insert_result = mysqli_query($conn, $sql_insert);

    if(!$insert_result) {
      header("Location: http://localhost/php/error.php?name=err5&check_login=$logined&sid=$sid");
    } else {
      header("Location: http://localhost/php/show_product.php?check_login=$logined&sid=$sid&pid=$pid");
    }
  }
?>
