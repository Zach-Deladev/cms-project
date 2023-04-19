<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/dash.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel=“stylesheet” href=“https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 dash-nav bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-center  pt-2 text-white min-vh-100">
                    <div class="dropdown pb-4">

                        <div class="dash-logo align-items-center ">
                            <img src="../assets/imgs/avatar.png" alt="avatar" class="rounded-circle">
                        </div>

                        <a id="dash-user" href="#" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                            <span style="margin: auto; font-size: 1.4rem;" class="d-none d-sm-inline "><?php echo "<strong>" . $_SESSION['username'] .  "</strong>" ?></span>
                        </a>

                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 " id="menu">

                        <li>
                            <a href="./profile.php" id="profile" class="nav-link px-0 align-middle">
                                <img class="dash-icon" src="../assets/icons/user.png" alt="user profile"> <span class="ms-1 d-none d-sm-inline">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="./social.php" id="social" class="nav-link px-0 align-middle">
                                <img class="dash-icon" src="../assets/icons/social.png" alt="social feed"> <span class="ms-1 d-none d-sm-inline">Social</span>
                            </a>
                        </li>
                        <li>
                            <a href="./rankings.php" id="social" class="nav-link px-0 align-middle">
                                <img class="dash-icon" src="../assets/icons/record.png" alt="social feed"> <span class="ms-1 d-none d-sm-inline">Rankings</span>
                            </a>
                        </li>

                    </ul>
                    <hr>
                    <a id="dash-settings" class="btn btn-primary" style="position: absolute; bottom: 40px;" href="./settings.php">Settings</a>
                    <a id="dash-signout" class="btn btn-danger" style="position: absolute; bottom: 0;" href="../../controller/logout.php">Sign out</a>
                </div>
            </div>
            <div id="dashcontainer" class="col py-3">


                <?php include '../editUserInfo.php'; ?>
            </div>
        </div>



</body>

</html>