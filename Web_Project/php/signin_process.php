<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $sid = $_POST['sid'];
  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];
  $status = $_POST['status'];
  $birth = $_POST['birth'];
  $nick = $_POST['nickname'];
  $real = $_POST['realname'];
  $acco = $_POST['account'];
  $bank = $_POST['bank'];

  if(empty($sid) == true || empty($uid) == true || empty($pwd) == true || empty($status) == true || empty($nick) == true ||empty($real) == true ) {

    header('Location: http://localhost/php/error.php?name=err1');

  } else {

    $sql = "INSERT INTO user (student_id, user_id, password, user_category, nickname, realname, account_no, bank_name, birth)
    VALUES ('$sid', '$uid', '$pwd', '$status', '$nick', '$real', '$acco', '$bank', '$birth');";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
      echo mysql_error();
      header('Location: http://localhost/php/error.php?name=err2');
    } else {
      header('Location: http://localhost/php/login.php');
    }
  }

?>
