<?php

mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
$number=(int)$_GET['number'];
$res=mysql_query("select * from user_data where number=$number");
$array=array();
while($r=mysql_fetch_assoc($res))
{
  array_push($array,$r['Account']);
  array_push($array,$r['m1']);
}
echo json_encode($array,JSON_UNESCAPED_UNICODE);

mysql_close();