<?php

include('../database/db.php');


$sql = "SELECT * FROM users";
$feed = mysqli_query($conn, $sql);
$row = mysqli_num_rows($feed);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center">
      <div class="container mt-5">
        <h1 class="text-center">Users In the Database</h1>
      </div>
    <table class="table table-striped table-bordered mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Registration</th>
            <th scope="col">Email</th>
            <th scope="col">Reg_Date</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>


        <?php

         while($rows = mysqli_fetch_assoc($feed)){

                 $SN = $rows['SN'];
                 $f_name = $rows['First_Name'];
                 $l_name = $rows['Last_Name'];
                 $Reg_No = $rows['Reg_No'];
                 $Email = $rows['Email'];
                 $Reg_Date = $rows['Reg_Date'];

                echo'
                  <tr>
                    <td scope="row">'.$SN.'</td>
                    <td>'.$f_name.'</td>
                    <td>'.$l_name.'</td>
                    <td>'.$Reg_No.'</td>
                    <td>'.$Email.'</td>
                    <td>'.$Reg_Date.'</td>
                    <td class="operations">
                        <a href="update.php? updateid='.$SN.'" class="update-btn"><button class="update">Update</button></a>
                        <a href="delete.php? deleteid='.$SN.'"><button class="delete">Delete</button></a>
                    </td>   
                  </tr>
                
                ';
              }

            ?>
        </tbody>
      </table>
    </div>


      <!-- Boostrap Js -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>