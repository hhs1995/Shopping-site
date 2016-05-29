<?php 
require dirname(__DIR__).'/lib/functions.php';
session_start();
$name = $_POST["username"];
$name = trim($name);
$_SESSION["temp"][0]=$name;
$pwd = $_POST["password"];
$pwd = trim($pwd);
$jud=0;
echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
$con = get_db();
$result = mysql_query("SELECT * FROM user");
if(mysql_num_rows($result)>0)
while($row = mysql_fetch_array($result))
	{
		if($row['id'] === $name && $row['password'] === $pwd)
		{

				jump_success("登录成功", '../html/index.php');

		}

	}
	if($jud==0)
	{
		jump_error('账号或密码错误！');
	}	
?>


