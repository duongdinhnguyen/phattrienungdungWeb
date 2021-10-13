<!DOCTYPE html>

<html>
    <link rel="stylesheet" href="regist_css.css"/>
    <?php
    // Khoi tao doi tuong chua data
        class DataInput{
            public $name;
            public $gioitinh;
            public $phankhoa;
            public $age;
            function set_name($name) {
                $this->name = $name;
              }
              function get_name() {
                return $this->name;
              }
              function set_gioitinh($gioitinh) {
                $this->gioitinh = $gioitinh;
              }
              function get_gioitinh() {
                return $this->gioitinh;
              }
              function set_phankhoa($phankhoa) {
                $this->phankhoa = $phankhoa;
              }
              function get_phankhoa() {
                return $this->phankhoa;
              }
              function set_age($age) {
                $this->age = $age;
              }
              function get_age() {
                return $this->age;
              }
        }
        $ERROR="";
        $data= new DataInput();
        // Kiểm tra dữ liệu
        if(empty($_GET["name"])) {
            $ERROR="Hãy nhập tên.";
        }
        else if(empty($_GET["gioitinh"])){
            $ERROR="Hãy nhập giới tính.";
        }
        else if(empty($_GET["phankhoa"])){
            $ERROR="Hãy nhập phân khoa.";
        }
        else if(empty($_GET["age"])){
            $ERROR="Hãy nhập năm sinh.";
        }
       
       else if($_GET["name"] &&  $_GET["gioitinh"]  &&  $_GET["phankhoa"]  &&  $_GET["age"]){
            $data->set_name($_GET["name"]);
            $data ->set_gioitinh($_GET["gioitinh"]);
            $data ->set_phankhoa($_GET["phankhoa"]);
            $data->set_age($_GET["age"]);
            include("do_regist.php"); // thuc hien cac lenh o do_regist
            exit(); // qua trang moi
       }
    ?>  
<head></head>
<body>
    
   <form class="form-login" action="<?php $_PHP_SELF ?>" method = "GET"> <!-- action : ham do_regist là hàm xử lý-->
        
        <p class="error" id="error"><?php  echo $ERROR; ?></p>
    <p>
        <b class="account-password"><?php echo "Họ và tên"?></b>
        <input type="text" class="input" name ="name"> </input>
        
    </p>
        <br/>
    <p>
        <b class="account-password"><?php echo "Giới tính"?></b>
        <input id ="gioitinh" type="radio" name="gioitinh" value="Nam"> <?php echo "Nam"; ?></input>
        <input id ="gioitinh"  type="radio" name="gioitinh" value="Nữ"><?php echo "Nữ"; ?></input>
    </p>
        <br/>
    <p>
        <b class="account-password"><?php   echo "Phân Khoa"  ?></b>
            <div class="select">
                <select name="phankhoa"> <!-- để name ở đây mới lấy được phankhoa, tại sao thế ạ? -->
                    
                    <option class="option" name="phankhoa" value="MAT"><?php  echo "MAT";  ?></option>
                    <option class="option" name="phankhoa" value="KDL"><?php echo "KDL";  ?></option>
                </select>
            </div>
    </p>
        <br/>
    <p>
        <b class="account-password"><?php echo "Năm sinh"?></b>
        <input type="text" class="input" name="age"> </input>
    </p>
        <br/>
    <p >
        <input type="submit" value="<?php echo "Đăng ký" ?>" class="sign_in"></input>
        
    </p>        
    </form>
    
    
<body> 
</html>
