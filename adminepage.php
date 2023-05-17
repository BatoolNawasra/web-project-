<?php
include 'conection.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

        .navbar1 {

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
            background-image: url('admine.jpg');
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
            align-items: flex-start;
            justify-content: left;
            padding: 20px;
            padding-bottom: 60px;
            margin-bottom: 0;
            margin-left: 0;
        }

        .container .content {
            text-align: center;
            margin-top: 50px;
            margin-left: 0;

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

        .table {
            margin-left: 30%;
            margin-right: 30%;
        }

        body {
            font-size: 19px;
        }

        table {
            width: 50%;
            margin: 30px auto;
            border-collapse: collapse;
            text-align: left;
        }

        tr {
            border-bottom: 1px solid #cbcbcb;
        }

        th,
        td {
            border: none;
            height: 30px;
            padding: 2px;
        }

        tr:hover {
            background: #F5F5F5;
        }

        form {
            width: 45%;
            margin: 50px auto;
            text-align: left;
            padding: 20px;
            border: 1px solid #bbbbbb;
            border-radius: 5px;
        }

        .input-group {
            margin: 10px 0px 10px 0px;
        }

        .input-group label {
            display: block;
            text-align: left;
            margin: 3px;
        }

        .input-group input {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
        }

        .edit_btn {
            text-decoration: none;
            padding: 2px 5px;
            background: #2E8B57;
            color: white;
            border-radius: 3px;
        }

        .del_btn {
            text-decoration: none;
            padding: 2px 5px;
            color: white;
            border-radius: 3px;
            background: #800000;
        }

        .msg {
            margin: 30px auto;
            padding: 10px;
            border-radius: 5px;
            color: #3c763d;
            background: #dff0d8;
            border: 1px solid #3c763d;
            width: 50%;
            text-align: center;
        }

        .wrapper {
            width: 600px;
            margin: 0 auto;
            margin-top: 0;
        }

        table tr td:last-child {
            width: 120px;
        }

        .table {
            position: static;
            margin-left: 0;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>

<body>
    <div class="header">
        <div class="navbar1">
            <div class="container2">
                <div class="logo"> Hospital Managment System </div>
            </div>
        </div>

    </div>

    <div class="container">

        <div class="content">
            <h3> Hi, <span> Admin</span></h3>
            <h1> Welcome </h1>
            <p> This is Admine page</p>
            <br>
            <a href="logout.php" class="btn"> LogOut </a>

        </div>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left"> Users Details </h2>
                            <a href="signupform.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add
                                New User</a>
                        </div>


                        <?php

                        require_once "conection.php";


                        $sql = "SELECT * FROM admin_form";
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Name</th>";
                                echo "<th>Number</th>";
                                echo "<th>Email</th>";
                                echo "<th>Password</th>";
                                echo "<th>image</th>";
                                echo "<th>User Type</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['number'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>"; ?> <img src="<?php echo $row["image"]; ?>" height="100" width="100">
                                    <?php echo "</td>";
                                    echo "<td>" . $row['user_type'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="read.php?email=' . $row['email'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                    echo '<a href="update.php?email=' . $row['email'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="delet.php?email=' . $row['email'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                mysqli_free_result($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }


                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>