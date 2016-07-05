<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
if(!$link)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
$account=$_GET['Account'];


$res=mysql_fetch_assoc(mysql_query("select * from user_data where Account='$account'"));

if($res['number']==0)
echo "noCarpool";
else
echo $res['number'];

mysql_close();