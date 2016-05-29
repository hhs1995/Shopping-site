<!Doctype html>
	<head>
		<meta charset="utf-8">
		<title>E-shop</title>
		<link href="../css/index.css"  type="text/css" rel="stylesheet"/>
		<script src="../js/jquery.min.js"></script>
		
	</head>
	<body>
		<div id="nav">
			<div id="nav-bar">
			 	<img src="../images/logo-nav.png">
			 	<ul class="nav-ul">
			 		<li class="li-now"><a class="nav-a" href="#">首页</a></li>
			 		<li><a class="nav-a" href="#">账户设置</a></li>
			 		<li><a class="nav-a" href="#">订单情况</a></li>
			 	</ul>
			 	<div id="search-area">
			 		
			 	      <form action="">
			 	      	<input placeholder="请输入想要搜索的商品" type="text" name="goods-name">
			 	      	<button class="btn-default btn-search">搜索</button>
				 	  </form>	
			 		
			 	</div>	
			</div>
		</div>
		<div id="main-content">
			<div class="status">
				<div class="status-box user-info">欢迎，<span>es0001</span> </div>
				<div class="status-box balance">账户余额<span>￥20,000</span></div>
				<div class=" status-box cart">购物车</div>
				<div style="clear:both;"></div>
			</div>
			
			<div class="detail-content clearfix">
				<div class="img-area">
					<img src="../images/goods2.jpg" width="330">
				</div>
				<div class="introduce-area">
					<div class="dt-intro">
						【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA
						【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA
					</div>
					<div class="dt-price">
						<span class="sm">价格</span> <span class="big">139.34</span>
					</div>
					<div class="dt-count">
						<span class="sm">销量</span> <span class="mid">2000</span>
					</div>
					
					<div class="dt-confirm">
						<form action="#">
							 <div class="amount-area">
								<span class="sm">数量</span>
								<button id="amount-del" class="btn-amount"><</button>
								<input id="amount" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text" name="amount" value="1">
								<button id="amount-add" class="btn-amount">></button> 
								<input id="max_amount" type="hidden" value="5">
								<span class="sm le">库存</span>
								<span>5</span>
								<span id="atten" class="sm danger"></span>
						     </div>
							 <div class="submit-area">
								<button class="btn-default btn-buy">立即购买</button>
								<button class="btn-default btn-cart">加入购物车</button>
							</div>
						</form>
					</div>
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
			 amountChange();

		}
		//数量增减
		function amountChange(){
		   var del = document.getElementById("amount-del");
		   //alert(del);
		   var add = document.getElementById("amount-add");
		   var amount =document.getElementById("amount");
		   var max_amount =document.getElementById("max_amount");
		   del.onclick=function(){
		   	 if(parseInt(amount.value)>1)
	            amount.value--;
	            return false;
		   }
		   add.onclick=function(){
		   	if(parseInt(amount.value)<parseInt(max_amount.value))
	           amount.value++;
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