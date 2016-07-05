<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");

$account=$_GET['Account'];
$number=(int)$_GET['number'];


mysql_query("update user_data set number=0 where  (select user1 
	    from publish_imformation where  user1='$account' And  number=$number)");

mysql_query("update user_data set number=0 where Account='$account'");

mysql_query("delete from publish_imformation where user1='$account'");

mysql_query("update publish_imformation set user2='' , lack=lack+1 where user2='$account'");

mysql_query("update publish_imformation set user3='' , lack=lack+1 where user3='$account'");

mysql_query("update publish_imformation set user4='' , lack=lack+1 where user4='$account'");

mysql_query("update publish_data set lack=lack+1 where number=$number");

mysql_query("delete from publish_data where Account='$account'");

mysql_query("delete from publish_imformation where lack>=4");

mysql_query("update user_data set m1=0,m2=0 where Account='$account'");

mysql_close();