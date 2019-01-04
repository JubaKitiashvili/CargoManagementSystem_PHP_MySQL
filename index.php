<?PHP
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IAI-Cargo Management System</title>
    <?PHP
        include("src/style.php");
    ?>
</head>
<body>
    <main>
        <header>
            <div id = "top-nav">
                <ul>
                    <li class = "nav-link1"><a href = "#about">About</a></li>
                    <li class = "nav-link1"><a href = "#services">Services</a></li>
                    <li class = "nav-link1"><a href = "#contact">Contact</a></li>
<?PHP
    if(isset($_SESSION['fname'])){
        echo '<li class = "nav-link1"><a href = "yourPanel.php" style = "color: yellow;">Hello ' . $_SESSION['fname'] .'</a></li>';
        echo '<a href = "logout.php">Log out</a>';
    } else if(isset($_SESSION['admin'])){
        echo '<li class = "nav-link1" style = "color: yellow;"><a href = "adminpanel.php">Hello ' . $_SESSION['admin'] .'</a></li>';
        echo '<a href = "logout.php">Log out</a>';
    } else {
        echo '<li class = "nav-link1" style = "color: yellow;"><a href = "login.php">Log in</a></li>';
    }
?>
                </ul>
            </div>
            <div id = "nav">
                    <a href = "index.php"><img src = "images/iac.png"  class = "nav-logo"/></a>
                <ul>
                    <li class = "nav-link"><a href = "index.php">Home</a></li>
                    <li class = "nav-link"><a href = "cargo.php">Shipping</a></li>
                    <li class = "nav-link"><a href = "trackOrders.php">Tracking</a></li>
                </ul>
            </div>
                <!--Dito yung maganda mong slideshow teh-->
            <div id="imageSlider">
                <div id="container fade">
                    <img src="images/imgSlider1.png" class="display">
                    <img src="images/imgSlider2.png" class="display">
                    <img src="images/imgSlider3.png" class="display">
                    <img src="images/imgSlider4.png" class="display">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <script>
                var slideIndex = 0;
                showSlides();

                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("display");
                    var dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    setTimeout(showSlides, 2000); // Change image every 2 seconds
                }
            </script>
        </header>
        <article>
            <div id = "about">
                <center>
            </span>
                <h2>About Us</h2>
                <p>Island Aviation, Inc. takes pride in having well-trained and highly skilled pilots and maintenance personnel who are regularly trained in Germany. It has a competent and experienced management team assisted by staff who are among the most qualified in the industry.</p>
                <a href = "about.php">Read More</a>
            </center>   
            </div>
            <div id = "services">
                <h2 style="text-align: center;">Our Services</h2>
                <div class = "services-container">
                    <div class = "air-charter">
                        <h3>Air Charter</h3>
                        <p>IAIs undisputed safety record provides its customers peace of mind and confidence that they will reach their destinations safely and swiftly.</p>
                        <a href = "services.php">Read More</a>
                    </div><br>
                    <div class = "battery-shop">
                        <h3>Battery Shop</h3>
                        <p>IAIs battery shop currently offers the following services: top charge, capacity test, deep cycle and overhaul.</p>
                        <a href = "services.php">Read More</a>
                    </div>
                </div><br>
            </div>
            <div id = "contact">
                <h2>Contact Us</h2>
                <p>A. Soriano Hangar, Andrews Ave., <br>Pasay City, Metro Manila, Philippines<br>(632) 852-0507, (632) 833-3855, (632) 831-5328</p>
            </div>
        </article>
        <br>
    </main>
    <footer>
        <p>&copy; Copyright 2018</p>
        <p>HardCode</p>
    </footer>
</body>
</html>