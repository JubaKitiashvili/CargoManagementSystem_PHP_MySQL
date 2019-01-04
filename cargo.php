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
    <form action = "senderDetails.php" method = "POST" style = "margin-top: 8%;">
        <center>
            <div class = "shippingDetail">
                <h2>Shipping Details</h2>
                <p>
                    <label for="origin">Origin:</label><br>
                    <input type = "text" required name = "origin" placeholder="Origin" />
                </p>
                <p>
                   <label for="destination">Destination:</label><br>
                    <input type = "text" required name = "destination" placeholder="Destination" />
                </p>
                <p>
                    <label for="receiver-name">Receiver Name:</label><br>
                    <input type = "text" required name = "receiver-name" placeholder="Receiver Name" />
                </p>
                <p>
                    <label for="services">Services:</label><br>
                    <select name = "services">
                        <option value = "Ordinary">Ordinary</option>
                        <option value = "Special">Special</option>
                    </select>
                </p>
                <p>
                    <label for="quantity">Quantity:</label><br>
                    <input type = "number" required name = "quantity" placeholder="Quantity" />
                </p>
                <p>
                    <label for="weight">Weight:</label><br>
                    <input type = "text" required name = "weight" placeholder="Weigh [grams]" />
                </p>
                <p>
                    <label for="cargoType">Type:</label><br>
                    <select name = "cargoType">
                        <option value = "Document">Document</option>
                        <option value = "Clothes">Clothes</option>
                        <option value = "Electronics">Electronics</option>
                        <option value = "Mechanicals">Mechanicals</option>
                        <option value = "Chemicals">Chemicals</option>
                        <option value = "Liquid">Liquid</option>
                    </select>
                </p>
                <p>
                    <button type = "submit" name = "Submit" >
                        Proceed
                    </button>
                </p>  
            </div>
        </center>
    </form>
    </main>
    <footer>
        <p>&copy; Copyright 2018</p>
        <p>HardCode</p>
    </footer>
</body>
</html>