<?php
    include_once 'connect.php';
    session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];
            $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'"; 
            $result =mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            if($row > 0){
                $_SESSION["username"]=$row['username'];
                $_SESSION["password"]=$row['password'];
                header('location:index.php');
            } else{
                $_SESSION["Error"]="<p class='text-danger'>Login Not Connect<br>Can you try Username and Password</p>";
                header('location:login.php');
            }
            mysqli_close($con);
?>
