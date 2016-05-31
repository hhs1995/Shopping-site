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
               if($row['phone'] != ''&&$row['address'] != '' )
				echo"<script>window.location.href='../html/index.php'</script>
";
			   else 
			   echo"<script>alert('您的信息还不完善，请先完善个人信息');window.location.href='./html/index.php'</script>";
		}

	}
	if($jud==0)
	{
		jump_error('账号或密码错误！');
	}	
?>


