<?php
    include "./config/sql_connect.php";
    // quay trở lại login.php khi chưa nhập đủ thông tin login
    if(!isset($_SESSION["notification"])){
        header("location:login.php");
    }
    
?>
<style>
    a{
       
        display: block;
        font-size: 24px;
        margin: 50px 60px;
    }
</style>
<form action="regist.php">
    <a href="./regist.php" >Màn hình đăng kí sinh viên</a>
</form>