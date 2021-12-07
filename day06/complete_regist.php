<?php include ("sql_connect.php") ?>
<!DOCTYPE html>
<link rel="stylesheet" href="complete_regist_css.css">
<?php
    //Khởi tạo mảng để chuyển data sang dạng mình cần
    $facultyList= array("MAT"=>"Khoa học máy tính","DTS"=>"Khoa học dữ liệu");
    $genderList = array(0=>"Nữ",1=>"Nam");
    
    function checkGender($genderList,$gender){
        foreach($genderList as $genderItem=>$valueGender){
           if($gender == $valueGender){
                return $genderItem;// trả về 0 hoặc 1
           }
        }   
    }
    function checkFaculty($facultyList, $faculty){
        foreach($facultyList as $facultyItem=>$valueFaculty){
            if($faculty  == $valueFaculty){
               return $facultyItem;// trả về MAT hoặc DTS
            }
        }
    }
    function checkBirthday($age){
        return 2021- $age;// Trả về năm sinh
    }
   if(isset($_REQUEST["signup"])){
       //Lấy ra dữ liệu từ input ở do_regist.php
    $name=$_POST["Name"];
    $gender=$_POST["Gender"];
    $faculty=$_POST["Faculty"];
    $age=$_POST["Age"];
    
    // Insert vào database khi dữ liệu đã ok
    // Truyền vào các List: $facultyList, $genderList,...các biến để so sánh
    function insertStudent($name, $gender, $faculty, $age, $facultyList, $genderList,$conn){
        $myGender = checkGender($genderList, $gender);
        $myFaculty = checkFaculty($facultyList, $faculty);
        $myBirthday = checkBirthday($age);
       // echo $name. " " . $myGender. " ". $myFaculty. " ". $myBirthday;

        $sql="INSERT INTO `student`(`Name`, `Gender`, `Faculty`, `Birthday`) VALUES 
        ('$name','$myGender','$myFaculty','$myBirthday')";
        $conn->exec($sql);
        $conn = null;
    }
    insertStudent($name, $gender, $faculty, $age, $facultyList, $genderList, $conn);
}
?>
<?php
    $sql= "SELECT * FROM student WHERE ID=(SELECT max(ID) FROM student)";
    $data= $conn->prepare($sql);
    $data->execute();
    function reverse_Gender($genderList, $gender){
        foreach($genderList as $genderItem=>$valueGender){
            if($gender == $genderItem){
                echo $valueGender;
            }
        }
    }

    function reverse_Faculty($facultyList, $faculty){
        foreach($facultyList as $facultyItem=>$valueFaculty){
            if($faculty == $facultyItem){
                echo $valueFaculty;
            }
        }
    }

    function reverseBirthday($age){
        echo 2021-$age;
    }
    foreach($data as $value){ 
        ?>
        <form action="" class="sign-up-success" name="">
            <span><?php  echo "Bạn vừa đăng kí thành công, mã sinh viên của bạn là: ", $value['ID'];  ?></span>
            <div>
                <p>Họ và tên</p>
                <input type="text" value="<?php echo $value['Name']  ?>"/>
            </div>
            <div>
                <p>Giới tính</p>
                <input type="text" value="<?php reverse_Gender($genderList,$value['Gender']);  ?>"/>
            </div>
            <div>
                <p>Phân khoa</p>
                <input type="text" value="<?php reverse_Faculty($facultyList,$value['Faculty']);  ?>"/>
            </div>
            <div>
                <p>Tuổi</p>
                <input type="text" value="<?php reverseBirthday($value['Birthday'])  ?>"/>
            </div>
        </form>
    <?php  } ?>
