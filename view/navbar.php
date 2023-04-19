<nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="./view/assets/imgs/ebl-logo.png" alt=""></a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>





                <!-- if user logged in add logout button  -->
                <?php if (isset($_SESSION['username'])) {
                    // button that displays user name and linkes to profile page    
                    echo '<li class="nav-item">
                        <a class="nav-link" href="./view/pages/dashboard.php">' . $_SESSION['username'] . '</a> 
                    </li>';
                    // logout button
                    echo '<li class="nav-item">
                        <a class="nav-link" href="./controller/logout.php">Logout</a>
                    </li>';
                } else {

                    // if user not logged in add login button
                    echo ' <!-- if user not logged in add login button  -->
                    <li class="nav-item ">
                        <a class="nav-link login-btn" href="./loginP.php" >Login</a>
                    </li>';

                    // if user not logged in add signup button top open signup modal
                    echo '<li class="nav-item ">
                        <a class="nav-link signup-btn" href="./signupP.php" >Signup</a>        
                    </li>';
                } ?>

            </ul>
        </div>
    </div>
</nav>