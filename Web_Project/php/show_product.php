<?php
  $logined = $_GET['check_login'];
  $check_sid = $_GET['sid'];
  $stuffid = $_GET['pid'];
  $buy = $_GET['buy'];

  if($buy == 'true') {
    echo "<script>alert('해당 상품의 구매가 완료되었습니다. 내 정보에서 확인하실 수 있습니다.');</script>";
  }

  $conn = mysqli_connect("localhost", "root", 990228);
  mysqli_select_db($conn, "dbproject");

  if(empty($logined)) {
    header("Location: http://localhost/php/error.php?name=err4");
  } else {
    $sql = "SELECT * FROM product p, data d WHERE p.product_id = d.product_id AND p.product_id = $stuffid;";
  }

  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
      function check() {
        var check = confirm('상품 구매신청을 할 시, 이용자의 정보가 판매자에게 전송되고 판매자가 거래확정 처리를 할 때 까지 대기상태로 표기됩니다. 구매하시겠습니까?');

        if(check) return true;
        else return false;
      }
    </script>


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

      #text_val {
        margin: 0 auto;
        text-align: center;
      }

      #text_val .hed {
        padding-top: 3px;
        list-style-type: none;
        font-size: 15px;
        height: 32px;
        background: #999999;
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

      #ctx_hed {
        height: 250px;
        text-align: center;
      }

      #ctx {
        height: 250px;
        text-align: center;
      }

      #text_val .divider {
        font-size: 12px;
        background-color: #dddddd;
        list-style:none;
      }

      #text_val .writer {
        font-size: 12px;
        width: 250px;
        float: left;
        list-style: none;
        text-align: left;
        padding: 5px;
        background-color: #aabbcc;
      }

      #text_val .timestamp {
        font-size: 12px;
        width: 450px;
        text-align: right;
        float: left;
        list-style: none;
        padding: 5px;
        background-color: #aabbcc;
      }

      #text_val .comment_value {
        font-size: 12px;
        padding:10px;
        width: 700px;
        list-style: none;
        text-align: left;
        float: left;
        background-color: #ffffff;
        margin-bottom: 10px;
      }

      #input_comments {
        margin-top: 10px;
        margin-bottom: 50px;
      }

      #input_comments .tinput {
        margin-top: 20px;
        margin-right: 15px;
        width: 450px;
        height: 25px;
      }

      #input_comments .button {
        width: 100px;
        height: 30px;
      }

      #buy_btn {
        width: 150px;
        height: 40px;
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

      <div id="division_line1"></div>

      <div id="contents">
        <?php
          if(!$result) {
            echo "<h4>검색 결과가 없습니다!</h4>";

          } else {
            $row = mysqli_fetch_array($result);

            $data_sql = "SELECT * FROM data WHERE data.product_id="."'".$row['product_id']."';";
            $user_sql = "SELECT nickname, account_no, bank_name FROM USER WHERE user.student_id="."'".$row['seller_student_id']."';";
            $comments_sql = "SELECT * FROM comments WHERE comments.product_id=".$row['product_id'].";";

            $result_dt = mysqli_query($conn, $data_sql);
            $result_usr = mysqli_query($conn, $user_sql);
            $result_comments = mysqli_query($conn, $comments_sql);

            if(!$result_dt || !$result_usr) {

            } else {
              $row_dt = mysqli_fetch_array($result_dt);
              $row_usr = mysqli_fetch_array($result_usr);

              echo "<div id='text_val'><ul><li class='hed'>".$row['product_id']." 번째 판매 게시글</li></ul>";
              echo "<ul><li class='info'>판매 상품 이름</li><li class='value'>".$row['product_title']."</li></ul>";
              echo "<ul><li class='info'>판매자 닉네임</li><li class='value'>".$row_usr['nickname']."</li></ul>";
              echo "<ul><li class='info'>제품 상태</li><li class='value'>".$row_dt['product_instance_status']."</li></ul>";
              echo "<ul><li class='info'>판매 가격</li><li class='value'>".$row_dt['price']."</li></ul>";
              echo "<ul><li class='info'>거래 장소</li><li class='value'>".$row_dt['location']."</li></ul>";
              echo "<ul><li class='info' id='ctx_hed'>게시글</li><li class='value' id='ctx'>".$row['product_explanation']."</li></ul>";

              if(empty($row_usr['account_no'])) {
                echo "<ul><li class='info' id='ctx_hed'>계좌번호</li><li class='value' id='ctx'>계좌정보 없음</li></ul>";
                echo "<ul><li class='info' id='ctx_hed'>은행 명</li><li class='value' id='ctx'>계좌정보 없음</li></ul>";
              } else {
                echo "<ul><li class='info'>계좌번호</li><li class='value'>".$row_usr['account_no']."</li></ul>";
                echo "<ul><li class='info'>은행 명</li><li class='value'>".$row_usr['bank_name']."</li></ul>";
              }

              echo "<ul><li class='info'>업로드 시간</li><li class='value'>".$row_dt['upload_time']."</li></ul>";

              echo "<ul><li class='divider'><h6>&nbsp; </h6>- 댓글 -</li></ul>";

              if(!$result_comments) {
                echo "댓글이 없어요~ 댓글을 작성해 주세요!";

              } else {
                while($row_comments = mysqli_fetch_array($result_comments)) {
                  echo "<ul><li class='writer'>".$row_comments['comment_writer_nickname']."</li><li class='timestamp'>".$row_comments['write_timestamp']."</li></ul>";
                  echo "<ul><li class='comment_value'>".$row_comments['comment_value']."</li></ul>";
                }
              }

              echo "<p>&nbsp;</p>";
              echo "<form id='input_comments' action='http://localhost/php/comment_process.php' method='POST'>";
              echo "<input class='tinput' name='comment' type='text'></input>";
              echo "<input type='hidden' name='logined' value='$logined'/>";
              echo "<input type='hidden' name='check_sid' value='$check_sid'/>";
              echo "<input type='hidden' name='pid' value='".$row['product_id']."'/>";
              echo "<input class='button' type='submit' value='댓글 작성'></input>";
              echo "</form>";

              if(empty($row['buyer_student_id'])) {
                echo "<form name=buy_submit' onsubmit='return check()' action='http://localhost/php/check_buy.php' method='POST'>
                  <input type='hidden' name='logined' value='$logined'/>
                  <input type='hidden' name='check_sid' value='$check_sid'/>
                  <input type='hidden' name='pid' value='".$row['product_id']."'/>
                  <input id='buy_btn' type='submit' value='상품 구매하기'/></form>";

              } else {
                echo "<h4>거래가 완료된 상품입니다.</h4>";
              }

              echo "<ul><li class='divider'><h6>&nbsp; </h6></li></ul>";
              echo "</div>";
            }
          }
        ?>
      </div>
    </header>
  </body>
</html>
