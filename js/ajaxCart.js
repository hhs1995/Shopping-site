function creatXHR(){
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  return new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  return new ActiveXObject("Microsoft.XMLHTTP");
				  }
			};
function refreshCart()
			{
				var goodsId = document.getElementById("goodsId").value;
				var xmlhttp = creatXHR();
				xmlhttp.onreadystatechange=function(){
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    	document.getElementById("cart-content").innerHTML=xmlhttp.responseText;
				    }
				  }
				xmlhttp.open("POST","../php/cart-del.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("goodsId="+goodsId);
				alert("删除成功!");
			}				