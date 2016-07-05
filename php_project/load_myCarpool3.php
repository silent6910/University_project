<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");

mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
$number=(int)$_GET['number'];


$r=mysql_fetch_assoc(mysql_query("select * from publish_imformation where number=$number"));

/*
if($r['user1']!=null)
echo $r['user1']."\n";
else
echo "N"."\n";

if($r['user2']!=null)
echo $r['user2']."\n";
else
echo "N"."\n";

if($r['user3']!=null)
echo $r['user3']."\n";
else
echo 'N'."\n";

if($r['user4']!=null)
echo $r['user4']."\n";
else
echo 'N'."\n";

if($r['record']!=null)
echo $r['record']."\n";
else
echo 'N'."\n";*/



$array=array();


if($r['user1']!=null)
array_push($array, $r['user1']);
else
array_push($array, "N");

if($r['user2']!=null)
array_push($array, $r['user2']);
else
array_push($array, "N");

if($r['user3']!=null)
array_push($array, $r['user3']);
else
array_push($array, "N");

if($r['user4']!=null)
array_push($array, $r['user4']);
else
array_push($array, "N");

if($r['record']!=null)
array_push($array, $r['record']);
else
array_push($array, "N");

echo json_encode($array,JSON_UNESCAPED_UNICODE);




//echo json_encode(array($r['user1'],$r['user2'],$r['user3'],$r['user4'],$r['record']),JSON_UNESCAPED_UNICODE)."\n";

mysql_close();