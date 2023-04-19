<?php

require_once '../../model/database-classes.php';

class Update extends Database
{
    // Update user profile
    public function updateUser($username, $discord, $email, $password, $userid)
    {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("UPDATE users SET username = ?, disc_name = ?, useremail = ?, userpwd = ? WHERE userid = ?");

        // If the statement fails to execute, redirect to the settings page with an error message
        if (!$stmt->execute(array($username, $discord, $email, $hashed_password, $userid))) {
            header("location: ../../view/pages/settings.php?error=stmtfailed");
            exit();
        }

        // Update the session variable with the new username
        $_SESSION['username'] = $username;
        header("location: ../../view/pages/settings.php?success=updated");
        exit();
    }

    // Update the user's username
    public function updateUsername($username, $userid)
    {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("UPDATE users SET username = ? WHERE userid = ?");

        // If the statement fails to execute, redirect to the settings page with an error message
        if (!$stmt->execute(array($username, $userid))) {
            header("location: ../../view/pages/settings.php?error=stmtfailed");
            exit();
        }

        // Update the session variable with the new username
        $_SESSION['username'] = $username;
    }

    // Update the user's discord username
    public function updateDiscord($discord, $userid)
    {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("UPDATE users SET disc_name = ? WHERE userid = ?");

        // If the statement fails to execute, redirect to the settings page with an error message
        if (!$stmt->execute(array($discord, $userid))) {
            header("location: ../../view/pages/settings.php?error=stmtfailed");
            exit();
        }
    }

    // Update the user's email
    public function updateEmail($email, $userid)
    {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("UPDATE users SET useremail = ? WHERE userid = ?");

        // If the statement fails to execute, redirect to the settings page with an error message
        if (!$stmt->execute(array($email, $userid))) {
            header("location: ../../view/pages/settings.php?error=stmtfailed");
            exit();
        }
    }

    // Update the user's password
    public function updatePassword($password, $userid)
    {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $this->connection()->prepare("UPDATE users SET userpwd = ? WHERE userid = ?");

        // If the statement fails to execute, redirect to the settings page with an error message
        if (!$stmt->execute(array($hashed_password, $userid))) {
            header("location: ../../view/pages/settings.php?error=stmtfailed");
            exit();
        }
    }
}
