<html>
    <body>
        <?php

        //CREATING DATABASE (userValidation)

        $servername="localhost";
        $user="root";
        $pass='';

        $conn=new mysqli($servername, $user, $pass);

        if($conn->connect_error)
        {
            echo "Connection failed!".$conn->connect_error;
            exit();
        }
        echo '';
        $sql="CREATE DATABASE IF NOT EXISTS`userValidation`";
        $dbname="userValidation";
        if($conn->query($sql))
        {
            echo "";
        }
        else
        {
            echo " <br/>Unable to create database!<br/> ".$conn->error;
        }

        //CREATING CONNECTION 

        $servername="localhost";
        $user="root";
        $pass='';
        $dbname='userValidation';

        $conn=mysqli_connect($servername, $user, $pass, $dbname);
        if(!$conn)
        {
            die("<script>alert('Connection failed')</script>");
        }

        //CREATING TABLE (UserRecords)

        $servername="localhost";
        $user="root";
        $pass='';
        $dbname='userValidation';

        $conn=new mysqli($servername, $user, $pass, $dbname);
        $sql="CREATE TABLE IF NOT EXISTS `UserRecords` (Id int(50), Username varchar(50), Email varchar(50), UserRole varchar(50) )";
        if($conn->query($sql))
        {
            echo "";
        }
        else
        {
            echo "<br/>Unable to create table!<br/>".$conn->error;
        }
        $conn->close();
        ?>
    </body>
</html>

