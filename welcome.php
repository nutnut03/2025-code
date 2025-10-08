<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="logo"><a href="//www.facebook.com/search/top?q=merise%20english%20academy%20cebu"><img src="images/MeRISE-png.png"></a></div>
        <div class=" menu-toggle" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
         <div class="nav-links" id="navLinks">
            <a href="home.php">Home</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="welcome.php">Welcome</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>


    <!-- Welcome Box -->
    <div class="welcome-box">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['username']); ?> 🎉</h1>
        <p id="greeting"></p>
        <p id="clock"></p>
    </div>

    <script>
        const c = document.getElementById("clock"),
            g = document.getElementById("greeting");

        function updateClock() {
            let d = new Date();
            c.textContent = d.toDateString() + " • " + d.toLocaleTimeString();
        }

        function setGreeting() {
            let h = new Date().getHours();
            g.textContent = h < 12 ? "Good morning!" : h < 18 ? "Good afternoon!" : "Good evening!";
        }

        setGreeting();
        updateClock();
        setInterval(updateClock, 1000);
    </script>

    <!-- Images used to open the lightbox -->
    <div class="image-container">
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                    <img src="images/gadget.jpg" alt="Cinque Terre" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_forest.jpg">
                    <img src="images/gadget.jpg" alt="Forest" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_lights.jpg">
                    <img src="images/gadget.jpg" alt="Northern Lights" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_mountains.jpg">
                    <img src="images/gadget.jpg" alt="Mountains" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                    <img src="images/gadget.jpg" alt="Cinque Terre" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_forest.jpg">
                    <img src="images/gadget.jpg" alt="Forest" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_lights.jpg">
                    <img src="images/gadget.jpg" alt="Northern Lights" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="img_mountains.jpg">
                    <img src="images/gadget.jpg" alt="Mountains" />
                </a>
                <div class="desc">Business English</div>
            </div>
        </div>


        <div class="clearfix"></div>
    </div>

    <footer>
        <p>
            MeRISE English Academy 2025 ESY Building, Corner Juana Osmena St. Brgy.
            Kamputhaw, Cebu City Office Tel.No. - PLDT: (032) 345 8524 | Office
            Tel.No. - Globe: (032) 479 0414 Email us: academic_support@meriseinc.com
        </p>
    </footer>
</body>

</html>