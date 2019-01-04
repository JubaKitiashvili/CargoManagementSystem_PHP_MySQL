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
        echo '<li class = "nav-link1" style = "color: yellow;">Hello ' . $_SESSION['admin'] .'</li>';
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
        </header>
        <br>
        <?PHP
        //session_start();
        include('src/config.php');
        $exe = new config();

        echo '<form action = "details.php" method = "POST" style = "margin-top: 8%;">';
        if(isset($_POST['Submit'])){

            $origin = $_POST['origin'];
            $destination = $_POST['destination'];
            $receiverName = $_POST['receiver-name'];
            $services = $_POST['services'];
            $quantity = $_POST['quantity'];
            $weight = $_POST['weight'];
            $cargoType = $_POST['cargoType'];
            
            if(isset($origin) && isset($destination) && isset($receiverName) && isset($services) && isset($quantity) && isset($weight) && isset($cargoType)){
                if(isset($_SESSION['custId'])){
                    echo '
                        <p>
                            <input type = "text" name = "custId" value = '. $_SESSION['custId'] .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "orig" value = '. $origin .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "destined" value = '. $destination .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "receiver" value = '. $receiverName .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "service" value = '. $services .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "quant" value = '. $quantity .' />
                        </p>
                        <p>
                            <input type = "hidden" name = "weight" value = '. $weight .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "type" value = '. $cargoType .' >
                        </p>
                    ';
                } else if(!isset($_SESSION['custId'])){
                    echo '
                        <p>
                            <input type = "hidden" name = "orig" value = '. $origin .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "destined" value = '. $destination .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "receiver" value = '. $receiverName .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "service" value = '. $services .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "quant" value = '. $quantity .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "weight" value = '. $weight .' >
                        </p>
                        <p>
                            <input type = "hidden" name = "type" value = '. $cargoType .' >
                        </p>
                    ';
                }
            }
            echo '
                <center>
                    <div class = "senderDetail">
                        <h2>Sender Details</h2>
                        <p>
                            <label for="name">Name:</label><br>
                            <input type = "text" name = "name" required placeholder="Name" >
                        </p>
                        <p>
                            <label for="email">E-mail:</label><br>
                            <input type = "email" name = "email" required placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[com]{2,}$">
                        </p>
                        <p>
                            <label for="contact">Contact:</label><br>
                            <input type = "text" name = "contact" required placeholder="Contact" >
                        </p>
                        <p>
                            <label for="postalCode">Postal Code:</label><br>
                            <input type = "text" name = "postalCode" required placeholder="Postal Code" >
                        </p>
                        <p>
                            <label for="address">Address:</label><br>
                            <input type = "text" name = "address" required placeholder="Address" >
                        </p>
                        <p>
                            <button type = "submit" name = "submit-proceed" >
                                    Proceed
                            </button>
                            <br>
                        </p>
                    </div>
                </center>
            </form>';
        } else{
            echo '<script type = "text/javascript">
                window.location.href = "cargo.php";
            </script>';
        }
        ?>
    </main>
        <br><br>
    <footer>
        <p>&copy; Copyright 2018</p>
        <p>HardCode</p>
    </footer>
</body>
</html>