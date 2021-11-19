<?php include "./config/sql_connect.php";
    session_start(); // session chỉ truyền được qua 1 tab, nếu muốn từ tab 1 ->4 phải khai báo session_start() tại tab1, tab3
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
    <?php 
        $_SESSION["notification"]=null;
        function equal($x, $y){
            if($x == $y){
                return true;
            }
            return false;
        }
        
        if(isset($_REQUEST["login_submit"])){
            if(empty($_REQUEST["login_user"])){
                $_SESSION["notification"]="Hãy nhập user";
            }
            else if(empty($_REQUEST["login_password"])){
                $_SESSION["notification"]="Hãy nhập password";
            }
            else {
                $sql= "SELECT * FROM admin";
                $data= $conn->prepare($sql);
                $data->execute();
                $userName = trim($_REQUEST["login_user"]," ");
                $passWord = trim($_REQUEST["login_password"], " ");
                foreach($data as $row){
                    if(equal(!$row["username"],$userName)  || !equal($row["password"], md5($passWord))){
                        $_SESSION["notification"]="Sai user hoặc password, vui lòng nhập lại";
                    }
                    if(equal($row["username"],$userName)  &&  equal($row["password"],md5($passWord))){
                        $_SESSION["notification"]= "Login thành công, đăng kí thông tin theo mẫu";
                        include ("home_login.php");
                        exit(); 
                    }
                }
            }
        }
       
       
    ?>
</head>
<body>
       <div class="content">
        <form class="login_form" action="<?php $_PHP_SELF ?>" method="POST">
            <div class="login_item">
                <p class="notification">
                    <?php 
                    echo  $_SESSION["notification"];
                    
                    ?>
                </p>
            </div>
            <div class="login_item">
                <p class="description_item">Tên đăng nhập</p>
                <input type="text" class="input_item" name="login_user" maxlength="10" >
            </div>
            <div class="login_item">
            <p class="description_item" >Mật khẩu</p>
                <input type="password" class="input_item" name="login_password" maxlength="10" > 
            </div>
            <div class="login_item">
                <button class="submit_form" type="submit" name="login_submit">Login</button>
            </div>
        </form> 
       </div>
</body>
<script>
    var 
</script>
</html>