<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
</html>


<?php
class databaseuse
{
    private $connect;
    private $url,
            $account,
            $password,
            $database;
    function __construct($url,$account,$password,$database)
    {
        $connect=mysqli_connect($url,$account,$password,$database);
            $this->connect=$connect;
        $this->url=$url;
        $this->account=$account;
        $this->password=$password;
        $this->database=$database;
    }
    function get_database_url()
    {
        return $this->url;
    }
    function get_database_account()
    {
        return $this->account;
    }
    function get_database_password()
    {
        return $this->password;
    }
    function get_database_database()
    {
        return $this->database;
    }
    function connect()
    {
        if(!$this->connect)
            die("連不上資料庫");
        else
            echo "OK";
    }
    function sql_query($query)
    {
        return mysqli_query($this->connect,$query);
    }
    function sql_fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }
    function databaseclose()
    {
        if(mysqli_close($this->connect));
    }
}
class AC_PW_cookie
{
    function AC_PW_cookie($Account,$Password)
    {
        setcookie("Account",$Account);
        setcookie("Password",$Password);
    }
    function cleancookie()
    {
        setcookie("Account","",time());
        setcookie("Password","",time());
    }
}
   /* $test=new databaseuse("localhost","qwerrtty","","test_for_homework");
    $test->connect();
    $cookie=new AC_PW_cookie("asd","aaa");
    $cookie->cleancookie();*/
   /* $row=$test->sql_fetch_array($test->sql_query("select Account from Account 
        where Account='{$_POST['txtUserName']}' 
        AND Password='{$_POST['txtPassword']}'"))*/

?>