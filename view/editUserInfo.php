<div>
    <div id="create-post">
        <form action="../../controller/formData/updateUser.php" method="POST" enctype="multipart/form-data" name="contactForm" class="form" id="updateForm" method="post">
            <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "error=emptyfields") == true) {
                echo "<h6 style='color: red;'>Fill in all fields!</h6>";
            } elseif (strpos($fullUrl, "error=invalidusername") == true) {
                echo "<h6 style='color: red;'>Username invalid</h6>";
            } elseif (strpos($fullUrl, "error=invalidemail") == true) {
                echo "<h6 style='color: red;'>Email Invalid </h6>";
            } elseif (strpos($fullUrl, "error=invalidpassword") == true) {
                echo "<h6 style='color: red;'>Invalid Password </h6>";
            }
            ?>
            <!-- Form for username -->
            <h3>Update your username</h3>
            <br>
            <h6><?php echo $_SESSION["username"] ?></h6>
            <input type="text" id="username" name="username" placeholder="Choose your username" />
            <button type="submit" name="submit_username" class="submit btn-success btn"> Save </button>
            <br>
    </div>
    <div id="create-post">
        <!-- Form for discord username -->
        <h3>Update your Discord username</h3>
        <br>
        <h6><?php echo $_SESSION["discord"] ?></h6>
        <input type="text" id="discord" name="discord" placeholder="Discord user name" />
        <button type="submit" name="submit_discord" class="submit btn-success btn"> Save </button>
        <br>
    </div>
    <div id="create-post">
        <!-- Form for email -->
        <h3>Update your email</h3>
        <br>
        <h6><?php echo $_SESSION["email"] ?></h6>
        <input type="text" id="email" name="email" placeholder="email" />
        <button type="submit" name="submit_email" class="submit btn-success btn"> Save </button>
        <br>
    </div>
    <div id="create-post">
        <!-- Form for password -->
        <h3>Update your password</h3>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="password" />
        <br>
        <button type="submit" name="submit_password" class="submit btn-success btn"> Save </button>
        </form>
    </div>
</div>