# RESTful API with CRUD functionality – By Zach Delapenha

## CONTENTS

1. INTRODUCTION
2. MODEL
   - Database Scheme
   - Database Connection
3. VIEW

   - Pages
   - components

4. CONTROLLER
   - Signup
   - Login
   - Blog

## INTRODUCTION

In this assignment, I was tasked to create an CMS to consume a minimal front end application with full CRUD functionality accross the site.

## MODEL - Manages Data and Business Logic

### 1. Database Scheme

This database is very simple, it holds a users table in which the users information can be stored and a blog table where user's blog posts can be stored linked to them by their ID.

![Erd diagram](./view/assets/readimg/erd.png)

#### Table Definitions:

users:

- userid (Primary Key, int)\
- username (varchar)\
- disc_name (varchar)\
- userpwd (varchar)\
- useremail (varchar)\
- wins (int)\
- losses (int)\
- draws (int)\
- created (datetime)

blog:

- id (Primary Key, int)\
- userid (Foreign Key references users.userid, int)\
- title (varchar)\
- content (text)\
- date (date)\
- time (time)\
- username (Foreign Key references users.username, varchar)

#### Column Defintions:

users:

- userid: Unique identifier for each user in the system.\
- username: Unique username for each user.\
- disc_name: Discord name for the user.\
- userpwd: Encrypted password for user login.\
- useremail: Email address for the user.\
- wins: Number of wins the user has.\
- losses: Number of losses the user has.\
- draws: Number of draws the user has.\
- created: Date and time when the user account was created.

blog:

- id: Unique identifier for each blog post.\
- userid: Foreign key referencing the user who created the blog post.\
- title: Title of the blog post.\
- content: Content of the blog post.\
- date: Date when the blog post was created.\
- time: Time when the blog post was created..\
- username: Foreign key referencing the username of the user who created the blog post.

### 2. Database Connection

My database-classes.php file holds the Database class. This establishes a connection to the database and allows me to easily reuse the connection by calling the getConnection() function in other files.

## VIEW - Handles Layout and Display

### 1. Pages

#### Home page

The main aim of this page is to allow users to sign up and login to the site. It also allows users to view blog posts from other users.

#### Signup page

The signup page allows users to create an account on the site. It has a form that requires the user to enter a username, discord name, password, and email address. The form also has a submit button that sends the data to the signup.php file.

The signup.php file receives the POST data and stores it in variables. It then creates a new SignupCont object and pasess the form data to the constructor in the signup controller class.

The signupCont class then validates each field to make sure it is not empty and matches the form validation requirements. If all the fields are valid then the insertUser function is called and the user is added to the database. If any of the fields are invalid then the form will not submit and the user will be prompted to fix the errors.

The errors message are inserted into an error element div in the form, I achieved this by checking the url for the error message and then displaying the error message in the form. like this:

    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "error=emptyinput") == true) {
        echo "<h6 style='color: red;'>Fill in all fields!</h6>";
        } elseif (strpos($fullUrl, "error=wronglogin") == true) {
            echo "<h6 style='color: red;'>Incorrect login details!</h6>";
        } elseif (strpos($fullUrl, "error=stmtfailed") == true) {
            echo "<h6 style='color: red;'>An error occured </h6>";
        } elseif (strpos($fullUrl, "error=wronglogindetails") == true) {
            echo "<h6 style='color: red;'>Check username and /or password </h6>";
        }

This was a very simple way to display the error messages and I will be using this method in the future.

#### Login page

#### Profile page

#### Social page

#### Settings page

### 2. Components

## Controller - Routes commands to the model and view

### 1. Signup

Once the data request is received the adduser.php file decodes the JSON and stores the user data into variables.
It then creates a new instance of database and the user class.
The file then checks to see if the email received from the form matches any email in the database and throws an error if so. If there user is not already in the database then a new users is created.

### 2. Login

When the dom loads the tabledata.php creates a database connection and then selects all data from the database and renders it into a table.

### 3. Blog

The update.php file receives the POST data and stores it. It the creates an empty errors array. After this it checks to see if any of the fields were empty or do not match to the form validation requirements if there is any errors it stores them to the $errors array.
If there are no errors then the data is set in the user object and updated in the database.
If there is errors then the error messages are returned to the handleFormSubmission function to handle the errors and the user will not be updated.
