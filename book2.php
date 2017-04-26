<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品介绍</title>
<link type="text/css" rel="stylesheet" href="style/reset.css">
<link type="text/css" rel="stylesheet" href="style/main.css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>
<style type="text/css">
	.description_imgs .big{height:280px; text-align:center;padding-top:30px;}
</style>

<body class="grey">
<div class="hr_15"></div>
<div class="userPosition comWidth">
	<strong><a href="default.html">首页</a></strong>
	<span>&nbsp;&gt;&nbsp;</span>
	<em>商品详情</em>
</div>

<?php
  header("Content-type:text/html;charset=utf-8");
  $bookid=$_GET["param"];
	/*
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=bookinline","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		$pdo->query("set names utf8");
		$sql = "select * from shop_product where id="+$bookid;
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($_GET['param']));
		echo $stmt;
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	*/
	$conn=@mysql_connect("localhost","root","")or die("connect fail");

	mysql_select_db("bookinline") or die("connect fail".mysql_error());
	
	if($conn)
	{
	
	 	$result= mysql_query("select * from shop_product where id="."'"."$bookid"."'",$conn);	 
	 	$data=mysql_fetch_array($result);
	 	
	}
?> 
	<div class="description_info comWidth">
		<div class="description clearfix">
			<div class="leftArea">
				<div class="description_imgs">
					<div class="big">
						<img src="<?php echo $data['cover'] ?>" alt="">
					</div>
				</div>
			</div>
			<div class="rightArea">
				<div class="des_content">
					<h3 class="des_content_tit"><?php echo $data['title'] ?></h3>
					<div class="dl clearfix">
						<div class="dt">价格</div>
						<div class="dd clearfix"><span class="des_money"><em>￥</em><?php echo $data['price'] ?>元</span></div>
					</div>
					<div class="dl clearfix">
						<div class="dt">优惠</div>
						<div class="dd clearfix"><span class="hg"><i class="hg_icon">满换购</i><em>购满5本送精美礼品，优惠多多</em></span></div>
					</div>
					<div class="des_position">
						<div class="dl">
							<div class="dt des_num">数量</div>
							<div class="dd clearfix">
								<div class="des_input">
									<input type="text" id="number" value="1">
								</div>
							</div>
						</div>
					</div>
					<div class="hr_15"></div>
					<div class="fl">
						<a href="javascript:addCart(<?php echo $data['id'] ?>)" class="shopping_btn"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
		<div class="recommend">
			<h3 class="tit">还浏览过</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/book7.jpg" alt=""></a>
					</div>
					<p><a href="#">世界很大，幸好有你</a></p>
					<p class="money">￥30</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/book11.jpg" alt=""></a>
					</div>
					<p><a href="#">完美胎教枕边书</a></p>
					<p class="money">￥70</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/book1.jpg" alt=""></a>
					</div>
					<p><a href="#">三生三世十里桃花</a></p>
					<p class="money">￥30</p>
				</div>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li><span>产品介绍</span></li>
				<li class="active"><span>产品评价</span></li>
			</ul>
		</div>
		<div class="hr_15"></div>
		<div class="des_infoContent">
			<h3 class="shopDes_tit">商品评价</h3>
			<div class="score_box clearfix">
				<div class="score">
					<span>4.7</span><em>分</em>
				</div>
				<div class="score_speed">
					<ul class="score_speed_text">
						<li class="speed_01">非常不满意</li>
						<li class="speed_02">不满意</li>
						<li class="speed_03">一般</li>
						<li class="speed_04">满意</li>
						<li>非常满意</li>
					</ul>
					<div class="score_num">
						4.7<i></i>
					</div>
					<p>共18939位eBuy会员参与评分</p>
				</div>
			</div>
			<div class="review_tab">
				<ul class="review fl">
					<li><a href="#" class="active">全部</a></li>
					<li><a href="#">满意</a></li>
					<li><a href="#">一般</a></li>
					<li><a href="#">不满意</a></li>
				</ul>
				<div class="review_sort fr">
					<a href="#" class="review_time">时间排序</a><a href="#" class="review_reco">推荐排序</a>
				</div>
			</div>
			<div class="review_listBox">
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>不错，好看</p>
						<p><a href="#" class="ding">顶(0)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userhead.jpg" alt="">
							<p>73***07</p>
							<p>钻石会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>值得一看！力推！！！</p>
						<p><a href="#" class="ding">顶(0)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="hr_25"></div>
			</div>
		</div>
	</div>
</div>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">eBuy简介</a><i>|</i><a href="#">eBuy公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2007 - 2017 eBuy版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>

<script type="text/javascript">
            function addCart(productid){
                //ajax请求php脚本完成数据的添加 shop_cart
                var url = "addCart.php";
                var data = {"productid":productid, "num":parseInt($("#number").val())};
                var success= function(response){
                    if(response.errno == 0){
                        alert('加入购物车成功');
                    }else{
                        alert('加入购物车失败');
                    }
                }
                $.post(url, data, success, "json");
            }
</script>
</body>
</html>
