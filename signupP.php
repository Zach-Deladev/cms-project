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

    <?php include_once './view/navbar.php'; ?>
    <div style="min-height: 75vh;" class="container">
        <form action="./controller/formData/signup.php" method="POST" enctype="multipart/form-data" name="contactForm" class="form" id="signupForm" method="post">
            <br>
            <h3>Get involved!</h3>

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
            } elseif (strpos($fullUrl, "error=invaliddiscord") == true) {
                echo "<h6 style='color: red;'>Discord name format yourname#1111 </h6>";
            } elseif (strpos($fullUrl, "error=invalidpassword") == true) {
                echo "<h6 style='color: red;'>Password needs to be alphanumeric,include one uppercase letter and one number. </h6>";
            }


            ?>

            <!-- label for user name -->
            <label for="username">User name:</label>
            <br>
            <input type="text" id="username" name="username" placeholder="Choose your username" />
            <br>
            <!-- label for discord user name -->
            <label for="discord">Discord user name: example yourname#6382 </label>
            <br>
            <input type="text" id="discord" name="discord" placeholder="Discord user name" />
            <br>
            <!-- email -->
            <label for="email">Email:</label>
            <br>
            <input type="text" id="email" name="email" placeholder="email" />
            <br>
            <!-- password -->
            <label for="password">Password:</label>
            <br>
            <input type="password" id="password" name="password" placeholder="password" />
            <br>
            <!-- confirm password -->
            <label for="confirmPassword">Confirm password:</label>
            <br>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="confirm password" />
            <br>
            <div class="modal-btn"> <button type="submit" name="submit" class="submit btn-success btn"> Sign up </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            <br>
        </form>
    </div>
    <?php include_once './view/footer.php'; ?>
</body>

</html>