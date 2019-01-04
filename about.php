<?PHP
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo daw dapat e</title>
    <?PHP
        include("src/style.php");
    ?>  
    <link href="css/agency.min.css" rel="stylesheet">
</head>
<body>
    <main>
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
        <div class="about-container">
            <h2 style="text-align: center">About Us</h2>
            <div id = "whoarewe">
                <center>
                <h2>WHO ARE WE</h2>
                <p>
                    Island Aviation, Inc. (formerly A. Soriano Aviation, Inc.) is an Air Charter company operating in the Philippines with Air Operator Certificate No. AOC # 2009009
                    issued by the Civil Aviation Authority of the Philippines. IAI is the general aviation arm of A. Soriano Group of Companies, a holding company with diverse investments
                    in cable and wire manufacturing, modular steel construction, healthcare staffing, resort development, wireless broadband data services, aviation, real estate and manpower deployment.
                </p>
                <p>
                    IAI came into being on May 1, 2003, as a direct spin-off from the Aviation Department of A. Soriano Corporation (ANSCOR), for which it has been conducting corporate flying for many years.
                    The company was reorganized to support the air transport needs of Amanpulo Resort and Air Charter needs of companies and individuals by providing its passengers safe and first class service.
                </p>
                <p>
                    As a registered scheduled and non-scheduled operator, IAI holds a Certificate of Public Convenience and Necessity (CPCN) duly issued by the Civil Aeronautics Board.
                </p>
                <p>
                    IAI is currently operating three 19-passenger capacity Dornier 228 twin-turbine powered propeller (turboprop) aircraft to support its requirements.
                    It employs highly-skilled pilots and maintenance personnel regularly trained in Germany on this type of aircraft.
                </p>
            </center>
            </div><br>
            <div id = "whychooseus">
                <div id = "ourpeople">
                    <center>
                    <h2>Our People</h2>
                    <p>
                        Island Aviation, Inc. takes pride in having well-trained and highly skilled pilots and maintenance personnel who are regularly trained in Germany. It has a competent and
                        experienced management team assisted by staff who are among the most qualified in the industry.
                    </p>
                </center>
                </div><br>
                <div id = "ouraircraft">
                    <center>
                    <h2>Our Aircraft</h2>
                    <p>
                        Our company is considered as one of the safest aviation organizations in the Philippines because we have the best maintained aircraft in the country.
                    </p>
                </div><br>
                <div id="dispatch">
                    <center>
                    <h2>Our Dispatch Reliability</h2>
                    <p>
                        Our company boasts of its near perfect dispatch reliability of 99.22%! Our record shows that we have not experienced any inflight engine shutdown since the company reopened in May 2003, thirteen and a half years ago!
                    </p>
                </center>
                </div><br>
                <div id = "eagle">
                    <center>
                    <h2>CAAP Eagle Awardee</h2>
                    <p>
                        After the European Union Assessment Safety Audit on 16-24 April 2015, which lifted the ban on Philippine registered aircraft from flying in the European Union airspace,
                        IAI was given the Eagle Award by the Civil Aviation Authority of the Philippines (CAAP) in recognition of its outstanding performance as an Air Operator Certificate (AOC) holder with the
                        least number of findings during the said audit.
                    </p>
                </div><br>
            </center>
                </div>
            </div>
            <div id = "values">
                <div id = "vision">
                    <center>
                    <h2>OUR VISION</h2>
                    <p>
                        To be the epitome of excellence as the premier air charter service provider in the Philippines serving  local and international clients.
                    </p>
                </center>
                </div><br>
                <div id = "mission">
                    <center>
                    <h2>OUR MISSION</h2>
                    <p>
                        Island Aviation Inc. (IAI) is committed to provide safe and efficient air transport services to local and foreign customers to the highest standards by
                        employing competently-trained people; and keeping a fleet of well-maintained and modernly-equipped aircraft.
                    </p>
                    <p>
                        IAI assures the attainment of its mission by establishing corporate values and culture that will continuously provide a sustained esteem and stability on every employee.
                    </p>
                    <p>
                        IAI is adherent of making significant contribution not only to its stakeholders but also to the country�s economy by promoting tourism, supporting socially
                        responsible activities, and delivering exceptional and memorable customer experience.
                    </p>
                </center>
                </div><br>
                <div id = "commitment">
                    <center>
                    <h2>Commitment</h2>
                    <p>
                        The owners, stakeholders and employees of Island Aviation Inc., are committed to the highest level of safety standards observed and followed worldwide.
                        Safe, efficient and reliable service for our valued clients is our priority and shall never be compromised for any reason and under any circumstances.
                    </p>
                    <p>
                        Safe operations in and to any part of the Philippines will always be planned, analyzed and executed according to the highest standards in the industry.
                    </p>
                    <p>
                        Safety Management System is a major component of Island Aviation�s mandate and we assure clients and passengers of the best aviation service and experience.
                    </p>
                </center>
                </div><br>
            </div>
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