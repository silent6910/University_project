<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="homework_login.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="button" name="btnHome" id="btnHome" value="回首頁" onclick="location.href='homework_index.php'" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>

<?php
 include("include_homework.php");
if(isset($_POST["btnOK"]))
  {
    if($_POST["txtUserName"]==""||$_POST['txtPassword']=="")
    {
      echo "帳號或密碼不得為空";
      exit();
    }
    $login=new databaseuse("localhost","qwerrtty","","test_for_homework");
  //  $login->connect();
    $row=$login->sql_fetch_array($login->sql_query("select Account from Account 
        where Account='{$_POST['txtUserName']}' 
        AND Password='{$_POST['txtPassword']}'"));
    if($row['Account']=='')
        {
          echo "帳號或密碼錯誤";
          exit();
        }
    $cookie=new AC_PW_cookie($_POST["txtUserName"],$_POST["txtUserName"]);
    if(isset($_COOKIE['lastPage']))
        {
          header($_COOKIE['lastPage']);
          setcookie("lastPage",$_COOKIE['lastPage'],time());
          exit();
        }
    header("location:homework_index.php");
    exit();

  }
?>

