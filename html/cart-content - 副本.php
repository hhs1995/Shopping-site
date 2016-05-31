<?php
	require dirname(__DIR__).'/lib/functions.php';
	
	$sql="SELECT * FROM shoppingcart";
	$result = mysql_query($sql);
	echo '
	<div id="cart-content">
	 <!--读取数据库中购物车表的数据-->
	 <ul class="cart-ul">';
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
				        	<input type="hidden" name="goodsId" value="'.$row["goodsid"].'">
					        <img src="../images/'.$row1["classId"].'/small'.'/'.$row1["imageId"].'.jpg" width="50" height="50">
					        <a class="cart-list-a" href="goods-detail.php?goodsId='.$row1["goodsId"].'">'.$row1["goodsName"].'</a>
					        <span class="cart-list cart-list-amount">x'.$row["amount"].'</span>
					        <span class="cart-list cart-list-price">'.$tot_price .'</span>
					        <button class="btn-default btn-cart-del">删除</button>
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
				</div>
			</div>';
	                 ?>