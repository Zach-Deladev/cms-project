<?php

if (isset($_POST["submit"])) {

    // Assign data from login form to variables
    $username = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];



    // Includes signup class and controller
    require_once "../../model/database-classes.php";
    require_once "../classes/loginClass.php";
    require_once "../loginCont.php";

    // Create new Login object
    $login = new LoginCont($username, $password);

    // Call userLogin method
    $login->userLogin();

    header("location: ../index.php?error=none");
}
