
<?php
$status=0;
if(isset($_GET['status'])){
    $status =$_GET['status'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid main_cont">

    <?php include "navbar.php";
   
    require "database_con.php";
    if($status==1){
        echo '<div class="alert alert-success" role="alert">
  Your registration has been completed go to login page to vote!
</div>';
    }else if($status==2){
    echo '
    <div class="alert alert-danger" role="alert">
 Please enter the same password !
</div>
    ';
    }elseif($status==3){
      echo '
      <div class="alert alert-danger" role="alert">
   User with same citizen-ship already registered !
  </div>
      ';

    }elseif($status==4){
      echo '
      <div class="alert alert-danger" role="alert">
   Please upload a photo !
  </div>
      ';
    }
    ?>
    </div>
    <div class="container-fluid inner_cont">
        <div class="top_des">
        <h1 id=>ARE YOU NEW HERE ! <span id="lets">
        LET'S GET STARTED !
        </span></span> </h1>
        </div>
        
    <div class="innerdiv col-6">
  <form action="register.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name :</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password :</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm-Password :</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age :</label>
    <input type="number" name="age" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Citizenship-no :</label>
    <input type="number" name="cit_no" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Photo :</label>
    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

 </div>
   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
