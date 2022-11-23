<?php
    include 'lib/session.php';  
    Session::init();
?>
<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($classname){
		include_once "class/".$classname.".php";
	});

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new cartegory();
	$cs = new customer();
	$product = new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Web Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				 <a href="index.php"><img style="max-width: 32%" src="images/logo2.png" alt="" /></a> 
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input style="background:#3e3d42; color:white;" type="text"  value="Nhập tên sản phẩm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập tên sản phẩm';}"><input class="asd" style="background:  #3e3d42;" type="submit" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div style="background: #3e3d42" class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span style="color: white;" class="cart_title">Giỏ hàng</span>
								<span class="no_product">
  								<?php
								  $check_cart = $ct->check_cart();
								  if($check_cart){
								 	$sum =  session::get("sum");
									 echo $sum.' '.'Đ';
								}else{
									echo '0 Đ';
								}
								  ?>
								</span>
							</a>
						</div>
			      </div>
			<?php
				if(isset($_GET['customer_id'])){
					$dellcart = $ct->dell_all_data_cart();
					Session::destroy();
				}
			
			?>
		   <div class="login" style="background:  #3e3d42;border: 1px solid #CECECE;">
				<?php
				 $login_check =  Session::get('customer_login');
				if($login_check == 	false){
					
					echo '<a style="color: #fff;font-size:20px;"  href="login.php">Đăng nhập</a></div>';
				}else{
					echo '<a style="color: #fff;font-size:20px; "  href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></div>';
					
				} 
				
				?>
				<!-- <a href="login.php">Login</a></div> -->
		  
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sản Phẩm</a> </li>
	  <?php
	 	$check_cart = $ct->check_cart();
		 if($check_cart==true){
			echo '<li><a href="cart.php">Cart</a></li>';
		 } else{
				echo '';
		 }
	  ?>

<?php
		$customer_id = Session::get('customer_id');
	 	$check_order = $ct->check_order($customer_id);
		 if($check_order==true){
			echo '<li><a href="orderdetails.php">Đơn hàng</a></li>';
		 } else{
				echo '';
		 }
	  ?>


	  <?php
				 $login_check =  Session::get('customer_login');
				if($login_check == 	false){
					
					echo '';
				}else{
					echo '<li><a href="profile.php">Tài khoản</a> </li>';
					
				} 
				
				?>
	  <!-- <li><a href="profile.php">Profile</a> </li> -->
	  <li><a href="contact.php">Hỗ Trợ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>