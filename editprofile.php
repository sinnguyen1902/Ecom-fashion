<?php
include 'include/header.php';
// include 'include/slider.php';
?>	
 <?php
				 $login_check =  Session::get('customer_login');
				if($login_check == 	false){
					
					header('Location:login.php');
				}else{
					
				} 
				
				?>
<?php
	 /*   if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['proid'];
    }
 */
      $id = Session::get('customer_id');
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {

		$update_customer = $cs->update_customer($id,$_POST); 
 
} 

 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Thông tin khách hàng</h3>
    		</div>
        <form action="" method="post">
            <table class="tblone">
                <tr>
                    <?php
                        if(isset($update_customer)){
                            echo '<td colspan="2">'.$update_customer.'</td>' ;
                        }
                    ?>
                </tr>
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){

                        
                ?>

                <tr>
                    <td> Tên</td>
                    <td>:</td>
                    <td><input type="text" name="name" value="<?php echo $result['name']?>" style="width: 300px;"></td>

                </tr>
                <!--  <tr>
                    <td> Thành phố</td>
                    <td>:</td>
                    <td><input type="text" name="city" value="<?php //echo $result['city']?>" style="width: 300px;"></td>

                </tr>  -->
                <tr>
                    <td>Zip-code</td>
                    <td>:</td>
                    <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']?>" style="width: 300px;"></td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email" value="<?php echo $result['email']?>" style="width: 300px;"></td>

                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><input type="text" name="address" value="<?php echo $result['address']?>" style="width: 300px;"></td>

                </tr>
                <!-- <tr>
                    <td>Tỉnh</td>
                    <td>:</td>
                    <td><?php //echo $result['country']?></td>

                </tr> -->
                <tr>
                    <td> SĐT</td>
                    <td>:</td>
                    <td><input type="text" name="phone" value="<?php echo $result['phone']?>" style="width: 300px;"></td>

                </tr>

                <tr>
                <td colspan="3"><input type="submit" name="save" value="Lưu" class="grey"> </input></td>

                </tr>
                <?php
                
            }
        }
                ?>

            </table>
        </form>
 	</div>
    </div>
<?php
include 'include/footer.php';
?>	

