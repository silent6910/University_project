<?php
if(date("A")=='PM')
{
$true_time=date("h")+12;
echo  date("d-").$true_time.date("-i");}
else
echo date("d-h-i");