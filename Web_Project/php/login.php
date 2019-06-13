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

      #ID_input {  width: 300px; height:30px; font-size: 12px;}

      #PW_input {  width: 300px; height: 30px; font-size: 12px; }

      #login { width: 80px; height: 30px;}

      #signin { width: 80px; height: 30px;}

      #contents h5 { margin-top: 30px; }

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
        <form action="http://localhost/php/mypage.php?check_login=&sid=" method="POST">
          <p>ID : <input id="ID_input" name="id" type="text" placeholder="아이디를 입력하세요"></p>
          <p>PW : <input id="PW_input" name="pw" type="password" placeholder="비밀번호를 입력하세요"></p>
          <div>
            <input id="login" type="submit" value="로그인"/>
            <input id="signin" type="submit" value="회원가입" />
          </div>
          <h5>*아이디와 비밀번호를 정확히 입력했는지 다시한번 체크해주세요!</h5>
        </form>
      </div>
    </header>
  </body>
</html>
