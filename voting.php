<?php
$repre_que = "SELECT * FROM `representataive`";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .detail_div {

        display: flex;
        flex-direction: column;
        width: max-content;
        float: right;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        padding: 25px;
        background-color: #ABECA6;

    }

    .representative {
        display: block;
        color: white;
        background-color: #1F2124;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        border-radius: 5px;
        width: max-content;
        padding-left: 25px;
        padding-bottom: 40px;
        padding-right: 25px;
        padding-top: 15px;
        margin-left: 25px;
        margin-top: 25px;
        margin-bottom: 25px;
        margin-left: 25px;

    }


    img {
        margin-left: 25px;
        height: 55px;
        border: 2px solid black;
        border-radius: 55px;
    }

    .form_page {
        width: max-content;
        padding: 0px;
        margin: 0px;

    }

    .form_page button {
        border-radius: 10px;
        background-color: orange;
        margin-top: 10px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .image_name {

        display: flex;
    }
    </style>
</head>

<body>
    <div class="container-fluid main_cont">

        <?php include "navbarforvoting.php";


    session_start();
    $citz_no = $_SESSION['citizennumber'];
    require "database_con.php";

    // query to get the voters details 
    $quer = "select *from voters where citizenno='$citz_no'";
    $res = mysqli_query($conn, $quer);
    $data = mysqli_fetch_array($res);
    $user_age = $data['age'];
    $user_status = $data['status'];
    if ($user_status == 0) {
      $vote_ststus = "Not-Voted";
    } elseif ($user_status == 1) {
      $vote_ststus = "Voted";
    }


    if ($user_status == 0) {
      echo ' <div class="detail_div">
   
  <div class="image_name">
  <p> Name : ' . $_SESSION['username'] . ' </p>
   <img  src="photo/' . $_SESSION['citizennumber'] . '"/>

  </div>
  
  <p> Age : ' . $user_age . ' </p>
  <p> Citizenship Number : ' . $_SESSION['citizennumber'] . ' </p>
  <P>Status : ' . $vote_ststus . ' </P>
</div>';
      $repre_que = "SELECT * FROM `representataive`";
      $repre_que_result = mysqli_query($conn, $repre_que);
      $a = 0;

      while ($a != mysqli_num_rows($repre_que_result)) {
        $rep_data = mysqli_fetch_array($repre_que_result);
        echo '
<div class="representative">
<p>Symbol :' . $rep_data['Name'] . '</p>
<p>Vote Count:' . $rep_data['Votes'] . '</p>
<form class="form_page" action="vote.php" method="post">
<button name="des" value =' . $rep_data['id'] . '>Vote</button>
</form>
</div>';


        $a++;
      }
    } else {
      echo ' <div class="detail_div">
   
  <div class="image_name">
  <p> Name : ' . $_SESSION['username'] . ' </p>
   <img  src="photo/' . $_SESSION['citizennumber'] . '"/>

  </div>
  
  <p> Age : ' . $user_age . ' </p>
  <p> Citizenship Number : ' . $_SESSION['citizennumber'] . ' </p>
  <P>Status : ' . $vote_ststus . ' </P>
</div>';
      $repre_que = "SELECT * FROM `representataive`";
      $repre_que_result = mysqli_query($conn, $repre_que);
      $a = 0;

      while ($a != mysqli_num_rows($repre_que_result)) {
        $rep_data = mysqli_fetch_array($repre_que_result);
        echo '
<div class="representative">
<div> Symbol :' . $rep_data['Name'] . '</div>
<div>Vote Count:' . $rep_data['Votes'] . '</div>
<form class="form_page">
<button name="des" value =' . $rep_data['id'] . '>' . $vote_ststus . '</button>
</form>
</div>';


        $a++;
      }
    }
    ?>

    </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>