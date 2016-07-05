<?php
$link = @ mysql_connect("localhost","root","123456");
if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
 mysql_select_db("project_data");



mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query('SET NAMES UTF8;');
mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');



$str_register = "select Account from user_data where(Account='$_REQUEST[Account]')";

$res=mysql_query($str_register); 


$r = mysql_fetch_assoc($res);
if($r!=null)
{
	echo "NO";

}



else
{

 $str = "INSERT into user_data
	 (Account,Password) 
	 Values 
	('$_REQUEST[Account]','$_REQUEST[Password]')";
mysql_query($str,$link); 
echo "OK";
}



mysql_close();
