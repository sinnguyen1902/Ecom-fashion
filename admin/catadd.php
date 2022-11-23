<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/cartegory.php';?>


<?php 
	$cat = new cartegory();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catname = $_POST['catname'];
		$insertcat = $cat->insert_cartegory($catname) ;

	}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                <?php
                if(isset($insertcat)){
                    echo $insertcat;
                }
                ?>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catname" placeholder="Thêm danh mục ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>