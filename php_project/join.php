<?php
mb_internal_encoding("UTF-8");
$link = @ mysql_connect("localhost","root","123456");
mysql_select_db("project_data");
mysql_query("SET CHARACTER SET 'UTF8';");
mysql_query("SET NAMES 'UTF8';");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");

$number=(int)$_GET['number'];
$account='\''.$_GET['Account'].'\'';
$lack=(int)$_GET['lack']-1;


if($serch_repeat=mysql_fetch_assoc(mysql_query("select * from publish_imformation 
where user1=$account OR user2=$account
OR user3=$account OR user4=$account")))
echo "repeat";

else
{
$serch_user=mysql_fetch_assoc(mysql_query("select * from publish_imformation where number=$number"));



if($serch_user['user1']==null)
{
mysql_query("update publish_imformation 
set user1=$account,lack=$lack
 where number=$number");
mysql_query("update publish_data set lack=$lack where number=$number");
}
else if($serch_user['user2']==null)
{

mysql_query("update publish_imformation 
set user2=$account,lack=$lack
 where number=$number");
mysql_query("update publish_data set lack=$lack where number=$number");

}
else if($serch_user['user3']==null)
{
mysql_query("update publish_imformation 
set user3=$account,lack=$lack
 where number=$number");
mysql_query("update publish_data set lack=$lack where number=$number");

}
else if($serch_user['user4']==null)
{
mysql_query("update publish_imformation 
set user4=$account,lack=$lack
 where number=$number");
mysql_query("update publish_data set lack=$lack where number=$number");

}
mysql_query("update user_data set number=$number where Account=$account");
$account2=$_GET['Account'];
$date=date("m-d-h:i:a");
$line="\n";
$string=$date.":$account2"." ¥[¤J¦@­¼".$line;
mysql_query("insert into publish_imformation (record)Values ('$string')where number=$number");
}
mysql_close();