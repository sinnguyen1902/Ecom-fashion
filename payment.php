<?php
include 'include/header.php';
// include 'include/slider.php';
?>	
 <?php
				/*  $login_check =  Session::get('customer_login');
				if($login_check == 	false){
					
					header('Location:login.php');
				}else{
					
				}  */
				
				?>
<?php
	 /*  if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['proid'];
    }

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$addtocart = $ct->add_to_cart($id,$quantity) ; 

} */


?>
<style>
    h2.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .wapper_method{
        text-align: center;
        width: 800px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .wapper_method h2{
        margin: 20px;
    }
    .wapper_method a{
        border: 2px solid white;
        padding: 10px;
        background: #3e3d42;
        color: #fff;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Thanh toán</h3>
    		</div>
                <div class="clear"></div>
                <div class="wapper_method">

                <h2 class="payment">Chọn phương thức thanh toán</h2>
                <a href="offlinepayment.php">Thanh toán offline </a>
                <a href="onlinepayment.php">Thanh toán online </a><br>
                
                </div>
                <a style="border: 2px solid white;padding: 10px;background: #3e3d42;color: #fff;" href="cart.php">Trở về </a>
            </div>
    </div>
<?php
include 'include/footer.php';
?>	

