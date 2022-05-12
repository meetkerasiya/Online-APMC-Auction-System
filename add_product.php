<?php
session_start(); 
?>
<?php
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'dbConnect.php';   
    $fid = $_SESSION["fid"];
    $p_name = $_POST["p_name"]; 
    $msp = $_POST["msp"];
    $path = $_FILES['photo'];

    $mimer = new \Mimey\MimeTypes();
    $mimetype = $mimer->getMimeType(pathinfo($path,PATHINFO_EXTENSION));
    $source = file_get_contents($path);
    $base64 = base64_encode($source);

    $sql = "INSERT INTO product (f_id, p_name, p_msp, p_img) values('$fid', '$p_name', '$msp', '{$base64}'  )";
    if(mysqli_query($conn, $sql))
    {
    echo "Records inserted successfully.";
    } 
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    }
    
    
?>