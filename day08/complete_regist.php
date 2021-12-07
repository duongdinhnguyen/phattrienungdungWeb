<?php include ("config/sql_connect.php") ;
    session_start();
?>
<!DOCTYPE html>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="css/complete_regist_css.css">
<?php

    // quay trở lại login.php khi chưa nhập đủ thông tin
     if(!isset($_SESSION["notification"])){
        header("location:login.php");
    }
   
    // lấy phân khoa từ bảng faculty
    $sqlFaculty= "SELECT * FROM faculty";
    $facultyList= $conn->prepare($sqlFaculty);
    $facultyList->execute();
    // Lấy giới tính từ bảng gender
    $sqlGender= "SELECT * FROM gender";
    $genderList= $conn->prepare($sqlGender);
    $genderList->execute();

    // So sánh và chuyển Nam, nữ thành 0,1
    function checkGender($genderList,$gender){
        foreach($genderList as $genderItem){
           if($gender == $genderItem["name"]){
                return $genderItem["value"];// trả về 0 hoặc 1
           }
        }   
    }
    // so sánh và chuyển thành MAT, DTS
    function checkFaculty($facultyList, $faculty){
        foreach($facultyList as $facultyItem){
            if($faculty  == $facultyItem["name"]){
               return $facultyItem["value"];// trả về MAT hoặc DTS
            }
        }
    }
    // Chuyển tuổi -> năm sinh
    function checkBirthday($age){
        return 2021- $age;// Trả về năm sinh
    }

    // Chuyển 0,1 sang giới tính
    function reverseGender($genderList,$gender){
        foreach($genderList as $genderItem){
           if($gender == $genderItem["value"]){
                echo $genderItem["name"];
           }
        }
           
    }
    //Chuyển MAT, DTS sang text
    function reverseFaculty($facultyList, $faculty){
        foreach($facultyList as $facultyItem){
            if( $faculty == $facultyItem["value"]){
               echo $facultyItem["name"]; 
            }
        }
        
    }
    
    // chuyển năm sinh thành tuổi
    function reverseBirthday($age){
        echo 2021-$age;
    }
    
    // Insert vào database khi dữ liệu đã ok
        // Truyền vào các List: $facultyList, $genderList,...các biến để so sánh
    function insertStudent($name, $gender, $faculty, $age, $facultyList, $genderList,$conn){
            $myGender = checkGender($genderList, $gender);
            $myFaculty = checkFaculty($facultyList, $faculty);
            $myBirthday = checkBirthday($age);
        // echo $name. " " . $myGender. " ". $myFaculty. " ". $myBirthday;

            $sql="INSERT INTO `student`(`name`, `gender`, `faculty`, `birthday_year`) VALUES 
            ('$name','$myGender','$myFaculty','$myBirthday')";
            $conn->exec($sql);
            $conn = null;
        }

   if(isset($_REQUEST["do-regist_submit"])){
    //Lấy ra dữ liệu từ input ở do_regist.php
    $name=$_POST["do-regist_name"];
    $gender=$_POST["do-regist_gender"];
    $faculty=$_POST["do-regist_faculty"];
    $age=$_POST["do-regist_age"];
    
    insertStudent($name, $gender, $faculty, $age, $facultyList, $genderList, $conn);
    }


    $sql= "SELECT * FROM student WHERE ID=(SELECT max(ID) FROM student)";
    $data= $conn->prepare($sql);
    $data->execute();
    
    // ??? tại sao phải lấy faculty, gender lần 2 mới so sánh được; trong khi đã gọi ở trên rồi ạ

    // lấy phân khoa từ bảng faculty lần 2
    $sqlFaculty= "SELECT * FROM faculty";
    $facultyList= $conn->prepare($sqlFaculty);
    $facultyList->execute();
    // Lấy giới tính từ bảng gender lần 2
    $sqlGender= "SELECT * FROM gender";
    $genderList= $conn->prepare($sqlGender);
    $genderList->execute();

    
    foreach($data as $value){ 
        ?>
        <div class="content">
            <form action="" class="complete_regist_form" >
                <div class="complete_all-item">
                    <div class="complete_item">
                        <span><?php  echo "Bạn vừa đăng kí thành công, mã sinh viên của bạn là: ", $value["id"];  ?></span>                    </div>
                    <div class="complete_item">
                        <p class="description_item">Họ và tên</p>
                        <input class="input_item" type="text" readonly value="<?php echo $value["name"];  ?>"/>
                    </div>
                    <div class="complete_item">
                        <p class="description_item">Giới tính</p>
                        <input class="input_item" type="text" readonly value="<?php reverseGender($genderList,$value["gender"]);?>"/>
                               
                    </div>
                    <div class="complete_item">
                        <p class="description_item">Phân khoa</p>
                        <input class="input_item" type="text" readonly value="<?php reverseFaculty($facultyList,$value["faculty"]);?>"/>
                           
                    </div>
                    <div class="complete_item">
                        <p class="description_item">Tuổi</p>
                        <input class="input_item" type="text" readonly value="<?php reverseBirthday($value["birthday_year"]) ; ?>"/>
                    </div>
                </div>
            
            </form>
        </div>
    <?php  }
    
        session_unset();
    ?>
