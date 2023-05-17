<?php

@include 'conection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            font-family: 'Poppins', sans-serif, var(--cursive);

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
            background-image: url("doctor.jpg");
            background-size: 15%;
            background-repeat: no-repeat;
            background-position: left;
        }

        .logo {
            font-family: var(--cursive);
            color: black;

            width: 100%;
            text-transform: capitalize;
            font-size: 30px;
            font-style: italic;
            text-align: center;

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
            <h3> Hi, <span> Doctor</span></h3>
            <h2> Welcome <span>
                </span></h2>
            <p>This is an user Doctor page</p>

            <div class="form-container">

                <form action="" method="post">
                    <h2>Can you accept this appointment?</h2>

                    <input type="text" name="Day" required placeholder="what's Day you avalible in ?">
                    <input type="text" name="Time" required
                        placeholder="What is the patient time that I will available at?">

                    <input type="submit" name="submit" value="Confirm acceptance of the appointment" class="form-btn">

                </form>
            </div>
            <br>
            <a href="logout.php" class="btn">logout</a>
</body>

</html>