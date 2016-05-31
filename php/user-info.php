<?php 
require dirname(__DIR__).'/lib/functions.php';
  session_start();
   header("Content-type: text/html; charset=utf-8"); 
  $username = $_SESSION["temp"][0];
  $sex = $_POST["sex"];
  $name =$_POST["name"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  
                $con = get_db();
                mysql_query("UPDATE user SET sex = '$sex'                   WHERE   id = '$username' AND 'sex' != ''");
                mysql_query("UPDATE user SET name = '$name'                 WHERE   id = '$username' AND '$name' != ''");
                mysql_query("UPDATE user SET password = '$password'         WHERE   id = '$username' AND '$password' != ''");
                mysql_query("UPDATE user SET phone = '$phone'               WHERE   id = '$username' AND '$phone' != ''");
                mysql_query("UPDATE user SET email = '$email'               WHERE   id = '$username' AND '$email' != ''");
                mysql_query("UPDATE user SET address = '$address'           WHERE   id = '$username' AND '$address' != ''");
 
               jump_success('修改信息成功！','../html/account.php');
   
    ?> 