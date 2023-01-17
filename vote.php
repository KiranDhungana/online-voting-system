<?php
require "database_con.php";
$id= $_POST["des"];


// echo $id;
session_start(); 
$citz_no = $_SESSION['citizennumber'];
$quer = "select *from voters where citizenno='$citz_no' ";
$res = mysqli_query($conn, $quer);
$data = mysqli_fetch_array($res);
// echo $data['status'];
// Query to update the status 
$updata_ststus_que ="UPDATE `voters` SET `status` = '1' WHERE `voters`.`citizenno` = $citz_no;";
// $data['status']==1;
// QUery to get votes
$get_votes="select *from representataive where id='$id'";
$get_votes_on_id =mysqli_query($conn,$get_votes);
$vot_data=mysqli_fetch_array($get_votes_on_id);
$avlab_vote=$vot_data['Votes'];
// Query to update the vote count 
$vote_count_que="UPDATE `representataive` SET `Votes` = '$avlab_vote'+1 WHERE `representataive`.`id` = $id;";
$increase_vote =mysqli_query($conn,$vote_count_que);
if($increase_vote){
    echo "done";
}else{
echo "error";
};
$updt_ststus_res= mysqli_query($conn,$updata_ststus_que);
if($updt_ststus_res){
header("location:voting.php");
}else{
    echo "something went wrong";
}
?>