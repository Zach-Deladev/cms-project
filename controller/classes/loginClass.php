<?php

// Login class to get the user data from the database and to be extended by the login controller class
class Login extends Database
{

    // function to get the user data from the database
    protected function getUser($username, $password)
    {
        // Prepare statement to get the user data from the database
        $stmt = $this->connection()->prepare("SELECT userpwd FROM users WHERE username = ? OR useremail = ?;");

        // If the statement fails to execute, redirect to the login page with an error message
        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: ../loginP.php?error=stmtfailed");
            exit();
        }

        // If the statement returns 0 rows, redirect to the login page with an error message
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../../loginP.php?error=wronglogin");
            exit();
        }

        // Get the hashed password from the database
        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Verify the password entered by the user with the hashed password from the database
        $checkpassword = password_verify($password, $hashedPassword[0]['userpwd']);

        // If the password is incorrect, redirect to the login page with an error message
        if ($checkpassword == false) {
            $stmt = null;
            header("location: ../../loginP.php?error=wronglogindetails");
            exit();
        }
        // If the password is correct, get the user data from the database and start a session
        else if ($checkpassword == true) {

            // Prepare statement to get the user data from the database 
            $stmt = $this->connection()->prepare("SELECT * FROM users WHERE username = ? OR useremail = ? AND userpwd = ?;");

            // If the statement fails to execute, redirect to the login page with an error message
            if (!$stmt->execute(array($username, $username, $hashedPassword[0]['userpwd']))) {
                $stmt = null;
                header("location: ../loginP.php?error=stmtfailed");
                exit();
            }

            // If the statement returns 0 rows, redirect to the login page with an error message
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../loginP.php?error=usernotfound");
                exit();
            }

            // fetch the user data from the database
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Start a session and set the session variables
            session_start();
            $_SESSION['userid'] = $user[0]['userid'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['email'] = $user[0]['useremail'];
            $_SESSION['discord'] = $user[0]['disc_name'];
            $_SESSION['wins'] = $user[0]['wins'];
            $_SESSION['losses'] = $user[0]['losses'];
            $_SESSION['draws'] = $user[0]['draws'];



            // Close the statement and redirect to the profile page
            $stmt = null;
            header("location: ../../view/pages/profile.php?user=" . $_SESSION['username']);
            exit();
        }
    }
}
