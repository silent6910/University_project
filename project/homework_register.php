<form action='homework_register.php' method=post> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Lab - index</title>
</head>
<input type="hidden" name="decide" value="<?php echo rand(1,10000) ?>" >
帳號:
<input type="text" name="Account" > <br>
密碼:
<input type="password" name="password"> <br>
再次輸入密碼:
<input type="password" name="password2"> <br>
暱稱:
<input type="text" name="nickname"> <br>

<!--<input type="button" value="註冊"
onclick="location.href='register or login.php'"> -->
<input type="submit" value="註冊" name="btnOK" id="btnOK" >
<input type="button" name="btnHome" id="btnHome" value="回首頁" onclick="location.href='homework_index.php'" />
<?php
session_start();
include("include_homework.php");
    if ($_SESSION['decide']!=$_POST['decide']) { 
        $_SESSION['decide']=$_POST['decide'];
    if(isset($_POST['btnOK']))
    {
      //  $_POST['btnOK']='';
        if($_POST['Account']=='')
        {
            echo "帳號不得為空";
            exit();
        }
        if($_POST['password']=='')
        {
            echo "密碼不得為空";
            exit();
        }
        if($_POST['password']!=$_POST['password2'])
        {
            echo "兩次密碼不一，請重新輸入";
            exit();
        }
        
        $register=new databaseuse("localhost","qwerrtty","","test_for_homework");
        //$register->connect();
        $row=$register->sql_fetch_array(
        $register->sql_query(
        "select Account from Account 
        where Account='{$_POST['Account']}'"));
        if($row['Account'])
        {
            echo "帳號已有人註冊";
            exit();
        }
        $register->sql_query("INSERT INTO Account Values(
        '{$_POST['Account']}',
        '{$_POST['password']}',
        '{$_POST['nickname']}')");
        $register->databaseclose();
        $cookie=new AC_PW_cookie($_POST['Account'],$_POST['password']);
        header("location:homework_index_for_secret.php");
        /*
        $connect=mysqli_connect("localhost","qwerrtty","","test_for_homework");
        if(!$connect)
            die("連不上資料庫");
            
        $row=mysqli_fetch_array(mysqli_query($connect,"
        select Account from Account 
        where Account='{$_POST['Account']}'"));
        
        if($row['Account'])
        {
            echo "帳號已有人註冊";
            exit();
        }
        mysqli_query($connect,
        "INSERT INTO Account Values(
        '{$_POST['Account']}',
        '{$_POST['password']}',
        '{$_POST['nickname']}')");
        
        mysqli_close($connect);
        setcookie("Account",$_POST['Account']);
        setcookie("Password",$_POST['password']);
        header("location:homework_index_for_secret.php");
        exit();*/
    }
    }
?>
</html>
</form>
