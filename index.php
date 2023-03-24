<?php
include 'database.php';
session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $UserRole=$_POST['UserRole'];

    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);

    $sql=" SELECT * FROM `UserRecords` WHERE email='$email' AND  epassword='$password' AND UserRole='$UserRole' ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0)
    {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['username']=$row['username'];
        {
            if($UserRole=="user")
            {
                header("Location: UserPage.php");
            }
            else
            {
                header("Location: AdminPage.php");
            }
        }
    }
    else
    {
        echo " <script>alert('Email or Password is Incorrect!')</script> ";
    }

    if($password==$cpassword)
    {
        $sql="SELECT * FROM `UserRecords` WHERE email='$email' AND epassword='$password' AND UserRole='$UserRole' ";
        $result=mysqli_query($conn, $sql);
        if(!$result->num_rows>0)
        {
            $sql="INSERT INTO `UserRecords`(Username, Email, epassword, UserRole)
            VALUES ('$username', '$email', '$password', '$UserRole') ";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "<script>alert('User Registration Successful!')</script>";
                $username="";
                $email="";
                $UserRole="";
                $_POST['password']="";
                $_POST['cpassword']="";
            }
            else
            {
                echo "<script>alert('Something Went Wrong!')</script>";
            }
        }
        else
        {
            echo "<script>alert('Password Does not Match')</script>";
        }
    }
}
?>

<!-- UI For Login Page -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #7d2ae8;
  padding: 30px;
  
}
.container{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}
.container .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}
.container #flip:checked ~ .cover{
  transform: rotateY(-180deg);
}
 .container .cover .front,
 .container .cover .back{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.cover .back{
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover::before,
.container .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #7d2ae8;
  opacity: 0.5;
  z-index: 12;
}
.container .cover::after{
  opacity: 0.3;
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container .cover .text{
  position: absolute;
  z-index: 130;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #7d2ae8;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box #ip2{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #7d2ae8;
}
.form-content .input-box i{
  position: absolute;
  color: #7d2ae8;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #5b13b9;
}
.forms .form-content label{
  color: #5b13b9;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container #flip{
  display: none;
}
@media (max-width: 730px) {
  .container .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container #flip:checked ~ .forms .login-form{
    display: none;
  }
}
    </style>

</head>
<body>
<div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/gym1.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/gym2.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id="ip" type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
              <i class="fas fa-envelope"></i>
                <select id="ip2" name="UserRole" value="<?php echo $UserRole; ?>" placeholder="Select User Role" required>
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                </select>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input id="ip" type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input ip="ip" type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="number" name="phone" placeholder="Enter your number" required>
              </div>
              <!--<div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id="ip" type="text"  name="City" placeholder="Enter your city" required>
              </div>-->

              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id="ip" type="text"  name="country" placeholder="Enter your country" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <select id="ip2" name="UserRole"  value="<?php echo $UserRole; ?>">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                </select>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input id="ip" type="password" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input id="ip" type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm Password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>