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
			 		<li><a class="nav-a" href="index.php">下架商品</a></li>
			 		<li class="li-now"><a class="nav-a" href="account.php">上架商品</a></li>
			 		<li><a class="nav-a" href="order-info.php">编辑商品</a></li>
			 	</ul>
			 	<div id="search-area">
			 		
			 	      <form action="../php/search.php" method='post'>
			 	      	<input placeholder="请输入想要搜索的商品" type="text" name="goods-name">
			 	      	<button class="btn-default btn-search">搜索</button>
				 	  </form>	
			 		
			 	</div>	
			</div>
		</div>
		
                      <div id="main-content">
			          <div class="status">
				      <div class="status-box user-info">欢迎，<span>管理员</span> </div>
				      <div style="clear:both;"></div>
			          </div>';


			
				<div class="info-change">
					<form action="../php/user-info.php" method="post">
						<h3>上架商品</h3>
						<div class="item">
							<span>请输入修改商品编号:</span><input type="text" name="goodsId" />
						</div>                                                                  <!--这个用和其他不一样的样式 -->
						<div class="item">
							<span>修改商品名称:</span><input type="text" name="goodsName" />
						</div>				
						<div class="item">
							<span>修改商品种类:</span><input type="text" name="classId" />
						</div>
						<div class="item">
							<span>修改图片名称:</span><input type="text" name="imageId" />
						</div>
                        <div class="item">
							<span>修改价格:</span><input type="text" name="price" />
						</div>
						<div class="item">
							<span>修改数量:</span><input type="text" name="amount" />
						</div>
						<div class="item">
							<span>修改商品描述:</span><input type="text" name="goodsIntroduce" />
						</div>
						<button class="btn-default btn-change">确认修改</button>
					</form>
				</div>
			</div>
			
		</div>
		<div id="footer">
			Design by   web 6 group
		</div>
	</body>
	<script src="../js/banner.js"></script>
</html>