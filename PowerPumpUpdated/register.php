<?php
include 'database.php';

include 'insert.php';
error_reporting(0);
   
if(isset($_POST['submit'])){
   $username=$_POST['Username'];
   $email=$_POST['Email'];
   $password=md5($_POST['User_Password']);
   $cpassword=md5($_POST['Confirm_User_Password']);
   $erole=$_POST['Login_Access'];

   if($password == $cpassword){
        $sql="SELECT * FROM `FitnessFreaks` WHERE Email='$email' AND User_Password='$password' AND Login_Access='$erole' ";
        $result= mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO `FitnessFreaks`(Username,Email,User_Password,Login_Access)
            VALUES ('$username','$email','$password','$erole')";
     $result=mysqli_query($conn,$sql);
     if($result){
         echo "<script>alert('User Registration Successful!')</script>";
         $username="";
         $email="";
         $erole="";
         $_POST['User_Password']="";
         $_POST['Confirm_User_Password']="";
     } else {
         echo "<script>alert('Something Went Wrong!')</script>";
     }
    }else{
        echo "<script>alert('Email Already Exists.')</script>";
    }
    }else{
       echo "<script>alert('Password Does not Match')</script>";
   }
}
?>
<html>
<head>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background: url("4.jpg");
                background-position:center;
            }
            div.container{
            
            margin: 80px;
            margin-left: 450px;
            }
            p{
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
            }
            div.register{
            padding-left: 20px;
            padding-bottom: 10px;
            background-color: rgba(0,0,0,0.5);
            width: 400px;
            font-size: 20px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 2px 2px 15px
            rgba(0,0,0,0.3);
            color: #fff;
            }
            #ip{
            height: 25px;
        }
        .input-group{
            width: 200px;
        }
        #ip2{
            width: 173px;
            height: 25px;
        }
        .input-group{
            color:cornsilk;
        }


        </style>
    </head>
    <body>
        <div class="container">
            <div class="register">
            <form class="login-email" action="" method="POST">
                <p class="login-text">Register</p>
                <div class="input-group">
                <label style="font-size: 15px;">Username</label>
                    <input id="ip" type="text"  name="Username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Email</label>
                    <input id="ip" type="email"  name="Email" value="<?php echo $email; ?>" required>
                </div>

                <div class="input-group">
                <label style="font-size: 15px;">Phone</label>
                    <input type="number" name="phone" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Date of birth</label>
                    <input id="ip" type="date"  name="date" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">City</label>
                    <input id="ip" type="text"  name="City" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">State</label>
                    <input id="ip" type="text"  name="State" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Country</label>
                    <input id="ip" type="text"  name="country" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Select Access Type</label><br>
                    <select id="ip" name="Login_Access"  value="<?php echo $erole; ?>">
                        <option selected value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="input-group">
                <label style="font-size: 15px;">Password</label>
                    <input id="ip" type="password" name="User_Password" value="<?php echo $_POST['User_Password']; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Confirm Password</label>
                    <input id="ip" type="password"  name="Confirm_User_Password" value="<?php echo $_POST['Confirm_User_Password'] ?>" required>
                </div>
                <div class="input-group">
                    <button style="color: darkorchid;" name="submit" class="btn">Register</button>
                </div>    
                <p class="login-register-text">Already have an account?<a href="index.php">Login Here</a></p>
            </form>
            </div>
        </div>
    </body>
</html>