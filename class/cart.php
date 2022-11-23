<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php 
    
    class cart {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }
        public function add_to_cart($id,$quantity){
            $quantity = $this->fm->validation($quantity);  
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id       = mysqli_real_escape_string($this->db->link, $id);
            $sid      = session_id();
            
            
            $query = "SELECT *FROM tbl_product where productid = '$id'";

            $result = $this->db->select($query)->fetch_assoc();

            $image = $result['image'];
            $price = $result['price'];
            $productname = $result['productname'];

          //  $check_cart = "SELECT *FROM tbl_cart where productid = '$id' and sidd = '$sid'";
            //if($check_cart){
               // $msg = "Sản phẩm đã có tròn giỏ hàng";
                //return $msg;
            //}else{

            
            $query_insert = "INSERT INTO tbl_cart (productname,productid,price,image,sidd,quantity) 
                            VALUES ('$productname','$id','$price','$image','$sid','$quantity')";

                $insert_cart = $this->db->insert($query_insert);
                if($result){
                   header('Location:cart.php');

                }else{
                    header('Location:404.php');
                }
            }
        

        public function get_product_cart(){
            $sid      = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sidd = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity_cart($quantity,$cartid){

            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartid    = mysqli_real_escape_string($this->db->link, $cartid);
            
            $query = "UPDATE tbl_cart SET  
                    quantity = '$quantity'
                    WHERE cartid = '$cartid'";
             $result = $this->db->update($query);
             return $result;
             if($result){
                $msg = "<span class='succsess'>Số lượng cập nhật thành công </span>";
                return $msg;
             } else{
                $msg = "<span class='err'>Số lượng cập nhập không thành công</span>";
                return $msg;
             }

        }

        public function del_product_cart($cartId){
            $cartId       = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "DELETE FROM tbl_cart WHERE cartid = '$cartId'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }
        }
        public function check_cart(){
            $sid      = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sidd = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }
        public function dell_all_data_cart(){
            $sid      = session_id();
            $query = "DELETE  FROM tbl_cart WHERE sidd = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertorder($customer_id){
            $sid      = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sidd = '$sid'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result = $get_product->fetch_assoc()){
                    $productid = $result['productid'];
                    $productname = $result['productname'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customer_id = $customer_id;

                    $query_insert = "INSERT INTO tbl_order (productname,productid,price,image,quantity,customer_id) 
                            VALUES ('$productname','$productid','$price','$image','$quantity','$customer_id')";

                    $insert_order = $this->db->insert($query_insert);
                
                }
                }
            }
            
            public function getamountprice($customer_id){
                
                $query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
                $get_price = $this->db->select($query);
                return $get_price;
            }
            public function get_cart_order($customer_id){
                
                $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
                $get_cart_order = $this->db->select($query);
                return $get_cart_order;
            }

            public function check_order($customer_id){
                $sid      = session_id();
                $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
                $result = $this->db->select($query);
                return $result;
            }

            public function get_inbox_cart(){
                $query = "SELECT * FROM tbl_order order by date";
                $result = $this->db->select($query);
                return $result;
            }
            public function shifted($id,$time,$price){
                $id = mysqli_real_escape_string($this->db->link, $id);
                $time    = mysqli_real_escape_string($this->db->link, $time);
                $price    = mysqli_real_escape_string($this->db->link, $price);
                $query = "UPDATE tbl_order SET  
                status = '1'
                WHERE id = '$id' and date='$time' and price = '$price'";
                 $result = $this->db->update($query);
                 return $result;
                if($result){
                    $msg = "<span class='success'>Cập nhật thành công </span>";
                    return $msg;
                } else{
                    $msg = "<span class='err'>Cập nhập không thành công</span>";
                    return $msg;
                }
        }

        public function del_shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
                $time    = mysqli_real_escape_string($this->db->link, $time);
                $price    = mysqli_real_escape_string($this->db->link, $price);
                $query = "DELETE FROM tbl_order
                WHERE id = '$id' and date='$time' and price = '$price'";
                 $result = $this->db->update($query);
                 return $result;
                if($result){
                    $msg = "<span class='success'>Cập nhật thành công </span>";
                    return $msg;
                } else{
                    $msg = "<span class='err'>Cập nhập không thành công</span>";
                    return $msg;
                }
        }

        public function shifted_confirm($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
                $time    = mysqli_real_escape_string($this->db->link, $time);
                $price    = mysqli_real_escape_string($this->db->link, $price);
                $query = "UPDATE tbl_order SET  
                status = '2'
                WHERE customer_id = '$id' and date='$time' and price = '$price'";
                 $result = $this->db->update($query);
                 return $result;
        }
    }
    
        

?>