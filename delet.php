<?php

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    require_once "conection.php";

    $sql = "DELETE FROM admin_form WHERE email = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        $param_email = trim($_POST["email"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: adminepage.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);
} else {
    if (empty(trim($_GET["email"]))) {
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
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
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="alert alert-danger">
                            
                            <input type="hidden" name="email" value="<?php echo trim($_GET["email"]); ?>" />
                            <p>Are you sure you want to delete this user record?</p>
                           
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">

                                <a href="adminepage.php" class="btn btn-secondary">NO</a>
                            </p>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>