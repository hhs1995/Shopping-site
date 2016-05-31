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

			<div class="result-info">
				<?php                
                 $username = $_SESSION["temp"][0];
                 $goodsname = $_POST["goods-name"];
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
			          <div class="goods-list">
					      <div class="nav-title">
						  搜索结果如下：
					      </div>';
                      $result=mysql_query("SELECT * from goodsinfo where goodsName LIKE '%$goodsname%' ");                      

                      if(mysql_num_rows($result)>0)
                      {
                      	echo "共有".mysql_num_rows($result)."条信息";
                      echo '<ul class="goods-ul">';
                      while($row1 = mysql_fetch_array($result))
                      {
                      	$classId=$row1['classId'];
                      	$goodsId=$row1['goodsId'];
                        $imageId = $row1['imageId'];
                        $price = $row1['price'];
                        $goodsName = $row1['goodsName'];
                      	echo '<li><a href="goods-detail.php?goodsId='.$goodsId.'"><img src="../images/'.$classId.'/small/'.$imageId.'.jpg" width="220" height="220"></a><div class="good-price">'.'￥'.$price.'</div><div class="good-introduce">'.$goodsName.'</div></li>';
                        
                      }
                      	
                      echo "</ul>";
                     }
                     else echo"非常抱歉，没有找到符合描述的物品！";

                  }
                
				?>
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