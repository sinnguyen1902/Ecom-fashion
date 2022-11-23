<?php
include 'include/header.php';
// include 'include/slider.php';
?>
<?php
	$login_check =  Session::get('customer_login');
	if($login_check == 	false){
					
	header('Location:login.php');
	}
	$ct = new cart();
	if (isset($_GET['confirmid'])) {
        $id = $_GET['confirmid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
		$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    } 
				
				?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				
			    	<h2 style="width:100%">Đơn hàng đã mua</h2>
						<table class="tblone">
							<tr>
                                <th>ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="15%">Ngày</th>
								<th width="10%">Trạng thái</th>
								<th width="10%">Tùy chọn</th>
							</tr>

							<?php
                                $customer_id = Session::get('customer_id');
								$get_cart_order = $ct->get_cart_order($customer_id);
								if($get_cart_order){
                                    $i = 0;
									while($result = $get_cart_order->fetch_assoc()){
										
                                        $quantity = 0;
                                        $i++;
									
							?>
							<tr>

								<td><?php echo $i?></td>
								<td><?php echo $result['productname']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $result['price'].' '.'VNĐ'?></td>
								<td><?php echo $result['quantity']?></td>
								<td><?php echo $fm->formatDate($result['date'])?></td>

								<td><?php 
                                if($result['status'] == 0 ){
                                    echo 'Đang xử lý..';
                                }elseif($result['status'] == 1){
								
                                ?>
								<span>Đang vận chuyển..</span>
								<?php
								}elseif($result['status'] == 2){
									echo 'Đã nhận';
								}
								?>
							
							
							
							</td>

                                <?php
                                if($result['status'] == 0 ){
                                
                                            
                                ?>
                                <td><?php echo 'N/A'?></td>
                                <?php
                                }elseif($result['status'] == 1){

                                ?>
								<td>
								<a href="?confirmid=<?php echo $customer_id?>&price=<?php echo $result['price']?>&time=<?php echo $result['date']?>">Xác nhận</a>
                                </td>
								<?php
                                }else{
								
                                ?>
								<td><?php echo 'Đã nhận'?></td>
								<?php 
								}
								?>
							</tr>
							<?php
								
									}
								}
								?>

							
						</table>
						
	
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
include 'include/footer.php';
?>