<?php 
require dirname(__DIR__).'/lib/functions.php';
session_start();
echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
//获取用户名和商品名称
$user=$_SESSION["temp"][0];
$amount=$_POST["amount"];
$action=$_POST["action"];
$goodsid=$_POST["goodsid"];
$tot_price=$_POST["tot_price"];
if($action=="buy_now"){
	$con = get_db();
	//查询余额
	$sql="SELECT * FROM user WHERE id = '$user'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		$row=  mysql_fetch_array($result);
		$name = $row["name"];
		$address = $row["address"];
		$phone = $row["phone"];
		$balance = $row["accountBalance"];
	}
	else{
		echo "未找到余额";
	}
	//echo $balance ;
	//查询商品类型
	$sql="SELECT classId FROM goodsinfo WHERE goodsId = '$goodsid'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		$row=  mysql_fetch_array($result);
		$classId = $row["classId"];
		//echo $classId;
	}
	else{
		echo "未找到商品类型";
	}

	//判断是否买得起
	if(isset($balance)){

	   	if((int)$balance>=(int)$tot_price)
	   	{//如果余额足够则完成订单 


	   		//获取当前时间为订单号
	   		$orderid= (string)date("YmdHis");
	   		$orderDate = (string)date("Y-m-d");
	   		$userId =$user;
	   		
	   		//建立订单
	   		$sql="INSERT INTO `orderinfo`(`orderId`, `orderDate`, `userId`, `goodsid`, `classId`,`paystatus`, `receiverPhone`, `receiverAddress`, `receivername`,`amount`, `totalPrice`) VALUES('$orderid','$orderDate','$userId','$goodsid','$classId','已支付','$phone','$address','$name','$amount','$tot_price')";
	   		$result = mysql_query($sql);
	   		//echo $sql;
	   		
	   		//修改余额
	   		$amount =(int)$amount;
	   		$balance =(int)$balance-(int)$tot_price;
	   		$sql="UPDATE `user` SET accountBalance='$balance'WHERE id = '$user'";
	   		$result = mysql_query($sql);
	   		//修改商品库存和销量
	   		$sql="UPDATE `goodsinfo` SET amount=amount-$amount,count=count+$amount WHERE goodsId='$goodsid'";
	   		$result = mysql_query($sql);
	   		
	   		echo"<script>alert('订单添加成功!您的余额为".$balance."');
	   		window.location.href='../html/order-info.php'</script>";
	   	}
	   	else{
	   		$x=(int)$tot_price-(int)$balance;
	   		echo"<script>alert('商品所需价格为".$tot_price."您的余额仅剩".$balance.", 还差".$x."请先充值后购买');
	   		window.location.href='../html/account.php'</script>";

	   	}
	}
}
else if($action=="add_cart")
{
	$con = get_db();
	//判断是否已在购物车表中
	$sql="SELECT * FROM shoppingcart WHERE goodsid = '$goodsid'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		echo"<script>alert('购物车已有该商品');
		window.location.href='../html/goods-detail.php?goodsId=".$goodsid."'
		</script>";
	}	
	else{
		$sql="INSERT INTO `shoppingcart`(`goodsid`, `userid`, `amount`) VALUES('$goodsid','$user','$amount')";
		$result = mysql_query($sql);
		echo"<script>alert('添加成功');
		window.location.href='../html/goods-detail.php?goodsId=".$goodsid."'
		</script>";

	}

}

?>


