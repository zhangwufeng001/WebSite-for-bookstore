<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购物车页面</title>
<link href="style/myCart.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="header"><img src="images/logo.gif" alt="logo" /></div>
<div id="nav">您的位置：<a href="default.html">首页</a> > 我的购物车</div>
<div id="navlist">
  <ul>
    <li class="navlist_red_left"></li> 
    <li class="navlist_red">1.查看购物车</li> 
    <li class="navlist_red_arrow"></li>
    <li class="navlist_gray">2.确认订单数量</li> 
    <li class="navlist_gray_arrow"></li> 
    <li class="navlist_gray">3.填写地址信息</li>  
  </ul>
</div>

<div id="content">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="shopping">
 <form action="" method="post" name="myform">
  <tr>
    <td class="title_2" colspan="2">网络书店系统之店铺宝贝</td>
    
    <td class="title_4">单价（元）</td>
    <td class="title_5">数量</td>
    <td class="title_6">小计（元）</td>
    <td class="title_7">操作</td>
  </tr>
  <tr>
    <td colspan="8" class="line"></td>
  </tr>

<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=bookinline","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $pdo->query("set names utf8");
        $sql = "select p.id, p.cover, p.title, p.price, p.originalprice, c.num from shop_product p right join shop_cart c on p.id=c.productid where c.userid=?";
        $stmt = $pdo->prepare($sql);
        session_start();
        $userid = $_SESSION['memberid'];
        $stmt->execute(array($userid));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

<?php
    $total = 0;
    foreach($data as $product):
?>
  <tr id="product1">
    <td class="cart_td_2">
        <a href="#"><img style="width:80px; height:80px;" src="<?php echo $product['cover'] ?>" border="0" title="<?php echo $product['title'] ?>"></a><br>
        <a href="#"><?php echo $product['title'] ?></a>
    </td>
    <td class="cart_td_3"><a href="#"><?php echo $product['title'] ?></a><br /></td>
    <td class="cart_td_5"><span id="p-<?php echo $product['id'] ?>"><?php echo $product['price'] ?></span></td>
    <td class="cart_td_6"><input type="text" name="goods_number" value="<?php echo $product['num'] ?>" size="4" class="inputBg" style="text-align:center " onblur="changeNum(<?php echo $product['id'] ?>, this.value)" id="product-<?php echo $product['id'] ?>" >
    </td>
    <td class="cart_td_7"><span id="total-<?php echo $product['id'] ?>"><?php echo $product['num']*$product['price'] ?></span>
    </td>
    <td class="cart_td_8"><a href="javascript:delPro(<?php echo $product['id'] ?>);">删除</a></td>
  </tr>
<?php
    $total += $product['price']*$product['num'];
    endforeach;
?>   

  <tr>
    <td colspan="5" class="shopend">商品总价（不含运费）：<label class="yellow"><?php echo $total ?></label> 元<br /><br/>
    <a href="address.html"><img src="images/checkout.gif" alt="checkout"></a></td>
  </tr>
  </form>
</table>
</div>

<script type="text/javascript">
                function changeNum(productid, num){
                    //通过ajax将对应商品的数量进行修改操作
                    var url = "changeNum.php";
                    var data = {'productid':productid, 'num':num};
                    var success = function(response){
                        if(response.errno == 0){
                            var price = ($("#product-"+productid).val())*($("#p-"+productid).html());
                            $("#total-"+productid).html(price);
                        }
                    }
                    $.post(url, data, success, "json");
                }
                
                function delPro(productid){
                    //通过ajax将商品的id传递给PHP脚本进行数据表的删除
                    var url = "deleteProduct.php";
                    var data = {"productid":productid};
                    var success = function(response){
                        if(response.errno == 0){
                            $("#tr-"+productid).remove();
                        }
                    }
                    $.get(url, data, success, "json");
                }
</script>
</body>
</html>
