<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");

mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
$number=(int)$_GET['number'];

$r=mysql_fetch_assoc(mysql_query("select * from publish_data where number=$number"));

echo json_encode(array($r['lack'],$r['Account'],$r['Apoint'],$r['Bpoint'],$r['departure_date'],$r['departure_time'],$r['food_plus_boolean'],$r['pet_plus_boolean'],
	$r['baggage_plus_boolean'],$r['smoke_plus_boolean'],$r['remark_plus']),JSON_UNESCAPED_UNICODE)."\n";

mysql_close();