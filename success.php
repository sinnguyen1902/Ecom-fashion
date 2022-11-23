<?php
include 'include/header.php';
// include 'include/slider.php';
?>	
<?php
 	 if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
       $customer_id = Session::get('customer_id');
       $insertorder = $ct->insertorder($customer_id);
       $dellcart = $ct->dell_all_data_cart();
       header('Location:success.php');
    }
/*
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];
		$addtocart = $ct->add_to_cart($id,$quantity) ;

} */



?>

<form action="" method="post">
<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		<h3>Thanh toán thành công</h3>
            <?php
                $customer_id = Session::get('customer_id');
                $getamount = $ct->getamountprice($customer_id);
                if($getamount){
                    $amount = 0;
                    while($result = $getamount->fetch_assoc()){
                        $price = $result['price'];
                        $amount += $price;
                    
            ?>
            <p style="font-size: 18px;">Tổng số tiền bạn mua từ cửa hàng: <?php echo $amount?> VNĐ </p>
            <p style="font-size: 18px;">Chúng tôi sẽ xử lý đơn hàng sớm nhất. Bạn có thể xem lại đơn hàng 
            <a style="font-size: 18px; " href="orderdetails.php"><u>tại đây</u></a> </p>

            <?php
            }
        }
            ?>
            </div>
            </div>     
    </div>
 
<?php
include 'include/footer.php';
?>	

