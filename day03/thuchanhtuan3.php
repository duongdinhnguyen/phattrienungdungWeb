<!DOCTYPE html>
<html>
    <style>
        body{
            overflow: auto;  /* tạo thanh cuộn*/
        }
        .form-login {
            padding-top: 60px;
            height: 300px;
            width: 500px;
            border: 1px solid rgb(47, 153, 153);
            margin-left: 30%;
            margin-top: 3%;
        }
        p{
            margin: 5px 5px 0px 39px;

        }
        b{
            color:rgb(248, 248, 248);
        }
        .account-password{
            float:left;
            background-color:rgb(126, 196, 236);
            border: 1px solid rgb(47, 153, 153);
            width:80px;
            height: 30px;
            padding: 12px 5px 0px 15px;
        }
        .input{
            margin: 2px 0 0 30px;
            height: 35px;
            width: 280px;
            border: 1px solid rgb(47, 153, 153);
        }

        select{
            margin: 2px 0 0 30px;
            width: 220px;
            height: 35px;
            border: 1px solid rgb(47, 153, 153);
        }
        .sign_in{
            margin-left: 39%;
            margin-top: 30px;
            padding-top: 15px;
            text-align: center;
            height:40px;
            width: 150px;
            background-color: rgb(236, 147, 12);
            border-radius: 7%;
        }
        
        #gioitinh{
            margin: 15px 10px 0px 35px;
            border: 1px solid rgb(47, 153, 153);
        }
        .print-gioitinh-phankhoa{
            float: left;
            width: 500px;
            height: 250px;
            border: 1px solid rgb(47, 153, 153);
            margin: 50px 0 0 10%;
            text-align:center;
        }
        
    </style>
    <?php
        $gioitinh= array(0=>"Nam", 1=>"Nữ");
        $phankhoa= array("MAT"=>"Khoa học máy tính","KDL"=>"Khoa học dữ liệu");
        function checkgioitinh($z){
           
            for($i =0; $i < count($z); $i ++){
                echo $z[$i];
                echo "<br/>";

            }
        }
        function checkkhoa($pk){
            foreach ($pk as $value1=>$value2){
                echo "mặc định: " .$value1 .",chi tiết: " .$value2;
                echo "<br/>";
            }
        }
       
    ?>
<head></head>
<body >
    
   <form class="form-login">
        
    <p>
        <b class="account-password"><?php echo "Họ và tên"?></b>
        <input type="text" class="input"> </input>
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
                <select>
                    <option class="option"><?php  echo "MAT";  ?></option>
                    <option class="option"><?php echo "KDL";  ?></option>
                </select>
            </div>
    </p>
        <br/>
    <p class="sign_in">
        <b><?php echo "Đăng ký" ?></p>
        </b>        
    </form>
    
        <div class="print-gioitinh-phankhoa">
           
            <?php
                checkgioitinh($gioitinh);
            ?>

        </div>
        <div class="print-gioitinh-phankhoa">
            
            <?php
                checkkhoa($phankhoa);
            ?>
        </div>
    
<body> 
</html>
