<div class="hero-cnt text-secondary px-4 py-5 text-center">

    <div class="hero-tent py-5">



        <h1 class="display-5 fw-bold text-white">EBL - Esports Boxing League</h1>
        <div class="col-lg-6 mx-auto">
            <p class="hero-p  mb-4">Welcome to the EBL - Esports Boxing League, the ultimate competitive platform for the Undisputed boxing game, where gamers can unite for high-octane virtual matchups and socialise.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="./signupP.php" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Sign up!</a>
                <a href="./loginP.php" type="button" class="btn btn-outline-light btn-lg px-4">Login</a>
            </div>

        </div>
        <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "error=none") == true) {
            echo "<h5 style='color: green; padding-top: 10px;'>Thanks for signing up! <br> please log in.</h5>";
        }
        ?>
        <div class="overlay"></div>
    </div>


</div>