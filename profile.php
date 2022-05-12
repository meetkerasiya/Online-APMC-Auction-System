<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    color:white;
    font-size:20px;
    }
    div{
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }
    table{
      width:900px;
      height:300px;
      border:2px solid white;
    }
    tr th{
      width:500px;
      align-items:center;
      border:1px solid white;
      margin: 0 auto;
    }
    tr td{
      width:300px;
      height:20px;
      border:1px solid white;
      text-align:center;
    }

  </style>
</head>
<body>
    
<?php 

    include 'dbConnect.php'; 

    $sql = "SELECT f_name, f_contact, f_address FROM farmer where f_contact='".$_SESSION["login_user"]."'";
    $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    print "<div><table><tr> <th> Login as</th><td> ";
    print $_SESSION["user"]; 
    print "</td> </tr><tr> <th>Full name</th><td>";
    print $row["f_name"]; 
    print "</td> </tr><tr> <th>Phone number</th><td>";
    print $row["f_contact"]; 
    print "</td> </tr><tr> <th>Address</th><td>";
    print $row["f_address"]; 
    print "</td> </tr></table></div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>