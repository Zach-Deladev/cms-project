<?php

require_once "../../model/database-classes.php";
require_once "../classes/blogClass.php";
// Create blog controller class to handle the create blog form data and to be extended by the blog class

class CreateBlogCont extends Blog
{

    // Class properties
    private $userid;
    private $username;
    private $title;
    private $content;


    // Class constructor method to initialize the class properties with the values passed from the form data (blog.php)

    public function __construct($userid, $username, $title, $content)
    {
        $this->userid = $userid;
        $this->username = $username;
        $this->title = $title;
        $this->content = $content;
    }

    // Method to check if the form data is valid

    public function createBlogValidation()
    {
        // Check if any of the form fields are empty
        if ($this->emptyInput() === false) {
            header("location: ../../view/pages/social.php?error=emptyinput");
            exit();
        }

        // Insert blog into database
        $this->createBlog($this->userid, $this->username, $this->title, $this->content);
    }

    // Method to check if the form data is empty
    private function emptyInput()
    {
        if (empty($this->userid) || empty($this->title) || empty($this->content) || empty($this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return  $result;
    }
}
