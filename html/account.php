<!Doctype html>

	<head>
		<meta charset="utf-8">
		<title>E-shop</title>
		<link href="../css/index.css"  type="text/css" rel="stylesheet"/>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/ajaxCart.js"></script>		
	</head>
	<body>
		<div id="nav">
			<div id="nav-bar">
			 	<img src="../images/logo-nav.png">
			 	<ul class="nav-ul">
			 		<li><a class="nav-a" href="index.php">首页</a></li>
			 		<li class="li-now"><a class="nav-a" href="account.php">账户设置</a></li>
			 		<li><a class="nav-a" href="order-info.php">订单情况</a></li>
			 	</ul>
			 	<div id="search-area">
			 		
			 	      <form action="../html/search.php" method='post'>
			 	      	<input placeholder="请输入想要搜索的商品" type="text" name="goods-name">
			 	      	<button class="btn-default btn-search">搜索</button>
				 	  </form>	
			 		
			 	</div>	
			</div>
		</div>
		 <?php 
		         session_start();
                 $username = $_SESSION["temp"][0];
                 header("Content-type: text/html; charset:utf-8");                 
                   $con = mysql_connect("localhost","root","");
                   if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {

            
                      mysql_select_db("shopping_system", $con);
                      mysql_query("SET NAMES UTF8");
                      $result2 = mysql_query("SELECT * FROM user where id = '$username'");
                      if(mysql_num_rows($result2)>0)
                      {
                        $row2 = mysql_fetch_array($result2);

                      }
                      echo '
                      <div id="main-content">
			          <div class="status">
				      <div class="status-box user-info">欢迎，<span>'.$row2["name"].'</span> </div>
				      <div class="status-box balance">账户余额￥<span>'.$row2["accountBalance"].'</span></div>
				      <div  id="cart" class=" status-box cart">购物车
				       ';
				       require  'cart-content.php';
				       echo'</div>
				      <div style="clear:both;"></div>
			          </div>';
			          }
        ?>

			<div class="person-info">

				<div class="info-now">
					<!--读取当前账户信息-->

					<h3>当前个人信息</h3>
					<table class="tb-default tb-info" border="1">
						<tr><th>性别</th><th>姓名</th><th>密码</th><th>手机</th><th>邮箱</th><th>地址</th></tr>
						<tr><td><?php echo $row2["sex"]; ?></td>
							<td><?php echo $row2["name"]; ?></td>
							<td><?php echo $row2["password"]; ?></td>
							<td><?php echo $row2["phone"]; ?></td>
							<td><?php echo $row2["email"]; ?></td>
							<td><?php echo $row2["address"]; ?></td></tr>
					</table>
					
				</div>
				<div class="info-change">
					<form action="../php/user-info.php" method="post">
						<h3>改变个人信息</h3>
						<div class="item">
							<span>性别:</span><input type="text" name="sex" />
						</div>
						<div class="item">
							<span>姓名:</span><input type="text" name="name" />
						</div>				
						<div class="item">
							<span>密码:</span><input type="text" name="password" />
						</div>
						<div class="item">
							<span>手机:</span><input type="text" name="phone" />
						</div>
                        <div class="item">
							<span>邮箱:</span><input type="text" name="email" />
						</div>
						<div class="item">
							<span>地址:</span><input type="text" name="address" />
						</div>
						<button class="btn-default btn-change">修改</button>
					</form>
				</div>
			</div>
			
		</div>
		<div id="footer">
			Design by   web 6 group
		</div>
	</body>
	<script src="../js/banner.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			var cart = document.getElementById("cart");
			var cartCon = document.getElementById("cart-content");
			cart.onclick=cartConShow;
			function cartConShow(){
					if(cartCon.style.display == "block")				
					cartCon.style.display = "none";	
					else		
					cartCon.style.display ="block";
			}

			
		}
		
	</script>;
</html>