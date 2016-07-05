<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");

mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
$number=(int)$_GET['number'];

$r=mysql_fetch_assoc(mysql_query("select * from publish_latlng where number=$number"));

echo json_encode(array($r['lat_Apoint'],$r['lng_Apoint'],$r['lat_Bpoint'],$r['lng_Bpoint']),JSON_UNESCAPED_UNICODE);


mysql_close();