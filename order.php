<?php
include 'include/header.php';
//include 'include/slider.php';	
?>
<?php
				 $login_check = Session::get('customer_login');
				if($login_check == false){
					header('Location:login.php');
				}
				 
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
                <div class="not_found">
                    <h2 style="width: 100%;">Order page</h2>
                </div>
            </div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php
include 'include/footer.php';
?>