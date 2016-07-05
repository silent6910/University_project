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
if($_REQUEST[Apoint]==null)
die("shit");

if($serch_repeat=mysql_fetch_assoc(mysql_query("SELECT * from publish_data where Account='$_REQUEST[Account]'")))
echo "repeat";

else
{
$max_number =mysql_query("SELECT MAX(number)as number from max_number");
$abc=mysql_fetch_assoc($max_number);

mysql_query("update  max_number set number=number+1 where number=$abc[number];");

mysql_query("update user_data set number=$abc[number]+1 where Account=$_REQUEST[Account]");

$str_publish = "INSERT into publish_data(number,lack,Account,
		Apoint,Bpoint,departure_date,
		departure_time,food_plus_boolean,
		pet_plus_boolean,baggage_plus_boolean,smoke_plus_boolean,remark_plus)
		Values($abc[number]+1,3,'$_REQUEST[Account]','$_REQUEST[Apoint]','$_REQUEST[Bpoint]',
		'$_REQUEST[departure_date]','$_REQUEST[departure_time]',
		'$_REQUEST[food_plus_boolean]','$_REQUEST[pet_plus_boolean]',
		'$_REQUEST[baggage_plus_boolean]','$_REQUEST[smoke_plus_boolean]','$_REQUEST[remark_plus]')";

mysql_query($str_publish);

$publish_imformation="Insert into publish_imformation(number,user1,lack)
			Values($abc[number]+1,'$_REQUEST[Account]',3)";

mysql_query($publish_imformation);

$publish_latlng="insert into publish_latlng 
(number,lat_Apoint,lng_Apoint,lat_Bpoint,lng_Bpoint)
Values($abc[number]+1,'$_REQUEST[lat_Apoint]',
'$_REQUEST[lng_Apoint]',
'$_REQUEST[lat_Bpoint]',
'$_REQUEST[lng_Bpoint]')";

mysql_query($publish_latlng);


mysql_query("update user_data set number=$abc[number]+1 where Account='$_REQUEST[Account]'");
}
mysql_close();
?>