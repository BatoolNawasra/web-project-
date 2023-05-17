<?php

if (isset($_GET["email"]) && !empty(trim($_GET["email"]))) {

    require_once "conection.php";


    $sql = "SELECT * FROM admin_form WHERE email = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $param_email);


        $param_email = trim($_GET["email"]);


        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


                $name = $row["name"];
                $number = $row["number"];
                $email = $row["email"];
                $pass = $row["password"];
                $type = $row["user_type"];
           
            } else {

                header("location: error.php");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    mysqli_stmt_close($stmt);


    mysqli_close($conn);
} else {

    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <p><b>
                                <?php echo $row["name"]; ?>
                            </b></p>
                    </div>

                    <div class="form-group">
                        <label>Number</label>
                        <p><b>
                                <?php echo $row["number"]; ?>
                            </b></p>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <p><b>
                                <?php echo $row["email"]; ?>
                            </b></p>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <p><b>
                                <?php echo $row["password"]; ?>
                            </b></p>
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <p><b>
                                <?php echo $row["user_type"]; ?>
                            </b></p>
                    </div>

                    <p><a href="adminepage.php" class="btn btn-primary"> Back </a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>