<?php

if (isset($_POST["submit"])) {

    // Assign data from signup form to variables to be used in the signup controller
    $username = $_POST["username"];
    $discord = $_POST["discord"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Includes database, signup controller and controller classes
    require_once "../../model/database-classes.php";
    require_once "../classes/signupClass.php";
    require_once "../signupCont.php";

    // Create new signup object and pass the form data to the constructor in the signup controller =
    $signup = new SignupCont($username, $discord, $email, $password, $confirmPassword);

    // Call userSignup method
    $signup->userSignup();

    header("location: ../index.php?error=none");
}
