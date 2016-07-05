<?php

mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");

$account=$_GET['Account'];

$m1=(int)$_GET['m1'];


mysql_query("update user_data set m1=$m1 where Account='$account'");

mysql_close();