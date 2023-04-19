<?php

session_start();

require_once '../classes/updateClass.php';

// Get the user ID from the session
$userid = $_SESSION['userid'];

// Check if form submitted
if (isset($_POST['submit_username'])) {
    // Get the new username from the form data
    $username = $_POST['username'];

    // Validate the username
    if (empty($username) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../../view/pages/settings.php?error=invalidusername");
        exit();
    }

    // Update the user's username in the database
    $update = new Update();
    $update->updateUsername($username, $userid);

    // Update the session variable with the new username
    $_SESSION['username'] = $username;

    // Redirect the user back to the settings page with a success message
    header("location: ../../view/pages/settings.php?success=updated");
    exit();
}

// Check which form was submitted
if (isset($_POST['submit_discord'])) {
    // Get the new discord username from the form data
    $discord = $_POST['discord'];

    // Validate the discord username
    if (empty($discord)) {
        header("location: ../../view/pages/settings.php?error=emptyfields");
        exit();
    }

    // Update the user's discord username in the database
    $update = new Update();
    $update->updateDiscord($discord, $userid);

    // Redirect the user back to the settings page with a success message
    header("location: ../../view/pages/settings.php?success=updated");
    exit();
}

// Check which form was submitted
if (isset($_POST['submit_email'])) {
    // Get the new email from the form data
    $email = $_POST['email'];

    // Validate the email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../../view/pages/settings.php?error=invalidemail");
        exit();
    }

    // Update the user's email in the database
    $update = new Update();
    $update->updateEmail($email, $userid);

    // Redirect the user back to the settings page with a success message
    header("location: ../../view/pages/settings.php?success=updated");
    exit();
}

// Check which form was submitted
if (isset($_POST['submit_password'])) {
    // Get the new password from the form data
    $password = $_POST['password'];

    // Validate the password
    if (empty($password) || !preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/", $password)) {
        header("location: ../../view/pages/settings.php?error=invalidpassword");
        exit();
    }

    // Update the user's password in the database
    $update = new Update();
    $update->updatePassword($password, $userid);

    // Redirect the user back to the settings page with a success message
    header("location: ../../view/pages/settings.php?success=updated");
    exit();
}
