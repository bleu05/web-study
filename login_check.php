<meta charset="UTF-8">
<!DOCTYPE html>
<html>
  <head>
    <title>로그인 작동 페이지/title>
  </head>
  <body>
    <?php
    session_start();

    $servername="localhost";
    $username="root"
    $password="alpha0995";
    $database="web_db";
    $con=mysqli_connect($servername, $username, $password, $database)
    or die("Mysql Connect Error!");

    $sel_query="SELECT * FROM member WHERE id LIKE '{$_POST['id']}';";
    $sel_result=mysqli_query($con,$sel_query) or die("Query Error!");
    $count=mysqli_num_rows($sel_result);

    if($count==0){
      echo "<script>location.href='register.html';</script>";
    }
    else {
      if($count['pw']==$_POST['pw']){
        $_SESSION['id']=$_POST['id'];
        header('Location:/index.php');
      }
      else{
        echo "<script>location.href='login.php';</script>";
      }
    }
    ?>
  </body>
</html>
