<?php
	session_start();
	require dirname(__DIR__).'/lib/functions.php';
	echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
	 $con = mysql_connect("localhost","root","");
	 mysql_select_db("shopping_system", $con);
     mysql_query("SET NAMES UTF8");
	$user=$_SESSION["temp"][0];
	$goodsId = $_POST["goodsId"];
	$sql="DELETE FROM shoppingcart WHERE goodsid = '$goodsId' AND userid ='$user'";
	$result = mysql_query($sql);
	//刷新购物车
	$sql="SELECT * FROM shoppingcart WHERE userid = '$user'";
	$result = mysql_query($sql);
	echo '<ul class="cart-ul">';
	if(mysql_num_rows($result)>0)
	 {
	 	$sum=0;
	 	while($row = mysql_fetch_array($result))
	 	{
	 		$goodsid = $row["goodsid"];
	 		$sql1="SELECT * FROM goodsinfo WHERE goodsId ='$goodsid'";
			$result1 = mysql_query($sql1);
			if(mysql_num_rows($result1)){
				while($row1 = mysql_fetch_array($result1))
				{
					$tot_price = (int)$row1["price"]*$row["amount"];
					$sum+= $tot_price;
					echo'<li>
				        <form action="../php/cart-del.php"  method="post">
				        	<input id="goodsId" type="hidden" name="goodsId" value="'.$row["goodsid"].'">
					        <img src="../images/'.$row1["classId"].'/small'.'/'.$row1["imageId"].'.jpg" width="50" height="50">
					        <a class="cart-list-a" href="goods-detail.php?goodsId='.$row1["goodsId"].'">'.$row1["goodsName"].'</a>
					        <span class="cart-list cart-list-amount">x'.$row["amount"].'</span>
					        <span class="cart-list cart-list-price">'.$tot_price .'</span>
					        <button onclick="refreshCart()" class="btn-default btn-cart-del">删除</button>
				        </form>
		    		</li>';
				}

			}
			
	 	
	 	}

	 }
	 else{
	 	echo'<li>购物车暂无商品</li>';
	 	$sum=0;
	 }
	 echo'
			</ul>
				<div class="cart-sumer">
				    <span>合计<span>
				    <span id="total">'.$sum.'<span>
				</div>';
	
?>