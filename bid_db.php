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
        
        $new_bid = $_POST["new_bid"]; 
        $p_id = $_POST["pid"];

        $sql = "UPDATE bid 
        SET t_id=" . $_SESSION['tid'] . ", bid= " . $new_bid . "
        WHERE p_id=$p_id";
        // bid (p_id, t_id, bid) values( '$p_name','$_SESSION['tid']' ,'$new_bid'  )";
        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
            header("Location: explore_products.php");
        } 
        else
        {
            echo "ERROR: Could not able to execute $sql. ";// . mysqli_error($link);            }
        }  
    }   
?>