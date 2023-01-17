<?php
require "database_con.php";
 if(isset($_POST['name'])){
    $name =$_POST['name'] ;
    $password=$_POST['password'];
    $cpaaword=$_POST['cpassword'];
    $age=$_POST['age'];
    $citz_no=$_POST['cit_no'];
    if($_FILES["file"]){

    $filename =$_FILES['file']['name'];
    $filesize =$_FILES['file']['size'];
    $filetype=$_FILES['file']['type'];
    $file_tempname=$_FILES['file']['tmp_name'];
    }
}
$citzque ="select *from voters where  citizenno='$citz_no';";
$citz_que=mysqli_query($conn,$citzque);
$citizen_quer_result=mysqli_num_rows($citz_que);
$fileuplos=  move_uploaded_file($file_tempname,'photo/'.$citz_no);
if($password==$cpaaword){
    if($citizen_quer_result>0){
    // echo "data exist";
    // value 3 represent that the citizen already exists
    $x=3;
    header("location:signup.php?status=$x");
    }else if($fileuplos){
    $que ="INSERT INTO `voters` (`name`, `age`, `password`, `citizenno`) VALUES ('$name', '$age', '$password', '$citz_no')";
    $res =mysqli_query($conn,$que); 
    $x=1;
    // 1 represent registeration success
    header("location:signup.php?status=$x");
 
  
}else{
    $x=4;
    header("location:signup.php?status=$x"); 
}
       
}else{
    $x=2;
    header("location:signup.php?status=$x");
}


?>
