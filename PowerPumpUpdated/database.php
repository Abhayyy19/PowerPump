<html>
    <body>
        <?php
        $servername="localhost";
        $user="root";
        $pass='';

        $conn=new mysqli($servername,$user,$pass);

        if($conn->connect_error)
        {
            echo "Connection failed:".$conn->connect_error;
            exit();
        }
        echo '';
        $sql="CREATE DATABASE IF NOT EXISTS`PowerPumpValidation`";
        $dbname="PowerPumpValidation";
        if($conn->query($sql)){
            echo "";
        }
        else{
            echo "<br/>Could not create database:<br/>".$conn->error;
        }
        $servername="localhost";
        $user="root";
        $pass='';
        $dbname='PowerPumpValidation';
        $conn=new mysqli($servername,$user,$pass,$dbname);
        $sql="CREATE TABLE IF NOT EXISTS `FitnessFreaks`(id int(50),Username varchar(50),Email varchar(50),User_Password varchar(50),Login_Access varchar(50))";
        if($conn->query($sql)){
            echo "";
        }
        else{
            echo "<br/>Could not create table:<br/>".$conn->error;
        }
        $conn->close();
        ?>
    </body>
</html>