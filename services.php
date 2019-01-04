<?PHP
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <?PHP
        include("src/style.php");
    ?>
</head>
<body>
    <header>
        <div id = "top-nav">
            <ul>
                <li class = "nav-link1"><a href = "about.php"><i class="fa fa-info">About</i></a></li>
                <li class = "nav-link1"><a href = "services.php">Services</a></li>
                <li class = "nav-link1"><a href = "contact.php"><i class="a fa-phone">Contact</i></a></li>
<?PHP
    if(isset($_SESSION['fname'])){
        echo '<li class = "nav-link1"><a href = "yourPanel.php" style = "color: yellow;">Hello ' . $_SESSION['fname'] .'</a></li>';
        echo '<a href = "logout.php">Log out</a>';
    } else if(isset($_SESSION['admin'])){
        echo '<li class = "nav-link1" style = "color: yellow;">Hello ' . $_SESSION['admin'] .'</li>';
        echo '<a href = "logout.php">Log out</a>';
    } else {
        echo '<li class = "nav-link1" style = "color: yellow;"><a href = "login.php">Log in</a></li>';
    }
?>
            </ul>
        </div>
        <div id = "nav">
            <img src = "images/iac.png"  class = "nav-logo"/>        
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
        <div class = "services-container">
            <h2 style = "text-align: center;">Our Services</h2>
            <div id = "services">
                <div class="air-charter">
                    <h2 style = "text-align: center;">Air Charter</h2>
                    <p>
                        Our Air Charter services allow you to enjoy convenience, privacy and comfort be it for your private or personal flights,
                        business or corporate trips, etc. Charter flights are more convenient than flying on commercial airlines, with
                        direct flights to nearly anywhere in the country.
                    </p>
                    <p>
                        IAI's undisputed safety record provides its customers peace of mind and confidence that they will reach their destinations
                        safely and swiftly.
                    </p>
                </div><br>
                <div class="battery-shop">
                    <center>
                    <h2>Battery Shop</h2>
                    <p>
                        Island Aviation Inc. is a CAAP-Approved Maintenance Organization (AMO) operating under Certificate No. 89-10 with an approved
                        capability to service aircraft batteries using state-of-the-art battery charging equipment. IAI's battery shop currently offers
                        the following services: top charge, capacity test, deep cycle and overhaul.
                    </p>
                </center>
                </div><br><br>
            </div>
        </div>
    </article>
    <footer>
        <p>&copy; Copyright 2018</p>
        <p>HardCode</p>
    </footer>
</body>
</html>