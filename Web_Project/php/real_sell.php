<?php
  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
  $pid = $_GET['pid'];
  $ssid = $_GET['ssid'];
  $failed = $_GET['failed'];

  if($failed == true) echo "<script>alert('메시지를 전송하는데 실패했습니다. 다시 시도해주세요.');</script>";

  $sql = "UPDATE product SET buyer_student_id = '$ssid' WHERE seller_student_id = '$check_sid';";
  $result = mysqli_query($conn, $sql);

  if(!$result) {
    header("Location: http://localhost/php/error.php?name=err5&check_login=$logined&sid=$seller_sid");
  } else {
    $myname_sql = "SELECT user.realname FROM user WHERE user.student_id = '$check_sid';";
    $chat_sql = "SELECT u1.realname AS sender, u2.realname AS receiver, u2.student_id, m.message_value, m.tstamp, p.product_title FROM user u1, user u2, message m, product p WHERE p.product_id = m.product_id AND m.sender_sid = u1.student_id AND m.receiver_sid = u2.student_id;";
    $result_chat = mysqli_query($conn, $chat_sql);
    $result_myname = mysqli_query($conn, $myname_sql);

    if(!$result_chat || !$result_myname) {
      header("Location: http://localhost/php/error.php?name=err5&check_login=$logined&sid=$seller_sid");
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>

      body {
        background-color: #dddddd;
        margin: 0px;
      }

      a { text-decoration: none; }

      header {
        height:40px;
        margin:0;
        border:1px solid #cccccc;
      }

      #header_nav {
        height:40px;
        overflow:hidden;
        background-color:#9a2000;
      }

      #header_nav a:link { text-decoration: none; color: #ffffff }
      #header_nav a:visited { text-decoration: none; color: #ffffff }
      #header_nav a:hover { text-decoration: none; color: #333333 }

      #header_nav li {
        font-size:10px;
        color:#ffffff;
        margin-right:20px;
        list-style:none;
        float:left;
      }

      #header_search {
        margin: 0 auto;
        display: table;
        text-align: center;
      }

      #header_search img {
        margin-top: 20px;
        width: 70px;
        height: 70px;
      }

      #editText1 {
          width: 300px; height:30px; margin-right:20px;
      }

      #btn1 {
          width: 60px; height: 30px;
      }

      #division_line1 {
        margin-top: 30px;
        height: 1px;
        background-color: #999999;
      }

      #contents {
        margin-top: 10px;
        margin: 0 auto;
        display: table;
        text-align: center;
      }

      #contents .send_writer {
        font-size: 12px;
        width: 340px;
        float: left;
        list-style: none;
        text-align: left;
        padding: 3px;
        background-color: #aabbcc;
      }

      #contents .send_timestamp {
        font-size: 12px;
        width: 340px;
        text-align: right;
        float: left;
        list-style: none;
        padding: 3px;
        background-color: #aabbcc;
      }

      #contents .send_message_val {
        font-size: 12px;
        padding:10px;
        width: 700px;
        list-style: none;
        text-align: left;
        float: left;
        background-color: #ffffff;
        margin-bottom: 10px;
      }

      #contents .recv_writer {
        font-size: 12px;
        width: 340px;
        float: right;
        list-style: none;
        text-align: right;
        padding: 3px;
        background-color: #aabbcc;
      }

      #contents .recv_timestamp {
        font-size: 12px;
        width: 340px;
        text-align: left;
        float: right;
        list-style: none;
        padding: 3px;
        background-color: #aabbcc;
      }

      #contents .recv_message_val {
        font-size: 12px;
        padding:10px;
        width: 700px;
        list-style: none;
        text-align: right;
        float: right;
        background-color: #ffffff;
        margin-bottom: 10px;
      }

      #send_area .val {
        margin-top: 20px;
        margin-right: 15px;
        width: 450px;
        height: 25px;
      }

      #send_area .btn {
        width: 100px;
        height: 30px;
      }


    </style>
  </head>
  <body>
    <header>
      <div id="header_nav">
        <ul>
          <?php
            echo '<li><a href="http://localhost/php/home.php?check_login='.$logined.'&sid='.$check_sid.'">메인 화면</a></li>';
            echo '<li><a href="http://localhost/php/mypage.php?check_login='.$logined.'&sid='.$check_sid.'">내 정보</a></li>';
            echo '<li><a href="http://localhost/php/buy.php?check_login='.$logined.'&sid='.$check_sid.'">구매하기</a></li>';
            echo '<li><a href="http://localhost/php/sell.php?check_login='.$logined.'&sid='.$check_sid.'">판매하기</a></li>';
            echo '<li><a href="http://localhost/php/login.php?check_login='.$logined.'&sid='.$check_sid.'">로그인</a></li>';
            echo '<li><a href="http://localhost/php/signin.php?check_login='.$logined.'&sid='.$check_sid.'">회원가입</a></li>';
          ?>
        </ul>
      </div>
      <div id="header_search">
        <img src="main_icon.png"/>
        <h2>성균관대학교 중고장터</br>"사고팔고"</h2>
      </div>

      <div id="division_line1"></div>

      <div id="contents">
        <?php
          $name_row = mysqli_fetch_array($result_myname);
          $mname = $name_row['realname'];

          echo "<h4>".$row['product_title']." 상품 채팅방</h4>";

          while($row = mysqli_fetch_array($result_chat)) {
            if($mname == $row['sender']) {
              echo "<ul><li class='send_writer'>".$row['sender']."</li><li class=send_timestamp>".$row['tstamp']."</li></ul>";
              echo "<ul><li class='send_message_val'>".$row['message_value']."</li></ul>";

            } else {
              echo "<ul><li class='recv_writer'>".$row['sender']."</li><li class=recv_timestamp>".$row['tstamp']."</li></ul>";
              echo "<ul><li class='recv_message_val'>".$row['message_value']."</li></ul>";

            }
          }

          echo "<form id='send_area' action='http://localhost/php/send_message.php?check_login=$logined&sid=$check_sid' method='POST'>";
          echo "<input type='hidden' name='sender_sid' value='$check_sid'></input>";
          echo "<input type='hidden' name='receiver_sid' value='$ssid'></input>";
          echo "<input type='hidden' name='product_id' value='$pid'></input>";
          echo "<input class='val' type='text' name='message_itself'></input>";
          echo "<input class='btn' type='submit' id='check_msg' value='메시지 전송'></input>";
          echo "</form>";

        ?>
      </div>
    </header>
  </body>
</html>
