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

      #contents p { font-size: 12px;}

      #contents form { font-size: 12px; }

      #student_num {width: 300px; height: 25px; font-size: 12px;}

      #ID_input {  width: 400px; height:25px; font-size: 12px;}

      #PW_input {  width: 400px; height: 25px; font-size: 12px; }

      #signin { width: 80px; height: 30px; font-size: 12px; margin-top: 15px; margin-bottom: 50px;}

      #birth { width: 300px; height: 25px; }

      #realname {width: 300px; height: 25px;}

      #nickname {width: 300px; height: 25px;}

      #account {width: 200px; height: 25px; }

      #bank { width: 150px; height: 25px; }

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
        <h4>회원가입</h4>
      </div>

      <div id="division_line1"/>

      <div id="contents">
        <h5>
          * 성균관대학교 학생을 위한 중고장터 사이트 "사고팔고"에 오신것을 환영합니다!</br>
            * 올바른 장터 및 커뮤니티 이용을 위해 아래의 양식에 빠짐없이 정보를 입력해주세요!</br>
            * 회원가입 이후, 중고장터의 여러 서비스를 이용하실 수 있습니다.
        </h5>


        <form action="http://localhost/php/signin_process.php" method="POST">
          <p>
            학번: <input id="student_num" type="text" name="sid" placeholder="학번을 입력하세요"/>
          <p>
            ID : <input id="ID_input" type="text" name="uid" placeholder="아이디를 입력하세요"/>
          </p>
          <p>PW : <input id="PW_input" type="password" name="pwd" placeholder="비밀번호를 입력하세요"></p>
          <p>
            회원 구분: <input name="status" type="radio" value="학부생" checked=""/>학부생
            <input name="status" type="radio" value="대학원/박사과정"/>대학원/박사과정
            <input name="status" type="radio" value="기타"/>기타(교직원)
          </p>
          <p>생년월일 : <input id="birth" type="date" name="birth"/></p>
          <p>닉네임 : <input id="nickname" type="text" name="nickname"/></p>
          <p>실명 : <input id="realname" type="text" name="realname"/></p>
          <p>
            계좌번호: <input id="account" type="text" name="account"/>
            은행 : <input id="bank" type="text" name="bank"/></br>
            * 계좌번호는 중고품 구매 및 판매 진행 시 회원의 금융정보를 열람하기 위해 사용됩니다
          </p>
          <p>
            <input type="checkbox" name="checked"/>
            회원가입 주체인 가입자는 상기 내용에 오류가 없음을 확인하였습니다.
          </p>
          <input id="signin" type="submit" value="회원가입"/>
        </form>
      </div>
    </header>
  </body>
</html>
