<?php
include("include_homework.php");
if(isset($_POST['send']))
    {
     $register=new databaseuse("localhost","qwerrtty","","project");
        //$register->connect();
      /*  $row=$register->sql_fetch_array(
        $register->sql_query(
        "select Account from Account 
        where Account='{$_POST['Account']}'"));
        if($row['Account'])
        {
            echo "帳號已有人註冊";
            exit();
        } */
        $register->sql_query("set names utf8");
        $register->sql_query("INSERT INTO `User_data`
        (`Account`, `Gender`, `Nickname`, `E-mail`)
        Values(
        '{$_POST['Account']}',
        '{$_POST['gender']}',
        '{$_POST['nickname']}',
        '{$_POST['e-mail']}')");
        
        $register->databaseclose();
}






?>