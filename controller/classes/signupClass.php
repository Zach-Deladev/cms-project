<?php

// Signup class to be extended by the signup controller
class Signup extends Database
{
    // function to insert user into database
    protected function insertUser($username, $discord, $password, $email)
    {

        // Prepare statement to insert user into database
        $stmt = $this->connection()->prepare("INSERT INTO users (username, disc_name, userpwd, useremail) VALUES (?, ?, ?, ?);");

        // Hash password 
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // If the statement fails to execute, redirect to the signup page with an error message
        if (!$stmt->execute(array($username, $discord, $hashedPassword, $email))) {
            $stmt = null;
            header("location: ../../signupP.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
        header("location: ../../index.php?error=none");
        exit();
    }

    // function to check if username or email already exists in database
    protected function checkUser($username, $email)
    {
        // Prepare statement to check if username or email already exists in database
        $stmt = $this->connection()->prepare("SELECT * FROM users WHERE username = ? OR useremail = ?;");

        // If the statement fails to execute, redirect to the signup page with an error message
        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../signupP.php?error=stmtfailed");
            exit();
        }

        $resultCheck = null;

        // If the statement returns 0 rows, the username and email are not in use
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        // Return the result
        return $resultCheck;
    }
}
