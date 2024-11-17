<?php

session_start();
if(!isset($_SESSION['user'])){
    header('location: index.php');
}


include('../database/db.php');

          $id = $_GET["updateid"];

          $sql ="SELECT * FROM `users` where SN = $id";

          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $sn = $row['SN'];
          $f_name = $row['First_Name'];
          $l_name = $row['Last_Name'];
          $Reg_No = $row['Reg_No'];
          $Email = $row['Email'];
          $Pass = $row['Pass'];
          $reg_date = $row['Reg_Date']; 


          // SN
          // First_Name
          // Last_Name
          // Reg_No
          // Email
          // Pass 1
          // U_Role
          // Reg_Date

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="p-update.css">
</head>
<body>
  <div class="container"> 
       

        <h1 class="title">Updating</h1>
        <b class="user"><?php echo $f_name;?></b>
        <b class="user"><?php echo $l_name;?></b>
     <a href="view.php" class = "home-btn"><button>Back</button></a>  


    <!-- Form start -->
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  
            <!-- Inputs element start -->
            <div class="inputs">
                <!-- parent-1 -->
                  <div class="parent parent-1">
                          <div class="sn sect">
                              <label for="">SN</label>
                              <input type="text" name="sn" value="<?php echo$sn; ?>">      
                           </div>
                
                          
                            <div class="fn sect">
                                <label for="">First_Name</label>
                                <input type="text" name="f-name" value="<?php echo$f_name; ?>">                
                            </div>

                            <div class="ln sect">
                                <label for="">Last_Name</label>
                                <input type="text" name="l-name" value="<?php echo$l_name; ?>">
                            </div>
                   </div> 
                  
                <!-- parent-2 -->
                <div class="parent parent-2">
                      <div class="rn sect">
                          <label for="">Registration</label>
                          <input type="text" name="reg-no" value="<?php echo$Reg_No; ?>">                  
                      </div>

                      <div class="ls sect">
                          <label for="">Email Address</label> 
                          <input type="text" name="email" value="<?php echo$Email; ?>">
                    </div>

                      <div class="c sect">
                          <label for="">Password</label>
                          <input type="text" name="pass" value="<?php echo$Pass; ?>">                  
                      </div>
                </div>         
                
            </div>
            <!-- Inputs element End -->
          
            <div class="update sect">
            <input type="submit" name="update" value="Update">
            </div>       
    </form>
    <!-- Form End -->
  </div>
</body>
</html>


<?php

if(isset($_POST['update'])){

          $Sn = $_POST['sn'];
          $First_name = $_POST['f-name'];
          $Last_name = $_POST['l-name']; 
          $Email = $_POST['email'];
          $reg = $_POST['reg-no'];
          $Pass = $_POST['pass'];

          
          // First_Name
          // Last_Name
          // Reg_No
          // Email
          // Pass 1
          // U_Role
          // Reg_Date



          $sql = "UPDATE users  set SN = $sn,
           First_Name = '$First_name', Last_Name = '$Last_name', Reg_No = '$reg', Email = '$Email',
              Pass = '$Pass'  where SN = $id";
      

      try{
           mysqli_query($conn, $sql);
           echo"<script> alert('User updated Successfully')</script>";
       }catch(mysqli_sql_exception){
              echo"<script> alert('Duplicate Entry')</script>";

       }
          
   }
      
   

?>