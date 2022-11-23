<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>


<?php 
    
    class customer {

        private $db;
        private $fm;
        public  function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($name == "" || $city == "" || $zipcode == "" || $email == "" || 
            $address == "" || $country == "" || $phone == "" || $password == ""){
             $a = "<span class='err'> Không thể rỗng </span>";
             return $a;
            }else{
                $check_email = "SELECT * from tbl_customer where email = '$email' limit 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $a = "<span class='err'> Email đã được sử dụng </span>";
             return $a;
                }else{
                    $query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) 
                VALUES ('$name','$city','$zipcode','$email','$address','$country','$phone','$password')";

                $result = $this->db->insert($query);
                if($result){
                    $as ="<span class='success'> Đăng ký thành công </span>";
                    return $as;

                }else{
                    $as ="<span class='err'> Đăng ký không thành công </span>";
                    return $as;
                     }
                }
            }
        
        }
        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($email == "" || $password == ""){
             $a = "<span class='err'> Email và mật khẩu Không thể rỗng </span>";
             return $a;
            }else{
                $check_email = "SELECT * from tbl_customer where email = '$email' and password = '$password'";
                $result_check = $this->db->select($check_email);
                if($result_check != false){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('Location:order.php');
                }else{
                    $a = "<span class='err'> Email hoặc mật khẩu sai </span>";
                    return $a;
                }
            }
        }


        public function show_customer($id){
            $query = "SELECT * from tbl_customer where id = '$id' ";
                $result = $this->db->select($query);
                return $result;
        }

         public function update_customer($id,$data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);


            if($name == "" || $zipcode == "" || $email == "" || $address == "" || $phone == ""){
             $a = "<span class='err'> Không thể rỗng </span>";
             return $a;
            }else{
        
                $query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' 
                WHERE id='$id'";

                $result = $this->db->update($query);
                if($result){
                    $as ="<span class='success'>Sửa thành công </span>";
                    return $as;

                }else{
                    $as ="<span class='err'> Sửa không thành công </span>";
                    return $as;
                     }
                }
            

        } 
         
    }

?>