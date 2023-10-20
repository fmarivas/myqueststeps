<?php
session_start();
include('config.php'); ?>
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
        if(isset($_GET['status']) && $_GET['status']=='false'){
            ?>
                 <p class="text-danger"><strong>OOPS! </strong>Email or Password incorrect</p>
            <?php
        }
        ?>
        <form action="" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="buttons">
                <a class="register-button" href="register.php">Register</a>
                <button type="submit" name="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
    <div class="card">
            <a href="login.php" class="btn btn-danger btn-block">Login with Google</a>

    </div>
</div>

    <?php
    if(isset($_POST['submit'])){
        extract($_POST);
        $Q="SELECT * FROM `users` WHERE `email`='$email'";
        $re=mysqli_query($conn,$Q);
        if(mysqli_num_rows($re)>0){
            $row=mysqli_fetch_assoc($re);
            if(empty($row['password']) && $row['source']=='google'){
                
            }else{
                if($row['password']==$password){
                    session_start();
                    $_SESSION['user']=$row;
                    if($row['role']=='0'){
                        echo "<script>window.location='dashboard.php'</script>";
                    }else{
                        echo "<script>window.location='admin/admin.php'</script>";
                    }
                    
                }else{
                    echo "<script>window.location='index.php?status=false'</script>";
                }
            }
        }else{
             echo "<script>window.location='index.php?status=false'</script>";
        }
    }
    
    ?>
</body>
</html>
