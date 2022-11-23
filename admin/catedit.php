<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/cartegory.php';?>


<?php 
    
    $cat = new cartegory();

    if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $id = $_GET['catid'];
    }


	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catname = $_POST['catname'];
		$updatecat = $cat->update_cartegory($catname,$id) ;

	}

    

?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                <?php
                if(isset($updatecat)){
                    echo $updatecat;
                }
                ?>
                <?php
                     $get_cat_name = $cat->getcatbyid($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_assoc()){

                      
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php  echo $result['catname']  ?>" name="catname" placeholder="Sửa danh mục ..." class="medium" />
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