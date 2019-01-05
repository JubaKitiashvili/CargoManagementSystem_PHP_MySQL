<html lang="en">
<head>
    <title>Info</title>
</head>
<body>
<?PHP
session_start();

if(isset($_SESSION['admin'])){
    header('location: adminpanel.php');
}
    include('src/config.php');
    echo '<style type = "text/css">
    html {
        scroll-behavior: smooth;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
        margin: 0;
        padding: 0;
        background: rgb(35,35,35);
        color:#ffffff;
    }

    .container {
        margin-top: 10px;
    }
    
    .title {
        margin-left: 15px;
    }

    .wrapper {
        margin-left: 40px;
    }

    #container-sender, #container-shipping{
        width: 40%;
        margin-right: auto;
        margin-left: auto;
        border: 1px solid rgb(26,26,26);
        border-radius: 6px;
        line-height: 20px;
        box-shadow: 0 0 5px #000000;
        background:rgb(26,26,26,0.5);
    }

    #container-shipping {
        margin-top: 10px;
    }

    button[type=submit] {
        width: 50%;
        background-color: #ff1a1a;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button[type=submit]:hover {
        background-color: #e60000;
    }
    </style>';
    $exe = new config();

    // insert into database...
    if(isset($_POST['pay'])){
        // sender's detail
        $senderName = $exe->escapeChar($_POST['theName']);
        $senderEmail = $exe->escapeChar($_POST['theEmail']);
        $senderContact = $exe->escapeChar($_POST['theContact']);
        $postal = $exe->escapeChar($_POST['thePostal']);
        $address = $exe->escapeChar($_POST['theAddress']);
    
        // shipping detail
        $origin = $exe->escapeChar($_POST['theOrigin']);
        $destiny = $exe->escapeChar($_POST['theDestination']);
        $receiver = $exe->escapeChar($_POST['theReceiver']);
        $service = $exe->escapeChar($_POST['theServe']);
        $quant = $exe->escapeChar($_POST['theQuant']);
        $weight = $exe->escapeChar($_POST['theWeight']);
        
        $type = $exe->escapeChar($_POST['theType']);
        $id = $exe->escapeChar($_POST['theTrackingId']);
        $total = $exe->escapeChar($_POST['theTot']);
        $givenAmount = $exe->escapeChar($_POST['givenAmount']);
    
        $overall = '';
    
        if(isset($senderName) && isset($senderEmail) && isset($senderContact) && isset($postal) && isset($address) && isset($origin) && isset($destiny)
        && isset($receiver) && isset($service) && isset($quant) && isset($weight) && isset($type) && isset($id) && isset($total) && isset($givenAmount)){
            if($givenAmount < $total){
                echo 'ERR!';
            } else if($givenAmount >= $total){
                if(isset($_SESSION['custId'])){
                    $exe->addCargo($_SESSION['custId'], $senderName, $senderEmail, $senderContact, $postal, $address, $origin, $destiny, $receiver, $service, $quant, $weight, $type, $id, $total, $givenAmount);
                    if($exe){
                        echo 'SUCCESS';
                    } else {
                        echo 'ERR';
                    }
                } else if(!isset($_SESSION['custId'])){
                    $custId = 0;
                    $exe->addCargo($custId, $senderName, $senderEmail, $senderContact, $postal, $address, $origin, $destiny, $receiver, $service, $quant, $weight, $type, $id, $total, $givenAmount);
                    if($exe){
                        echo 'SUCCESS';
                    } else {
                        echo 'ERR';
                    }
                }   
            }
        }
    }

    // from senderDetails form...
    if(isset($_POST['submit-proceed'])){
        // shipping details
        $originCity = $_POST['orig'];
        $destination = $_POST['destined'];
        $receiver = $_POST['receiver'];
        $serve = $_POST['service'];
        $quantity = $_POST['quant'];
        $weight = $_POST['weight'];
        $type = $_POST['type'];

        // sender details
        $senderName = $_POST['name'];
        $senderEmail = $_POST['email'];
        $senderContact = $_POST['contact'];
        $postalCode = $_POST['postalCode'];
        $address = $_POST['address'];

        $basicPrice = '';
        $totalPrice = '';
        $trackId = '';

        if(isset($originCity) && isset($destination) && isset($receiver) && isset($serve) && isset($quantity) && isset($weight) && isset($type)
            && isset($senderName) && isset($senderEmail) && isset($senderContact) && isset($postalCode) && isset($address)){
                $basicPrice = 200;
                $totalPrice = $basicPrice + ($weight * 4.22) + ($quantity * 4.22);
                $trackId = $exe->randomString();

            if(isset($_SESSION['custId'])){
                echo '
                    <form action "payment.php" method = "POST" class = "container">
                        <div id = "container-sender">
                            <h2 class = "title">Sender Details</h2>
                            <p class = "wrapper">
                                <label>Customer ID: '. $_SESSION['custId'] .' </label>
                                <input type = "hidden" name = "customerId" value = '. $_SESSION['custId'] .' >
                            </p>
                            <p class = "wrapper">
                                <label>Name: '. $senderName .'</label>
                                <input type = "hidden" name = "theName" value = '. $senderName .'>
                            </p>
                            <p class = "wrapper">
                                <label>Email: '. $senderEmail .'</label>
                                <input type = "hidden" name = "theEmail" value = '. $senderEmail .'>
                            </p>
                            <p class = "wrapper">
                                <label>Contact: '. $senderContact .'</label>
                                <input type = "hidden" name = "theContact" value = '. $senderContact .'>
                            </p>
                            <p class = "wrapper">
                                <label>Postal Code: '. $postalCode .'</label>
                                <input type = "hidden" name = "thePostal" value = '. $postalCode .'>
                            </p>
                            <p class = "wrapper">
                                <label>Address: '. $address .'</label>
                                <input type = "hidden" name = "theAddress" value = '. $address .'>
                            </p>
                        </div>
                        <div id = "container-shipping">
                            <h2 class = "title">Shipping Details</h2>
                            <p class = "wrapper">
                                <label>Origin: '. $originCity .'</label>
                                <input type = "hidden" name = "theOrigin" value = '. $originCity .'>
                            </p>
                            <p class = "wrapper">
                                <label>Destination: '. $destination .'</label>
                                <input type = "hidden" name = "theDestination" value = '. $destination .'>
                            </p>
                            <p class = "wrapper">
                                <label>Receiver: '. $receiver .'</label>
                                <input type = "hidden" name = "theReceiver" value = '. $receiver .'>
                            </p>
                            <p class = "wrapper">
                                <label>Service Type: '. $serve .'</label>
                                <input type = "hidden" name = "theServe" value = '. $serve .'>
                            </p>
                            <p class = "wrapper">
                                <label>Quantity: '. $quantity .'</label>
                                <input type = "hidden" name = "theQuant" value = '. $quantity .'>
                            </p>
                            <p class = "wrapper">
                                <label>Weight: '. $weight .'</label>
                                <input type = "hidden" name = "theWeight" value = '. $weight .'>
                            </p>
                            <p class = "wrapper">
                                <label>Type: '. $type .'</label>
                                <input type = "hidden" name = "theType" value = '. $type .'>
                            </p>
                            <p class = "wrapper">
                                <label>Your Tracking ID: '. $trackId .'</label>
                                <input type = "hidden" name = "theTrackingId" value = '. $trackId .'>
                            </p>
                            <p class = "wrapper">
                                <label>Total: '. $totalPrice .'</label>
                                <input type = "hidden" name = "theTot" value = '. $totalPrice .' >
                            </p>
                            <p class = "wrapper">
                                <label>Enter amount: </label>
                                <input type = "number" name = "givenAmount" required placeholder = "Enter value" >
                            </p>
                            <center>
                                <button type = "submit" name = "pay" >
                                    Pay
                                </button>
                            </center>
                        </div>
                    </form>';
            } else if(!isset($_SESSION['custId'])){
                echo '
                    <form action "payment.php" method = "POST" class = "container">
                        <div id = "container-sender">
                            <h2 class = "title">Sender Details</h2>
                            <p class = "wrapper">
                                <label>Name: '. $senderName .'</label>
                                <input type = "hidden" name = "theName" value = '. $senderName .'>
                            </p>
                            <p class = "wrapper">
                                <label>Email: '. $senderEmail .'</label>
                                <input type = "hidden" name = "theEmail" value = '. $senderEmail .'>
                            </p>
                            <p class = "wrapper">
                                <label>Contact: '. $senderContact .'</label>
                                <input type = "hidden" name = "theContact" value = '. $senderContact .'>
                            </p>
                            <p class = "wrapper">
                                <label>Postal Code: '. $postalCode .'</label>
                                <input type = "hidden" name = "thePostal" value = '. $postalCode .'>
                            </p>
                            <p class = "wrapper">
                                <label>Address: '. $address .'</label>
                                <input type = "hidden" name = "theAddress" value = '. $address .'>
                            </p>
                        </div>
                        <div id = "container-shipping">
                            <h2 class = "title">Shipping Details</h2>
                            <p class = "wrapper">
                                <label>Origin: '. $originCity .'</label>
                                <input type = "hidden" name = "theOrigin" value = '. $originCity .'>
                            </p>
                            <p class = "wrapper">
                                <label>Destination: '. $destination .'</label>
                                <input type = "hidden" name = "theDestination" value = '. $destination .'>
                            </p>
                            <p class = "wrapper">
                                <label>Receiver: '. $receiver .'</label>
                                <input type = "hidden" name = "theReceiver" value = '. $receiver .'>
                            </p>
                            <p class = "wrapper">
                                <label>Service Type: '. $serve .'</label>
                                <input type = "hidden" name = "theServe" value = '. $serve .'>
                            </p>
                            <p class = "wrapper">
                                <label>Quantity: '. $quantity .'</label>
                                <input type = "hidden" name = "theQuant" value = '. $quantity .'>
                            </p>
                            <p class = "wrapper">
                                <label>Weight: '. $weight .'</label>
                                <input type = "hidden" name = "theWeight" value = '. $weight .'>
                            </p>
                            <p class = "wrapper">
                                <label>Type: '. $type .'</label>
                                <input type = "hidden" name = "theType" value = '. $type .'>
                            </p>
                            <p class = "wrapper">
                                <label>Your Tracking ID: '. $trackId .'</label>
                                <input type = "hidden" name = "theTrackingId" value = '. $trackId .'>
                            </p>
                            <p class = "wrapper">
                                <label>Total: '. $totalPrice .'</label>
                                <input type = "hidden" name = "theTot" value = '. $totalPrice .' >
                            </p>
                            <p class = "wrapper">
                                <label>Enter amount: </label>
                                <input type = "number" name = "givenAmount" required placeholder = "Enter value" >
                            </p>
                            <center>
                                <button type = "submit" name = "pay" >
                                    Pay
                                </button>
                            </center>
                        </div>
                    </form>';
            }
        }
    } else {
        //header('location: index.php');
    }   
?>
</body>
</html>