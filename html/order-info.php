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
			 		<li><a class="nav-a" href="account.php">账户设置</a></li>
			 		<li class="li-now"><a class="nav-a" href="order-info">订单情况</a></li>
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
                      echo'
                      <div id="main-content">
			          <div class="status">
				      <div class="status-box user-info">欢迎，<span>'.$row2["name"].'</span> </div>
				      <div class="status-box balance">账户余额￥<span>'.$row2["accountBalance"].'</span></div>
				      <div id="cart"  class=" status-box cart">购物车
				       ';
				       require  'cart-content.php';
				       echo'</div>
				      <div style="clear:both;"></div>
			          </div>';
			          $sql="SELECT * FROM goodsinfo,orderinfo where orderinfo.userId='$username'AND orderinfo.goodsid=goodsinfo.goodsId order by orderinfo.orderId DESC";
                      $result=mysql_query($sql);
                      //echo $sql;
                      if(mysql_num_rows($result)>0)
                      {
	                      while($row = mysql_fetch_array($result))
	                      {

							//	var_dump($row);
			              echo '<div class="order-info">
					      <div class="order-li">
						
							<table class="tb-default tb-order">
								<tr>
									<th>订单时间</th>
									<th>订单号</th>
									<th class="max-th">商品名称</th>
									<th>订单状态</th>
									<th>数量</th>
									<th>价格</th>
									<th>收货地址</th>
									<th>收件人</th>
								</tr>
						
								<tr>
									<td>'.$row["orderDate"].'</td>
									<td>'.$row["orderId"].'</td>
									<td class="max-th"><a href="goods-detail.php?goodsId='.$row["goodsid"].'">'.$row["goodsName"].'</a></td>
									<td>'.$row["paystatus"].'</td>
									<td class="num-td">'.$row["amount"].'</td>
									<td class="mon-td">'.$row["totalPrice"].'</td>
									<td>'.$row["receiverAddress"].'</td>
									<td>'.$row["receivername"].'</td>
								</tr>
							</table>
						
					        </div>';
					        }
				        }
				        else{
				        	echo'<div class="order-li">您暂时没有订单哦！快去商城看看吧</div>';
				        }
                     }
				
			echo '</div>';
			echo '</div>';
			?>
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