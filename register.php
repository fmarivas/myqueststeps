<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
  margin: 0;
  padding: 0;
  background: #f5f5f5;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.card {
  width: 400px;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  border-top: 4px solid #f6226f;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

input {
  padding: 10px;
  border: none;
  background-color: transparent;
  border-bottom: 1px solid #ccc;
  color: #333;
}

.buttons {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.login-button {
  padding: 10px 20px;
  background-color: #f6226f;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.register-button {
  padding: 10px 20px;
  background-color: #fff;
  color: #333;
  border: 1px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
}

@media (max-width: 480px) {
  .card {
    width: 100%;
    max-width: 300px;
  }
}
.wrapper{
    flex-direction:column;
    gap:30px;
}
    </style>
</head>
<body>
    <div class="container wrapper">
    <div class="card">
        <?php
        if(isset($_GET['status']) && $_GET['status']=='email'){
            ?>
                 <p class="text-danger text-center">Email is already registerd! Please <a href="index.php" class="text-danger">Login</a></p>
            <?php
        }
        if(isset($_GET['status']) && $_GET['status']=='password'){
            ?>
                 <p class="text-danger"><strong>OOPS!</strong> Password did  not matched</p>
            <?php
        }
                if(isset($_GET['status']) && $_GET['status']=='true'){
            ?>
                 <p class="text-success">Thank you for registration <a href="index.php">click here</a> for login</p>
            <?php
        }
        
        ?>
   
        <form action="" method="post">
            <input type="text" name="fname" placeholder="First Name" required>
            <input type="text" name="lname" placeholder="Last Name" required>

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
         <input type="password" name="cpassword" placeholder="Confirm password" required>
<br>
            <div class="buttons">
                <button type="submit" name="submit" class="login-button btn btn-danger">Sign Up</button>
            </div>
        </form>
    </div>

</div>
    <!--<div class="container mt-5">-->
    <!--    <div class="row justify-content-center">-->
    <!--        <div class="col-md-6">-->
    <!--            <h2>Login with Google</h2>-->
    <!--            <form action="login.php" method="post">-->
    <!--                <div class="form-group">-->
    <!--                    <button type="submit" class="btn btn-primary btn-block">Login with Google</button>-->
    <!--                </div>-->
    <!--            </form>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <?php
    if(isset($_POST['submit'])){
        extract($_POST);
        $date=date('Y-m-d');
        
        $SQL="SELECT * FROM `users` WHERE `email`='$email'";
        $res=mysqli_query($conn,$SQL);
        if(mysqli_num_rows($res)>0){
             echo "<script>window.location='register.php?status=email';</script>";

        }else{
            if($password==$cpassword){
                
                $Q="INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `status`, `date`,`source`) VALUES ('$fname','$lname','$email','$password','1','$date','Custom')";
                $re=mysqli_query($conn,$Q);
                if($re){
                    echo "<script>window.location='register.php?status=true';</script>";
        
                }
                
                
            }else{
                    echo "<script>window.location='register.php?status=password';</script>";

            }
                
            
        }

    }
    
    ?>
</body>
</html>
