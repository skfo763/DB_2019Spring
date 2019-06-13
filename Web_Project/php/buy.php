<?php
  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
  $search_stuffname = $_POST['sname'];

  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  if(empty($logined)) {
    header("Location: http://localhost/php/error.php?name=err4");
  } else {
    if(empty($search_stuffname) == false) {
      $sql = "SELECT p.product_id, p.seller_student_id, p.product_title, d.upload_time FROM product p, data d WHERE p.product_id = d.product_id AND p.product_title LIKE '%$search_stuffname%';";
    } else {
      $sql = "SELECT p.product_id, p.seller_student_id, p.product_title, d.upload_time FROM product p, data d WHERE p.product_id = d.product_id;";
    }
  }

  $result = mysqli_query($conn, $sql);
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

      #editText1 {  font-size: 12px; width: 300px; height:25px; margin-right:20px; margin-top: 10px; margin-bottom: 50px;}

      #btn1 { width: 60px; height: 30px; margin-top: 10px; margin-bottom: 50px; }

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

      #category .pid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #999999;
        list-style: none;
        font-size: 12px;
        width: 80px;
        float: left;
      }

      #category .ssid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #999999;
        list-style: none;
        font-size: 12px;
        width: 150px;
        float: left;
      }

      #category .sname {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #999999;
        list-style: none;
        font-size: 12px;
        width: 350px;
        float: left;
      }

      #category .time {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #999999;
        list-style: none;
        font-size: 12px;
        width: 150px;
        float: left;
      }

      #information h3 {
        padding-top: 20px;
        padding-bottom:20px;
      }

      #information .pid {
        padding-top: 3px;
        padding-bottom: 3px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 80px;
        float: left;
      }

      #information .ssid {
        padding-top: 3px;
        padding-bottom: 3px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 150px;
        float: left;
      }

      #information .sname {
        padding-top: 3px;
        padding-bottom: 3px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 350px;
        float: left;
      }

      #information .time {
        padding-top: 3px;
        padding-bottom: 3px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 150px;
        float: left;
      }

      #search_part {
        margin-top: 15px;
        margin: 0 auto;
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
        <h4>중고물품 구매하기</h4>
      </div>
      <div id="division_line1"/>

      <div id="contents">
        <div id="category">
          <ul>
            <li class='pid'>상품 번호</li>
            <li class='ssid'>판매자 아이디</li>
            <li class='sname'>상품 이름</li>
            <li class='time'>작성 시간</li>
          </ul>
        </div>
        <div id="information">
          <?php
            if(!$result) {
              echo "<h3>검색 결과가 없습니다!</h3>";

            } else {
              while($row = mysqli_fetch_array($result)) {
                echo "<ul>";
                echo "<li class='pid'>".$row['product_id']."</li>";
                echo "<li class='ssid'>".$row['seller_student_id']."</li>";
                echo "<li class='sname'><a href='http://localhost/php/show_product.php?check_login=$logined&sid=$check_sid&pid=".$row['product_id']."'>".$row['product_title']."</a></li>";
                echo "<li class='time'>".$row['upload_time']."</li>";
                echo "</ul>";
              }
            }
          ?>
        </div>
        <div id="search_part">
          <?php
            echo "<form action='http://localhost/php/buy.php?check_login=$logined&sid=$check_sid' method='POST''>";
            echo "<input id='editText1' name='sname' type='text' placeholder='검색하고자 하는 물품 이름을 입력해주세요'/>";
            echo "<input id='btn1' type='submit'/>";
            echo "</form>"
          ?>
        </div>
      </div>
    </header>
  </body>
</html>
