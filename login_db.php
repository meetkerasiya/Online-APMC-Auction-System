<?php
session_start();  
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbConnect.php';   
    
    $user = $_POST["user"];
    $phno = $_POST["phno"];
    $password = $_POST["password"]; 

    
    if($user=="Farmer")
    {
        $_SESSION["user"] = $user;
        $sql = "SELECT * FROM farmer WHERE f_contact = '$phno' ";
        $result = mysqli_query($conn,$sql);
        $row=$result->fetch_assoc();
        if($row["password"] == $password) {
            $_SESSION['login_user'] = $phno;
            echo "login successful \n";
            echo session_name('login_user');
            $_SESSION["fid"]=$row["f_id"];
            header("Location: index.html");
        }
        else
        {
         $error = "Your Login Name or Password is invalid";
        }
    }
    elseif ($user=="Trader") 
    {
        $_SESSION["user"] = $user;
        $sql = "SELECT * FROM trader WHERE t_contact = '$phno' ";
        $result = mysqli_query($conn,$sql);
        $row=$result->fetch_assoc();
        if($row["password"] == $password) {
            $_SESSION['login_user'] = $phno;
            echo "login successful \n";
            echo session_name('login_user');
            $_SESSION["tid"]=$row["t_id"];
            header("Location: index2.html");

        }
        else
        {
         $error = "Your Login Name or Password is invalid";
        }
    }
}
    else
    {
       
    }


?>