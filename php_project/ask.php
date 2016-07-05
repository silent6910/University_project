<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");

$max_number =mysql_query("SELECT MAX(number)as number from message_number");
$abc=mysql_fetch_assoc($max_number);
$number=$abc['number']+1;
//select * from publish_data WHERE Account='d0191410' order by number desc

mysql_query("insert into message_number(number)values($number)");
mysql_query("Insert into message_detail(message_num,fromA,toB,message_content)
Values($number,
'$_REQUEST[fromA]',
'$_REQUEST[toB]',
'$_REQUEST[message]')");

mysql_close();