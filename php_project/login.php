<?php
$link = @ mysql_connect("localhost","root","123456");


mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query('SET NAMES UTF8;');
mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
mysql_select_db("project_data");
$account=$_GET['Account'];
$password=$_GET['Password'];


$str ="select * from user_data where Account='$account' AND Password='$password'";



if($res=mysql_fetch_assoc(mysql_query($str)))
	echo 'OK';
else
	echo 'NO';

mysql_close();