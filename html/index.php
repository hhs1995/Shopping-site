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
			<div class="banner">
					<div class="b-img">
					  	<a href="javascript:void(0)" style="background:url(../images/banner1.jpg) center no-repeat;"></a>
					  	<a href="javascript:void(0)" style="background:url(../images/banner2.jpg) center no-repeat;"></a>
					  	<a href="javascript:void(0)" style="background:url(../images/banner1.jpg) center no-repeat;"></a>
					 </div>
					 <div class="b-list-bg"></div>
					 <div class="b-list"></div>
					 <a class="bar-left" href="javascript:void(0)"><em></em></a>
					 <a class="bar-right" href="javascript:void(0)"><em></em></a>
			</div>	
			<div class="goods-list">
				<div class="nav-title">
					可能喜欢的商品
				</div>
				<!--这里动态读取最常购买类型商品中热度最高-->
				<ul class="goods-ul">
					<li><a href="#"><img src="../images/goods1.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods2.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods3.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods4.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods1.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods2.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods3.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
					<li><a href=""><img src="../images/goods4.jpg" width="220" height="220"></a><div class="good-price">￥344.55</div><div class="good-introduce">【新百伦】New Balance/NB 574系列 女鞋 复古鞋跑步鞋运动休闲鞋WL574SPA</div></li>
				</ul>
			</div>
		</div>
		<div id="footer">
			Design by   web 6 group
		</div>
	</body>
	<script src="../js/banner.js"></script>
</html>