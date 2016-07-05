<?php

mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");

$number=(int)$_GET['number'];
$account=$_GET['Account'];

$r=mysql_fetch_assoc(mysql_query("select * from publish_data where number=$number"));
$replace=explode('-',$r['departure_date']);
if(((int)$replace[0]-date("Y"))>0)
die("N");
if(((int)$replace[1]-date("m"))>0)
die("N");
if(((int)$replace[2]-date("d"))>0)
die("N");


$r=mysql_fetch_assoc(mysql_query("select * from publish_data where number=$number"));
$replace=explode(':',$r['departure_time']);


$true_hour=date("h");
if(date("A")=='PM')
$true_hour=date("h")+12;

if(((int)$replace[0]-$true_hour)>=2)
die("N");




$r=mysql_fetch_assoc(mysql_query("select * from user_data where Account='$account'"));
if(( (int)$replace[0]-$true_hour )==1)
{
   if( ( ((int)$replace[1]+60)-date("i") )>30)
	die("N");
	else
	{
   
   		if($r['m1']=='0')
			die("Y1");
   
	}
}
else
{
  if( ( ((int)$replace[1])-date("i") )>30)
   die("N");
  else 
   {
    if($r['m1']=='0')
			die("Y1");

   

  }
}
die("Y3");
mysql_close();
?>