<?php

@include 'conection.php';

if (isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($conn, $_POST["UserName"]);
    $number = mysqli_real_escape_string($conn, $_POST["Number"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = md5($_POST["psw"]);
    $cpass = md5($_POST["psw-repeat"]);

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $ext = explode(".", $file_name);
    $extention = end($ext);
    $array_extention = array("png", "jpg", "jpeg", "PNG", "JPG", "JPEG");
   

    if (!in_array($extention, $array_extention)) {
        $error[] = 'Extention not allow!!! just jpg or png or jpeg';
    }

    




    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM admin_form WHERE email = '$email' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO admin_form(name, number, email, password,user_type,image) VALUES('$name','$number','$email','$pass','$user_type','$file_name')";
            $sql = mysqli_query($conn, $insert);

            header('location:login.php');

            if ($sql) {

                $move = move_uploaded_file($file_tmp, "../images/$file_name");
                if ($move) {
                    echo "succses";
                }
            }

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
            background-color: white;
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




        .cancelbtn,
        .signupbtn {
            float: left;
            width: 50%;
        }


        .container {
            padding: 16px;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: #474e5d;
            padding-top: 50px;
        }


        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 50%;
        }


        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }


        .clearfix::after {
            text-align: center;
            content: "";
            clear: both;
            display: table;
        }

        .error-msg {
            margin: 10px 0;
            display: block;
            background: lightblue;
            ;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }


        @media screen and (max-width: 300px) {

            .cancelbtn,
            .signupbtn {
                width: 100%;
            }
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
    </style>
</head>

<body>
    <div>
        <span onclick="document.getElementById('id01').style.display='none'" title="Close Modal">&times;</span>
        <form class="modal-content" action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <center>
                    <h1>Sign Up</h1>
                </center>

                <p>Fill This Form To Create An Account, Please... </p>
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

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                <br> <br>

                <select name="user_type">
                    <option value="admin">Admin</option>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <input type="submit" name="submit" value="SIGN UP" class="signupbtn">
                    <br>
                    <br>

                    <p>already have an account? <a href="login.php" style="color:dodgerblue"> Login Now</a></p>
                </div>
        </form>
    </div>
    <script>
        var modal = document.getElementById('id01');


        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>