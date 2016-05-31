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
			 		<li class="li-now"><a class="nav-a" href="index.php">首页</a></li>
			 		<li><a class="nav-a" href="account.php">账户设置</a></li>
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
		<div id="main-content">
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
				      <div class="status-box balance">账户余额<span>'.$row2["accountBalance"].'</span></div>
				      <div id="cart" class=" status-box cart">购物车';
				  }
				   require  'cart-content.php';
				      ?></div>

				<div style="clear:both;"></div>
			</div>
			
			<div class="detail-content clearfix">
				
					<?php
                 
                 $username = $_SESSION["temp"][0];
                 $goodsId = $_GET['goodsId'];
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
                      $result = mysql_query("SELECT * FROM goodsinfo  where goodsId='$goodsId'");
                      if(mysql_num_rows($result)>0)
                      {
                        $row = mysql_fetch_array($result);

                      }
                      

                  }
                echo '<div class="img-area">
					<img src="../images/'.$row["classId"].'/big'.'/'.$row["imageId"].'.jpg" width="330">
				</div>
				<div class="introduce-area">';
                 
                 echo'
				
					<div class="dt-intro">
						'.$row["goodsName"].'
					</div>';

					echo '<div class="dt-price">
						<span class="sm">价格</span> <span id="tot_price" class="big">'.$row["price"].'</span>
					</div>
					<div class="dt-count">
						<span class="sm">销量</span> <span class="mid">'.$row["count"].'</span>
					</div>';
					
					echo ' <div class="dt-confirm">
						<form action="../php/purchase.php" method="post" />
							 <div class="amount-area">
								<span class="sm">数量</span>
								<button id="amount-del" class="btn-amount"><</button>
								<input id="amount" onkeyup="this.value=this.value.replace(/\D/g,{})" onafterpaste="this.value=this.value.replace(/\D/g,{})" type="text" name="amount" value="1">
								<button id="amount-add" class="btn-amount">></button> 
								<input type="hidden" name="goodsid"  value="'.$row["goodsId"].'">
								<input id="max_amount" type="hidden" value="'.$row["amount"].'">
								<input id="price"  type="hidden" value="'.$row["price"].'">
								<input id="price_box" name="tot_price"  type="hidden" value="'.$row["price"].'">
								<span class="sm le">库存</span>
								<span>'.$row["amount"].'</span>
								<span class="sm">件</span>
								<span id="atten" class="sm danger"></span>
						     </div>
							 <div class="submit-area">
								<button name="action" value="buy_now"  class="btn-default btn-buy">立即购买</button>
								<button name="action" value="add_cart"  class="btn-default btn-cart">加入购物车</button>
							</div>
						</form>
					</div>
	         		</div>
				';

					?>
					

			
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
			 amountChange();

		}
		//数量增减
		function amountChange(){
		   var del = document.getElementById("amount-del");
		   //alert(del);
		   var add = document.getElementById("amount-add");
		   var amount =document.getElementById("amount");
		   var max_amount = document.getElementById("max_amount");
		   var tot_price = document.getElementById("tot_price");
		   var price = document.getElementById("price");
		   var priceBox = document.getElementById("price_box");
		   amount.onkeyup=function(){
		   	  tot_price.innerHTML=parseInt(amount.value)*parseInt(price.value);
	            priceBox.value=parseInt(amount.value)*parseInt(price.value);
		   };
		   del.onclick=function(){
		   	 if(parseInt(amount.value)>1)
	            amount.value--;
	            tot_price.innerHTML=parseInt(amount.value)*parseInt(price.value);
	            priceBox.value=parseInt(amount.value)*parseInt(price.value);
	            return false;
		   }
		   add.onclick=function(){
		   	if(parseInt(amount.value)<parseInt(max_amount.value))
	            amount.value++;
	      	    tot_price.innerHTML=parseInt(amount.value)*parseInt(price.value);
	        	priceBox.value=parseInt(amount.value)*parseInt(price.value);
	           return false;
		   }
		   //判断所选商品数量是否超过库存
		   amount.onchange=function(){
		   	if(parseInt(amount.value)>parseInt(max_amount.value))
		   	{
		   		alert("所选商品超过库存量！");	 
		   		amount.value=max_amount.value;
		   	}
		   }
		   //判断所选商品是否紧张
		   if(parseInt(max_amount.value)<10)
		   {
		   	var	atten=document.getElementById("atten");
		   	atten.innerHTML="库存紧张！";
		   }

		 }
	</script>
	
</html>