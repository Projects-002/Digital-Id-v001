<?php

include('../database/db.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="height: 100vh;">
    <div class="container d-flex align-items-center justify-content-center flex-column" style="height: 130vh;"> 
      <?php





if(isset($_POST['add'])){


  $f_name = $_POST['f-name'];
  $l_name = $_POST['l-name'];
  $reg_no  = $_POST['reg-no'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];




    try{

   $sql = "INSERT INTO users( First_Name, Last_Name, Reg_No, Email, Pass)
              VALUE('$f_name', '$l_name', '$reg_no', '$email', '$pass')";
      $result= mysqli_query($conn,$sql);
      echo'
      <div class="alert alert-success" role="alert">
        User Added Successfully! <a href="index.php" class="btn btn-warning"> Back Home</a>
      </div>
        ';
      }catch(mysqli_sql_exception){
        echo'
        <div class="alert alert-warning" role="alert">
          User Already Exist
         </div>
        ';
      }



}



?>

        <div class="container text-center mb-4">
            <h1>Adding User</h1>
        </div>

        <form action="add.php" method="POST" class="w-50">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="floatingInput" name="f-name" placeholder="First Name" required>
                <label for="floatingInput">First Name</label>
              </div>
              <div class="form-floating mb-4">
                <input type="text" class="form-control" id="floatingPassword" name="l-name" placeholder="Last Name" required>
                <label for="floatingInput">Last Name</label>
              </div>
              <div class="form-floating mb-4">
                <input type="text" class="form-control" id="floatingPassword" name="reg-no" placeholder="Registration Number" required>
                <label for="floatingInput">Registration Number</label>
              </div>
              <div class="form-floating mb-4">
                <input type="email" class="form-control" id="floatingPassword" name="email" placeholder="Email Address" required>
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-4">
                <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="User Password" required>
                <label for="floatingPassword">Password</label>
              </div>

                <input type="submit" name="add" class="form-control btn btn-warning" value="Add User">
        </form>


        <style>
           
           body{
            background-image: url('img/back.jpg');
           }


           form{
            backdrop-filter: blur(10px);
            background-color: rgba(240, 255, 255, 0.564);
            padding: 2rem;
            border-radius: 2rem 0;
            transition: all .5s ease-in-out;
           }


           form:hover{
            border-radius: 0 2rem;
           }

        </style>


    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>