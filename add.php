<?php

include 'conection.php';



if (isset($_POST['done'])) {

    $name = "";
    $number = "";
    $email = "";
    $pass = "";
    $type = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $input_name = trim($_POST["name"]);

        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        } else {
            $name = $input_name;
        }

        $input_number = trim($_POST["number"]);
        if (empty($input_number)) {
            $number_err = "Please enter a number.";
        } else {
            $number = $input_number;
        }

        $input_email = trim($_POST["email"]);
        if (empty($input_email)) {
            $email_err = "Please enter an email .";
        } else {
            $email = $input_email;
        }

        $input_pass = trim($_POST["password"]);
        if (empty($input_pass)) {
            $pass_err = "Please enter a password .";
        } else {
            $pass = $input_pass;
        }

        $input_type = trim($_POST["user_type"]);
        if (empty($input_type)) {
            $type_err = "Please enter a user type .";
        } else {
            $type = $input_type;
        }







        if (empty($name_err) && empty($number_err) && empty($email_err) && empty($pass_err) && empty($type_err)) {
            $sql = "INSERT INTO admin_form (name, number, email ,password ,user_type) VALUES (?, ?, ?,?,?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_number, $param_email, $param_pass, $param_type);

                $param_name = $name;
                $param_number = $number;
                $param_email = $email;
                $param_pass = $pass;
                $param_type = $type;
                if (mysqli_stmt_execute($stmt)) {
                    header("location: adminpage.php");
                    exit();
                } else {
                    echo "Something went wrong. Please try again later.";
                }
            }

            mysqli_stmt_close($stmt);
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

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
            color: red;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }
    </style>

</head>

<body>

    <div class="form-container">

        <form action="adminepage.php" method="post" >
            <h3>Add New User</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>

            <input type="text" name="name" required placeholder="enter user name">
            <input type="text" name="number" required placeholder="enter user number">
            <input type="email" name="email" required placeholder="enter user email">
            <input type="password" name="password" required placeholder="enter user password">
           
            <select name="user_type">
                <option value="admin">Admin</option>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
            </select>

            <input type="submit" name="done" value="Add " class="form-btn">



        </form>

    </div>

</body>

</html>