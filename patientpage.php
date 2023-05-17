<?php

include 'conection.php';

?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patient page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            font-family: 'Poppins', sans-serif, var(--cursive);
            ;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .container1 {
            width: 80%;
            margin: auto
        }

        .navbar {

            position: fixed;
            width: 100%;
            overflow: auto;
            background-color: lightblue;

        }

        div {
            display: block;
        }


        body {
            font-family: var(--cursive);
            background-image: url("patient.jpg");
            background-size: 15%;
            background-repeat: no-repeat;
            background-position: left;
        }

        .logo {
            font-family: var(--cursive);
            color: black;
            text-align: center;
            width: 100%;
            text-transform: capitalize;
            font-size: 30px;
            font-style: italic;

        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
        }

        .container .content {
            text-align: center;
        }

        .container .content h3 {
            font-size: 30px;
            color: #333;
        }

        .container .content h3 span {
            background: lightblue;
            color: #fff;
            border-radius: 5px;
            padding: 0 15px;
        }

        .container .content h1 {
            font-size: 50px;
            color: #333;
        }

        .container .content h1 span {
            color: lightblue;
        }

        .container .content p {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .container .content .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 20px;
            background: #333;
            color: #fff;
            margin: 0 5px;
            text-transform: capitalize;
        }

        .container .content .btn:hover {
            background: lightblue;
        }


        .form-container {
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
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
            ;
            color: #fff;
        }

        .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: black;
        }

        .form-container form p a {
            color: lightblue;
            ;
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
    <div class="header">
        <div class="navbar">
            <div class="container2">
                <div class="logo"> Hospital Managment System </div>
            </div>
        </div>

    </div>


    <div class="container">

        <div class="content">
            <br><br>
            <h3>hi, <span>patient</span></h3>
            <h1>welcome </h1>
            <p>this is an User patient page</p>

            <div class="form-container">

                <form action="" method="post">
                    <h3>which departmet do you want?</h3>

                    <input type="text" name="Doctorname" required placeholder="Enter the name of the doctor to book ">

                    <input type="text" name="Time" required placeholder="at what time do you prefer come">
                    <input type="submit" name="submit" value="Book the appointment" class="form-btn">

                </form>
            </div>
            <br>
            <a href="logout.php" class="btn">logout</a>
</body>

</html>