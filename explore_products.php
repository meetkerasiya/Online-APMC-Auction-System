<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        .container {
            border: 1px solid black;
            width: 650px;
            height: 250px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 5px;
            border-radius: 2px;
        }

        .product_detail {
            width: 200px;
            height: 100%;
            border: 1px solid black;
            border-radius: 2px;
        }

        .img {
            width: 100%;
            height: 50%;
            border-bottom: 1px solid black;
        }

        table {
            width: 100%;

        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            border-radius: 2px;
        }

        th {
            height: 35px;
            text-transform: uppercase;
            background-color: rgb(237, 236, 236);

        }

        td img {
            text-align: center;
            max-height: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <th>Farmer Name</th>
                <th>Product name</th>
                <th>Product Photo</th>
                <th>Current Bid Price</th>
            </tr>
            <tr>
                <td>mitesh</td>
                <td>kapas</td>
                <td><img src="" alt="kapas"></td>
                <td>100</td>
            </tr>
        </table>

    </div>
</body>

</html> -->


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore products</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        .container {
            border: 1px solid black;
            width: 650px;
            height: 250px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 5px;
            border-radius: 2px;
        }

        .product_detail {
            width: 200px;
            height: 100%;
            border: 1px solid black;
            border-radius: 2px;
        }

        .img {
            width: 100%;
            height: 50%;
            border-bottom: 1px solid black;
        }

        table {
            width: 100%;
            color: white;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            border-radius: 2px;
        }

        th {
            color:black;
            height: 35px;
            text-transform: uppercase;
            background-color: rgb(237, 236, 236);

        }

        td img {
            text-align: center;
            max-height: 150px;
        }

        #place_bid{
            color:white;
            text-transform: uppercase;
            background-color: rgb(28, 208, 28);
            border:none;
            padding:5px
        }
    </style>

</head>

<body>

    <?php 

    include 'dbConnect.php'; 

    $sql = "SELECT  f_name, p_name, product.p_id, p_img, bid FROM farmer INNER JOIN product INNER JOIN bid WHERE farmer.f_id=product.f_id AND product.p_id=bid.p_id
    ";
    $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row

    print "<div><table><tr> <th>Farmer Name</th> ";
    print "<th>Product name</th>";
    print "<th>Product Photo</th>";
    print "<th>Current Bid Price</th>";
    print "<th>my bid</th>";
    print "</tr>";
    print "<form action='bid_db.php' method='POST'>";
  while($row = $result->fetch_assoc()) {
    $b = $row["p_id"];
    print "<tr><td> ";
    print $row["f_name"];
    print "</td><td>";
    print $row["p_name"]; 
    print "</td><td>";
    print '<img src="data:image/jpeg;base64,'.base64_encode($row['p_img']).'"/>'; 
    print "</td><td>";
    print $row["bid"]; 
    print "</td><td><table><tr><td>";
    print "<input type='text' name='new_bid'>";
    print "<input type='hidden' value='". $b ."' name='pid'>";
    print "</td><td>";
    print "<input type='submit' id='place_bid' value='place-bid'>";
    print "</td></tr></table></td></tr>";
  }
  print "</form></table></div>";
  
} else {
  echo "0 results";
}
$conn->close();
?>


<script>
        //Username validation

        $('#name').keyup(function () {
            validname();
        });

        function validname() {
            let cnameValue = $('#name').val();
            var reg_name = /^[a-zA-Z]+$/;
            if (!cnameValue.match(reg_name)) {
                alert("**Please enter valid name");
                return false;
            } 

            else if ((cnameValue.length < 3) || (cnameValue.length > 20)) {
                alert("**length of username must be greater than 3");
                return false;
            }

            else {
            }
        }

        // phone number validation

        $('#phnnum').keyup(function () {
            validphone();
        });

        function validphone() {
            let cphoneValue = $('#ctcphone').val();
            var reg_phn = /^[0-9]{10}$/;
            if (cphoneValue.length == '') {
                alert("**Please enter Phone number");
                return false;
            } else if (!cphoneValue.match(reg_phn)) {
                alert("**Must be Enter valid phone number");
                return false;
            }
            else {
            }
        }

        // address validation
        $('#address').keyup(function () {
            validadd();
        });

        function validadd() {
            let cfeedValue = $('#ctcfeed').val();
            if (cfeedValue.length > 100) {
                alert("**Maximum 100 words");
                return false;
            }
            else {
            }
        }
    </script>
</body>

</html>