<?php
session_start();
if(!isset($_SESSION['Username'])){
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <style>
        *{
            
            margin: 0;
            padding: 0;
        }
        #sidebar{
            position: fixed;
            width: 15%;
            height: 100%;
            background-color:#121227;
        }
        #sidebar li{
            color: black;
            font-size: 20px;
            padding:30px;
            border-bottom: 1px solid gray;
            text-align: center;
        }
        .toogle-btn{
            position: absolute;
            left: 105%;
            top: 15px;
        }
        #sidebar .nav:hover{
            background-color: maroon;
            transition: 0.5s;
            letter-spacing: 4px;
            text-transform: uppercase;
        }
        a{
            color: white;
        }
        .image{
            
            flex-basis: 40%
        }
        h1,h2{
            text-align: center;
        }
        .container{
            display: flex;           
            padding: 8px;
            text-align: center;
            justify-content: center;
           align-items: center;
            margin-right: 250px;
        }
        *{
            list-style: none;

        }
        .skill li{
            margin: 20px 0;
        
        }
        .bar{
            background: #353b48;
            display:block;
            height: 20px;
            border: 1px solid rgba(0,0,0,0.3);
            border-radius: 10px;
            overflow: hidden;
        
                    
        }   
        .bar span{
            height: 20px;
            float: left;
            background: linear-gradient(135deg,rgba(236,0,140,1)0%,rgba(252,103,103,1)100%);

        }
        .html{
            width:90%;
            animation:html 3s;
        }
        .css{
            width:70%;
            animation:css 3s;
        }
        .php{
            width:50%;
            animation:php 3s;
        }
        .javascript{
            width:90%;
            animation: html 3s;
        }
        .skill{
            margin-bottom: 100px;
        }
        button{
            border-radius: 12px;
            background:#121227;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: right;
            margin-left: 1200px;
        }

    </style>

</head>
<body>

    <div id="sidebar">
        <div class="toogle-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li style="background-color:black; color:turquoise; font-size: 20px; letter-spacing: 5px;">PACIFIC</li>
            <li class="nav"><a href="#">Profile</a></li>
        </ul>
    </div>
    
    <h1 style="background-color:darkblue; color: white; height: 85px; font-size: 60px; letter-spacing: 5px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Employee Details</h1>
    <br><br>
    <div class="container" >
        
        <div class="col">
            <figure style="text-align: right; " class="image">
            <img src="user.png" width="300px">
            <br><br>
            <figcaption>
            <h1 ><?php echo $_SESSION['Username']; ?></h1>
            <h3 style="color:darkgray; text-align: center;">PACIFIC EMPLOYEE</h3>
            </figcaption>
            </figure>    
        </div>  
        <div style="display: inline-block; padding-left: 20px;"> 
        <table border="0.5" style="font-size: 25px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
    
        <tr><td >Login Type:</td><td>Admin</td></tr>
            <tr><td>Full Name:</td><td><?php echo $_SESSION['Username']; ?></td></tr>
        </table>
        <div class="skill">
            <li><h3>html</h3>
            <span class="bar"><span class="html"></span></span>
        </li>
        <li><h3>CSS</h3>
            <span class="bar"><span class="css"></span></span>
        </li>
        <li><h3>PHP</h3>
            <span class="bar"><span class="php"></span></span>
        </li>
        <li><h3>JavaScript</h3>
            <span class="bar"><span class="javascript"></span></span>
        </li>
        </div> 
    </div>
</section>
    </div>
    <center><button type="button" style="font-size:20px; padding:10px;"><a href="logout.php">Logout</a></button></center>
</body>
</html>