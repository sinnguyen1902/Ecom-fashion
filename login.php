<?php
include 'include/header.php';
// include 'include/slider.php';
?>
<?php
			 	$login_check = Session::get('customer_login');
				if($login_check){
					header('Location:order.php');
				}
				
?>	
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$insertcustomer = $cs->insert_customer($_POST) ;

}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
	$logincustomer = $cs->login_customer($_POST) ;

}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			<?php
			if(isset($logincustomer)){
				echo $logincustomer;
			}
			?>
        	<form action="" method="post" >
                	<input  type="text" name="email" class="field" placeholder="Nhập email ...">
                    <input type="password" name="password" class="field" placeholder="Nhập mật khẩu ...">
                 
                 <p class="note">Nếu bạn quên mật khẩu của mình, chỉ cần nhập email của bạn và nhấp <a href="#">tại đây</a></p>
                    <div class="buttons"><div><input type="submit" name="login"  class="grey_1" value="Đăng nhập"></input></div></div>
                    </div>
				</form>
    	<div class="register_account">
    		<h3>Đăng Ký</h3>
			<?php
				if(isset($insertcustomer)){
					echo $insertcustomer;
				}
			?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập tên ..." >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Nhập thành phố ..." >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Nhập mã Zip-code ..." >
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập email ...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ ..." >
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option> 

							<option value="AF">Afghanistan</option>
							

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone"  placeholder="Nhập số điện thoại ...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Nhập mật khẩu ...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit"  class="grey_1" value="Đăng ký"></input></div></div>
				<style>
					.grey_1{
						background: #3e3d42;
						color:white;
						padding: 7px 20px;
					}
				</style>
		    <!-- <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p> -->
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php
include 'include/footer.php';
?>