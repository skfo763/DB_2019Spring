<?php
  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
  $com = $_GET['comp'];

  if($comp == 'true') {
    echo "<script>alert('해당 상품의 판매가 완료되었습니다.');</script>";
  }

  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  $id = $_POST["id"];
  $pw = $_POST["pw"];

  if(empty($logined)) {
    $sql = "SELECT * FROM user WHERE user_id='$id' AND password='$pw';";
  } else {
    $sql = "SELECT * FROM user WHERE student_id='$check_sid';";
  }

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  if(empty($row)) {
    header("Location: http://localhost/php/error.php?name=err3");
  } else {
    $logined = 'true';
    $check_sid = $row['student_id'];
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
        margin-top: 20px;
        height: 1px;
        background-color: #999999;
      }

      #contents {
        margin-top: 10px;
        margin: 0 auto;
        display: table;
        text-align: center;
      }

      #contents ul {
        list-style:none;
      }

      #text_val {
        margin: 0 auto;
        text-align: center;
      }

      #text_val .hed {
        padding-top: 3px;
        list-style: none;
        font-size: 15px;
      }

      #text_val .info {
        width: 150px;
        padding: 5px;
        background: #bbbbbb;
        font-size: 12px;
        list-style: none;
        float: left;
        border-bottom: 1px solid #cccccc;
      }

      #text_val .value {
        width: 550px;
        padding: 5px;
        background: #ffffff;
        font-size: 12px;
        list-style: none;
        float: left;
        border-bottom: 1px solid #cccccc;
      }

      #text_val .pid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #aaaaaa;
        list-style: none;
        font-size: 12px;
        width: 100px;
        float: left;
      }

      #text_val .ptitle {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #aaaaaa;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
      }

      #text_val .bid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #aaaaaa;
        list-style: none;
        font-size: 12px;
        width: 220px;
        float: left;
      }

      #text_val .btime {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #aaaaaa;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
      }

      #text_val .divider {
        font-size: 12px;
        background-color: #dddddd;
        list-style:none;
      }

      #sell_info .pid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 100px;
        float: left;
      }

      #sell_info .ptitle {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
      }

      #sell_info .bid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 220px;
        float: left;
      }

      #sell_info .btime {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
      }

      #buy_info .pid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 100px;
        float: left;
      }

      #buy_info .ptitle {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
      }

      #buy_info .bid {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 220px;
        float: left;
      }

      #buy_info .btime {
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #ffffff;
        list-style: none;
        font-size: 12px;
        width: 200px;
        float: left;
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
        <h4>사용자 로그인 하기</h4>
      </div>

      <div id="division_line1"/>

      <div id="contents">
        <?php
          $sell_sql = "SELECT p.product_id, p.product_title, b.buyer_sid
                       FROM product p INNER JOIN buy_instance b
                       WHERE p.seller_student_id = '$check_sid'
                       ORDER BY p.product_id;";
          $buy_sql = "SELECT p.product_id, p.product_title, p.seller_student_id, p.buyer_student_id
                      FROM buy_instance b INNER JOIN product p
                      WHERE b.buyer_sid = '$check_sid'
                      ORDER BY p.product_id;";

          $sell_result = mysqli_query($conn, $sell_sql);
          $buy_result = mysqli_query($conn, $buy_sql);

          echo "<div id='text_val'><ul><li class='hed'>- 회원 정보 -</li></ul>";
          echo "<ul><li class='info'>학번</li><li class='value'>".$row['student_id']."</li></ul>";
          echo "<ul><li class='info'>닉네임</li><li class='value'>".$row['nickname']."</li></ul>";
          echo "<ul><li class='info'>실명</li><li class='value'>".$row['realname']."</li></ul>";
          echo "<ul><li class='info'>생년월일</li><li class='value'>".$row['birth']."</li></ul>";
          echo "<ul><li class='info'>소속</li><li class='value'>".$row['user_category']."</li></ul>";
          echo "<ul><li class='info'>계좌번호</li><li class='value'>".$row['account_no']."</li></ul>";
          echo "<ul><li class='info'>은행</li><li class='value'>".$row['bank_name']."</li></ul></p>";

          echo "<ul><h6>&nbsp; </h6><li>- 판매 정보 -</li></ul>";
          echo "<ul><li class='pid'>상품 번호</li><li class='ptitle'>상품 이름</li><li class='bid'>구매자 아이디</li><li class='btime'>판매 확정</li></ul>";

          echo "<div id='sell_info'>";
          while($sell_row = mysqli_fetch_array($sell_result)) {
            echo "<ul>";
            echo "<li class='pid'>".$sell_row['product_id']."</li>";
            echo "<li class='ptitle'><a href='http://localhost/php/show_product.php?check_login=$logined&sid=$check_sid&pid=".$sell_row['product_id']."'>".$sell_row['product_title']."</a></li>";
            echo "<li class='bid'>".$sell_row['buyer_sid']."</li>";
            echo "<li class='btime'><a href='http://localhost/php/real_sell.php?check_login=$logined&sid=$check_sid&pid=".$sell_row['product_id']."&ssid=".$sell_row['buyer_sid']."'>판매하기</a></li>";
            echo "</ul>";
          }
          echo "</div>";

          echo "<ul><h6>&nbsp; </h6><li>- 구매 정보 -</li></ul>";
          echo "<ul><li class='pid'>상품 번호</li><li class='ptitle'>상품 이름</li><li class='bid'>판매자 아이디</li><li class='btime'>거래 현황</li></ul>";

          echo "<div id='buy_info'>";
          while($buy_row = mysqli_fetch_array($buy_result)) {
            echo "<ul>";
            echo "<li class='pid'>".$buy_row['product_id']."</li>";
            echo "<li class='ptitle'><a href='http://localhost/php/show_product.php?check_login=$logined&sid=$check_sid&pid=".$buy_row['product_id']."'>".$buy_row['product_title']."</a></li>";
            echo "<li class='bid'>".$buy_row['seller_student_id']."</li>";

            if(empty($buy_row['buyer_student_id']) == false) {
              if($buy_row['buyer_student_id'] == $check_sid) {
                echo "<li class='btime'><a href='http://localhost/php/real_buy.php?check_login=$logined&sid=$check_sid&pid=".$buy_row['product_id']."&ssid=".$buy_row['seller_student_id']."'>구매완료(상세정보 입력)</a></li>";
              } else {
                echo "<li class='btime'>판매 완료</li>";
              }
            } else {
              echo "<li class='btime'>판매 진행중</li>";
            }
            echo "</ul>";
          }
          echo "</div>";

          echo "</div>";

        ?>
      </div>
    </header>
  </body>
</html>
