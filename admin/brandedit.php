<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/brand.php';?>


<?php 
    
    $brand = new brand();

    if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
        echo "<script>window.lobrandion = 'brandlist.php'</script>";
    } else {
        $id = $_GET['brandid'];
    }


	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$brandname = $_POST['brandname'];
		$updatebrand = $brand->update_brand($brandname,$id) ;

	}

    

?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                if(isset($updatebrand)){
                    echo $updatebrand;
                }
                ?>
                <?php
                     $get_brand_name = $brand->getbrandbyid($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){

                      
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php  echo $result['brandname']  ?>" name="brandname" placeholder="Sửa danh mục ..." class="medium" />
                            </td>
                        </tr>
			    		<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                            <?php
                                }
                            } 
                            ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>