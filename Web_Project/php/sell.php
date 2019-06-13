<?php
  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
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

      #contents p {
        margin-bottom: 5px;
      }

      #ID_input {  width: 300px; height:30px; font-size: 12px;}

      #PW_input {  width: 300px; height: 30px; font-size: 12px; }

      #login { width: 80px; height: 30px;}

      #signin { width: 80px; height: 30px;}

      #contents { font-size: 12px; }

      #sell_post_title {margin-top: 10px; font-size: 12px; width: 300px; height: 20px;}

      #sell_post_stuffname {font-size: 12px; width: 150px; height: 20px; }

      #bought_date {font-size: 12px; width: 150px; height: 20px; }

      #choose_campus { margin-top: 2px; margin-right: 30px;}

      #choose_building {margin-top: 2px;}

      #sell_post_contents {margin-top: 5px; width: 600px; height: 300px;}

      #confirm {margin-bottom: 50px; width: 80px; height: 30px; margin-right: 10px;}

      #cancel {margin-bottom: 50px; width: 80px; height: 30px;}

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
        <h4>나의 중고물품 판매하기</h4>
      </div>

      <div id="division_line1"/>

      <div id="contents">
        <form action="http://localhost/php/sell_process.php" method="POST">
          <p>판매 게시글 제목 : <input id="sell_post_title" name="title" type="text"/>
          <p>
            물품 이름 : <input id="sell_post_stuffname" name="stuffname" type="text"/>
            구매 날짜 : <input id="bought_date" name="buydate" type="date"/>
          </p>
          <p>물품 상태 : </br>
            <input name="stuffstate" type="radio" value="최상"/>최상
            <input name="stuffstate" type="radio" value="상"/>상
            <input name="stuffstate" type="radio" value="중" checked=""/>중
            <input name="stuffstate" type="radio" value="하"/>하
            <input name="stuffstate" type="radio" value="최하"/>최하
          </p>
          <p>희망 가격 : <input id="sell_price" name="price" type="text"/></p>
          <p>거래 위치</br>캠퍼스 :
            <select id="choose_campus" name="campus_name">
              <?php
                echo file_get_contents('./campus.txt');
              ?>
            </select>건물이름 :
            <select id="choose_building" name="building_name">
              <?php
                echo file_get_contents('./building_seoul.txt');
              ?>
            </select>
          </p>
          <p>게시글 내용: </br>
            <input id="sell_post_contents" name="contents" type="text"/>
          </p>
          <input id="confirm" type="submit" value="작성하기"/>
          <?php
            echo "<input type='hidden' name='seller_id' value='$check_sid'/>";
            echo "<input type='hidden' name='check_login' value='$logined'/>";
          ?>
        </form>
      </div>
    </header>
  </body>
</html>
