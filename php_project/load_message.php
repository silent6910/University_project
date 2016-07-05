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


$test=mysql_query("select * from message_detail WHERE (toB='$account') order by message_num desc");
while($r=mysql_fetch_assoc($test))
{
echo json_encode(array($r['fromA'],$r['message_content'],$r['message_num']),JSON_UNESCAPED_UNICODE)."\n";

//echo $r[];
}

mysql_close();