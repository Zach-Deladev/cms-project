<?php

//  Login controller class to handle the login form data and 
class LoginCont extends Login
{
    // Class properties
    private $username;
    private $password;

    // Class constructor method to initialize the class properties with the values passed from the form data (login.php)
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    // Method to check if the any of the form fields are empty, if not call the getUser method from the Login class
    public function userLogin()
    {
        if ($this->emptyInput() === false) {
            header("location: ../loginP.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    //  Method to check if the any of the form fields are empty
    private function emptyInput()
    {
        $result = null;
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
