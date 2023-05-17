<?php

@include 'conection.php';

session_start();

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['Username']);
    $number = mysqli_real_escape_string($conn, $_POST["Number"]);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['psw']);
    $cpass = md5($_POST['psw-repeat']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM admin_form WHERE email = '$email' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('location:adminepage.php');

        } elseif ($row['user_type'] == 'patient') {

            $_SESSION['patient_name'] = $row['name'];
            header('location:patientpage.php');

        } elseif ($row['user_type'] == 'doctor') {

            $_SESSION['doctor_name'] = $row['name'];
            header('location:doctorpage.php');

        }

    } else {
        $error[] = 'incorrect email or password!';
    }

}
;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Form</title>

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: #eee;
        }

        .form-container form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 500px;
        }

        .form-container form h3 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input,
        .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .form-container form select option {
            background: #fff;
        }

        .form-container form .form-btn {
            background: lightblue;
            color: black;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .form-container form .form-btn:hover {
            background: lightblue;

            color: #fff;
        }

        .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: black;
        }

        .form-container form p a {
            color: lightblue;

        }

        .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: lightblue;
            ;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">

        <form action="" method="post">
            <h3> Log In </h3>
            
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>

            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
           
            <input type="submit" name="submit" value="LOG IN " class="form-btn">
            <p>don't have an account? <a href="signup.php">Sign up</a></p>
        
        </form>

    </div>

    <body>

</html>