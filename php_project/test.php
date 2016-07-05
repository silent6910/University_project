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


$test=mysql_query("select * from publish_data order by number desc");


while($r=mysql_fetch_assoc($test))
{
echo json_encode(array($r['number'],$r['Account'],$r['Apoint'],$r['Bpoint'],$r['departure_date'],$r['departure_time'],$r['food_plus_boolean'],$r['pet_plus_boolean'],
	$r['baggage_plus_boolean'],$r['smoke_plus_boolean'],$r['remark_plus']),JSON_UNESCAPED_UNICODE)."\n";

//echo $r[];
}

mysql_close();