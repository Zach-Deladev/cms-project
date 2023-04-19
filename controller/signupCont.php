<?php

// Sign up controller class to handle the sign up form data and to be extended by the signup class 
class SignupCont extends Signup
{

    // Class properties
    private $username;
    private $discord;
    private $email;
    private $password;
    private $confirmPassword;

    // Class constructor method to initialize the class properties with the values passed from the form data (signup.php)
    public function __construct($username, $discord, $email, $password, $confirmPassword)
    {
        $this->username = $username;
        $this->discord = $discord;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    // Method to check if the form data is valid

    public function userSignup()
    {
        // Check if any of the form fields are empty
        if ($this->emptyInput() === false) {
            header("location: ../../signupP.php?error=emptyinput");
            exit();
        }
        // Check if the username is valid
        if ($this->userInvalid() === false) {
            header("location: ../../signupP.php?error=invalidusername");
            exit();
        }

        // Check if the discord is valid
        if ($this->discordInvalid() === false) {
            header("location: ../../signupP.php?error=invaliddiscord");
            exit();
        }
        // Check if the email is valid
        if ($this->emailInvalid() === false) {
            header("location: ../../signupP.php?error=invalidemail");
            exit();
        }
        // Check if the password is valid
        if ($this->passwordInvalid() === false) {
            header("location: ../../signupP.php?error=invalidpassword");
            exit();
        }
        // Check if the password and the confirm password are the same
        if ($this->passwordMatch() === false) {
            header("location: ../../signupP.php?error=passwordsdontmatch");
            exit();
        }
        // Check if the username or the email already exists in the database
        if ($this->userTaken($this->username, $this->email) === false) {
            header("location: ../../signupP.php?error=usernametaken");
            exit();
        }

        // Insert user into database
        $this->insertUser($this->username, $this->discord, $this->password, $this->email);
    }

    // Method to check if any of the form fields are empty
    private function emptyInput()
    {
        $result = null;
        if (empty($this->username) || empty($this->discord) || empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the username is valid (only letters and numbers)
    private function userInvalid()
    {
        $result = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the discord is valid (only letters, numbers and #)
    private function discordInvalid()
    {
        $result = null;
        if (!preg_match("/^[A-Za-z0-9]+#[0-9]{4}$/", $this->discord)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the email is valid
    private function emailInvalid()
    {
        $result = null;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the password is valid (at least 8 characters, at least one uppercase letter, at least one number)
    private function passwordInvalid()
    {
        $result = null;
        if (!preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/", $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the password and the confirm password are the same
    private function passwordMatch()
    {
        $result = null;
        if ($this->password !== $this->confirmPassword) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Method to check if the username or the email already exists in the database
    private function userTaken()
    {
        $result = null;
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
