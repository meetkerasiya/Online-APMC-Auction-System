<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbConnect.php';   
    
    $user = $_POST["user"]; 
    $name = $_POST["name"];
    $phno = $_POST["phno"];
    $addr = $_POST["addr"];
    $password = $_POST["password"]; 
    
   
    if($user=="Farmer")
    {
        $sql = "INSERT INTO farmer (f_name, f_contact, f_address, password) values('$name', '$phno', '$addr', '$password'  )";
        if(mysqli_query($conn, $sql)){
            header("Location: login.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    else
    {
        $sql = "INSERT INTO trader (t_name, t_contact, t_address, password) values('$name', '$phno', '$addr', '$password'  )";
        if(mysqli_query($conn, $sql)){
            header("Location: login.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            header("Location: signup.php");
        }
    }
   
    
}//end if   
    
?>