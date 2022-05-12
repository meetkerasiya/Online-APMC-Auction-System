<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        .container {
            width: 610px;
            position: absolute;
            left: 35%;
            top: 10%;
            transform: translate(-50%, -50%);
            display: block;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            display: block;
        }

        button {
            text-transform: uppercase;
            width: 150px;
            height: 40px;
            border-radius: 2px;
            border: none;
            margin: 20px 10px;
            color: white;
            background-color: rgb(28, 208, 28);
            transition: 0.5s;
        }

        button:hover {

            background-color: rgb(23, 183, 23);
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }

        input {
            padding: 5px;
            margin: 20px auto;
            outline: none;
            height: 20px;
        }

        input[type=text] {
            height: 30px;
            font-size: 20px;
            padding: 5px;
        }

        input[type=submit] {
            width: 200px;
            height: 35px;
            color: white;
            background-color: rgb(28, 208, 28);
            font-size: 20px;
            border: none;
            padding: 5px;
        }

        input[type=file] {
            height: 30px;
        }

        .add_items {
            height: 450px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: none;
            width: 500px;
            border: 1px solid white;
            box-shadow: 1px 1px 2px 1px grey;
            font-size: 20px;
            margin: auto;
            padding: 10px;
        }

        .close-btn {
            position: absolute;
            right: 20px;
            top: 15px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <button onclick="popup()">add item</button>
    </div>

    <div class="add_items">
        <div onclick="popup()" class="close-btn">
            ×
        </div>
        <form action="add_product.php" method="GET">
            <input type="text" name="p_name" id="name" placeholder="Product name" required><br>
            <input type="text" name="msp" id="msp" placeholder="Product MSP" required><br>
            Add photo:<input type="file" name="photo" placeholder="Add photo" required>
            <input type="submit" value="add item">
        </form>
    </div>


    <script>

        function popup() {
            $(".add_items").toggle();
        }

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

        $('#msp').keyup(function () {
            validphone();
        });

        function validphone() {
            let cphoneValue = $('#msp').val();
            var reg_phn = /^[0-9]{10}$/;
            if (cphoneValue.length == '') {
                alert("**Please enter MSP");
                return false;
            } else if (!cphoneValue.match(reg_phn)) {
                alert("**Must be Enter valid MSP");
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
            let cfeedValue = $('#address').val();
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