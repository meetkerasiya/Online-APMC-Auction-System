<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Products</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            color: white;
            font-size: 20px;
        }

        div {
            position: absolute;
            left: 50%;
            top: 20%;
            transform: translate(-50%, -50%);
        }

        table {
            width: 900px;
            height: auto;
            border: 2px solid white;
        }

        tr th {
            padding:5px;
            height:50px;
            align-items: center;
            border: 1px solid white;
            margin: 0 auto;
        }

        tr td {
            padding:5px;
            height: 35px;
            border: 1px solid white;
            text-align: center;
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

    print "<div><table><tr> <th>Product Name</th> ";
    print "<th>MSP</th>";
    print "<th>Current Bid</th>";
    print "<th>Sell?</th>";
    print "</tr>";
    print "<form action='bid_db.php'>";
  while($row = $result->fetch_assoc()) {

    print "<tr><td> ";
    print $_SESSION["user"]; 
    print "</td><td>";
    print $row["f_name"]; 
    print "</td><td>";
    print $row["f_contact"]; 
    print "</td><td>";
    print "<input type='button' value=". $a .">"; 
    print "</td></tr>";
  }
  print "</form></table></div>";
  
} else {
  echo "0 results";
}
$conn->close();
?>

</body>

</html>