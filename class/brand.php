<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php 
    
    class brand {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }
        
        public function insert_brand($brandname){
            $brandname = $this->fm->validation($brandname);           
            
            $brandname = mysqli_real_escape_string($this->db->link, $brandname);

            if(empty($brandname)){
                 $a = "<span class='err'> Không thể rỗng </span>";
                 return $a;
            }else {

                $query = "INSERT INTO tbl_brand(brandname) VALUES ('$brandname')";

                $result = $this->db->insert($query);
                if($result){
                    $as ="<span class='success'> Thêm thành công </span>";
                    return $as;

                }else{
                    $as ="<span class='err'> Thêm không thành công </span>";
                    return $as;
                }
            }
        }

        public function show_brand(){
            $query = "SELECT *FROM tbl_brand order by brandid desc";

            $result = $this->db->select($query);
            return $result;
        }

        public function getbrandbyid($id){
            $query = "SELECT * FROM tbl_brand where brandid = '$id'";

            $result = $this->db->select($query);
            return $result;
        }

        public function update_brand($brandname,$id){
            $brandname = $this->fm->validation($brandname);           
            
            $brandname = mysqli_real_escape_string($this->db->link, $brandname);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($brandname)){
                $a = "<span class='err'> Không thể rỗng </span>";
                return $a;
           }else {

               $query = "UPDATE tbl_brand SET brandname = '$brandname' WHERE brandid = '$id'";

               $result = $this->db->update($query);
               if($result){
                   $as ="<span class='success'> Sửa thành công </span>";
                   return $as;

               }else{
                   $as ="<span class='err'> Sửa không thành công </span>";
                   return $as;
               }
           }

        }
        public function del_brand($id){
            $query = "DELETE FROM tbl_brand where brandid = '$id'";

            $result = $this->db->delete($query);
            if($result){
                $as ="<span class='success'> Xóa thành công </span>";
                return $as;

            }else{
                $as ="<span class='err'> Xóa không thành công </span>";
                return $as;
            }
        }
     }

?>