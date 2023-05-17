<?php
@include 'conection.php';

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["UserName"]);
    $number = mysqli_real_escape_string($conn, $_POST["Number"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $pass = md5($_POST["psw"]);
    $cpass = md5($_POST["psw-repeat"]);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM customer_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO customer_form(name, number, email,time, password ,user_type) VALUES('$name','$number','$email','$time','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }

}
;

?>


<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: var(cursive--), Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }



        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }


        input[type=text]:focus,
        input[type=password]:focus,
        input[type=email]:focus,
        input[type=number]:focus {
            background-color: #ddd;
            outline: none;
        }



        /* Set a style for all buttons */
        input[type=submit] {

            background-color: lightblue;
            color: black;
            font-size: medium;
            padding: 14px 20px;
            margin-left: 150px;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            float: center;
        }

        button:hover {
            opacity: 1;

        }



        /* Float :cancel and signup buttons and add an equal width */
        .cancelbtn,
        .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 50%;
            /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Close Button (x) */



        /* Clear floats */

        .clearfix::after {
            text-align: center;
            content: "";
            clear: both;
            display: table;
        }

        div .modal-contect .container,
        select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        div .modal-contect .container select option {
            background: #fff;
        }

        div .modal-contect .container .error-msg {
            margin: 10px 0;
            display: block;
            background: lightblue;
            ;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {

            .cancelbtn,
            .signupbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="container2">
                <div class="logo"> Hospital Managment System </div>
            </div>
        </div>
    </div>


    <div>
        <span onclick="document.getElementById('id01').style.display='none'" title="Close Modal">&times;</span>
        <form class="modal-content" action="" method="post">
            <div class="container">
                <center>
                    <h1>Sign Up</h1>
                </center>
                <center>
                    <h3>"Patient"</h3>
                </center>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                    ;
                }
                ;
                ?>

                <label for="name"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="UserName" required>

                <label for="number"><b>phone Number</b></label>
                <input type="number" placeholder="Enter Number" name="Number" required>

                <label for="email"><b>E-mail</b></label>
                <input type="email" placeholder="Enter E-mail" name="email" required>

                <label for="location"><b>Location</b></label>
                <input type="text" placeholder="Enter Location" name="location" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <select name="user_type">
                    <option value="customer">customer</option>
                </select>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <input type="submit" name="submit" value="SIGN UP" class="signupbtn">
                    <br>
                    <br>

                    <p>already have an account? <a href="login.php" style="color:dodgerblue">login now</a></p>
                </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>