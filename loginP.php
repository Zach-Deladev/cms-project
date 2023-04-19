<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/assets/style.css">
    <link rel="stylesheet" href="./view/assets/dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    <link rel=“stylesheet” href=“https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>

</head>

<body>
    <div style="min-height: 75vh;" class="container">
        <?php include_once './view/navbar.php'; ?>
        <form action="./controller/formData/login.php" method="POST" enctype="multipart/form-data" name="loginForm" class="form" id="loginForm" method="post">
            <br>
            <h3>Login</h3>
            <!-- error element -->
            <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "error=emptyinput") == true) {
                echo "<h6 style='color: red;'>Fill in all fields!</h6>";
            } elseif (strpos($fullUrl, "error=wronglogin") == true) {
                echo "<h6 style='color: red;'>Incorrect login details!</h6>";
            } elseif (strpos($fullUrl, "error=stmtfailed") == true) {
                echo "<h6 style='color: red;'>An error occured </h6>";
            } elseif (strpos($fullUrl, "error=wronglogindetails") == true) {
                echo "<h6 style='color: red;'>Check username and /or password </h6>";
            }

            ?>
            <h3 style="color: red;" id="errorElement"></h3>
            <!-- EMAIL -->
            <label for="username">User name:</label>
            <br>
            <input type="text" id="loginUsername" name="loginUsername" placeholder="user name" />
            <br>
            <!-- PASSWORD -->
            <label for="password">Password:</label>
            <br>
            <input type="password" id="loginPassword" name="loginPassword" placeholder="password" />
            <br>
            <div class="modal-btn">
                <button type="submit" name="submit" class="submit btn-success btn"> Login </button>

            </div>

            <br>
        </form>
    </div>
    <?php include_once './view/footer.php'; ?>
</body>

</html>