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
<style type="text/css">
        .box_left{
            margin-bottom: 20px;
            width:50%;
            border: 1px solid #666;
            float:left;
            padding: 4px;
        }
        .box_right{
            margin-bottom: 20px;
            width: 47%;
            border: 1px solid #666;
            float:right;
            padding: 4px;
        }
        .submitorder{
            padding: 7px 20px; 
            background: #3e3d42;
            color:white;
            font-size: 18px;
             border-radius: 3px; 
        }
        
</style>
<form action="" method="post">
<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		<h3>Thanh toán</h3>
            
    		</div>
            <div class="clear"></div>
            <div class="box_left">
            <div class="cartpage">
				
                <h4>Giỏ hàng</h4>
                <?php
                 if(isset($update_quantity_cart)){
                    echo '<span style="color: green;">Cập nhật thành công</span>';
                }
            ?>
                <?php
                 if(isset($delcart)){
                    echo $delcart;
                }
            ?>
                    <table class="tblone">
                        <tr>
                            <th width="5%">STT</th>
                            <th width="15%">Tên sản phẩm</th>
                            <th width="15%">Giá</th>
                            <th width="25%">Số lượng</th>
                            <th width="20%">Tổng cộng</th>
                        </tr>

                        <?php

                            $get_product_cart = $ct->get_product_cart();
                            if($get_product_cart){
                                $subtotal = 0;
                                $i = 0;
                                while($result = $get_product_cart->fetch_assoc()){
                                    $i++;

                                
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $result['productname']?></td>
                            <td><?php echo $result['price'].' '.'VNĐ'?></td>
                            <td><?php echo $result['quantity']?></td>
                            <td><?php
                            $total = $result['price'] * $result['quantity'];
                            echo $total.' '.'VNĐ';
                            ?></td>
                        <?php
                            $subtotal += $total;
                                }
                            }
                            ?>

                        
                    </table>
                    <?php
                    $check_cart = $ct->check_cart();
                              if($check_cart){
                                
                            
                        ?>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Thành tiền : </th>
                            <td> <?php
                                echo $subtotal.' '.'VNĐ';
                                session::set('sum',$subtotal);
                            ?></td>
                        </tr>
                   </table>
                   <?php
                    }else{
                        echo 'Giỏ hàng rỗng';
                    }
                   ?>
                </div>
                </div>
            <div class="box_right">
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){

                        
                ?>

                <tr>
                    <td> Tên</td>
                    <td>:</td>
                    <td><?php echo $result['name']?></td>

                </tr>
                <!-- <tr>
                    <td> Thành phố</td>
                    <td>:</td>
                    <td><?php //echo $result['city']?></td>

                </tr> -->
                <tr>
                    <td>Zip-code</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode']?></td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>

                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>

                </tr>
                <!-- <tr>
                    <td>Tỉnh</td>
                    <td>:</td>
                    <td><?php echo $result['country']?></td>

                </tr> -->
                <tr>
                    <td> SĐT</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>

                </tr>

                <tr>
                <td colspan="3"><a href="editprofile.php" style="font-size: "> Sửa thông tin </a></td>

                </tr>
                <?php
                
            }
        }
                ?>
            </table>
                </div>
            </div>
            <center> <a href="?orderid=order"  class="submitorder">Thanh Toán </a> </center> 
         </div>     
    </div>
    </form>
<?php
include 'include/footer.php';
?>	

