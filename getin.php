<?php
include "database_con.php";
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $pass=$_POST['password'];
    $citno=$_POST['cit_no'];
    $age=$_POST['age'];
    echo $name;
    echo $age;

}
$quer = "select *from voters where name = '$name' and password = '$pass' and citizenno='$citno' ";
$result =mysqli_query($conn,$quer);
$cont=mysqli_num_rows($result);
// var_dump($result);
if($cont==1){
    session_start();
    $_SESSION['username']=$name;
    $_SESSION['age']=$age;
    $_SESSION['citizennumber']=$citno;

header("location:voting.php");
}
else{
    $x=1;
    // echo "data not exist";
    header("location:login.php?status=$x");
}



?>