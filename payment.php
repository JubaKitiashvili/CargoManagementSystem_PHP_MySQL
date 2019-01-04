<?PHP
include('src/config.php');
$exe = new config();

/*if(isset($_POST['pay'])){
    // sender's detail
    $senderName = $_POST['theName'];
    $senderEmail = $_POST['theEmail'];
    $senderContact = $_POST['theContact'];
    $postal = $_POST['thePostal'];
    $address = $_POST['theAddress'];

    // shipping detail
    $origin = $_POST['theOrigin'];
    $destiny = $_POST['theDestination'];
    $receiver = $_POST['theReceiver'];
    $service = $_POST['theServe'];
    $quant = $_POST['theQuant'];
    $weight = $_POST['theWeight'];
    
    $type = $_POST['theType'];
    $id = $_POST['theTrackingId'];
    $total = $_POST['theTot'];
    $givenAmount = $_POST['givenAmount'];

    $overall = '';

    if(isset($senderName) && isset($senderEmail) && isset($senderContact) && isset($postal) && isset($address) && isset($origin) && isset($destiny)
    && isset($receiver) && isset($service) && isset($quant) && isset($weight) && isset($type) && isset($id) && isset($total) && isset($givenAmount)){
        if($givenAmount < $total){
            echo 'Insufficient Money!';
        } else if($givenAmount >= $total){
            $exe->addCargo($senderName, $senderEmail, $senderContact, $postal, $address, $origin, $destiny, $receiver, $service, $quant, $weight, $type, $id, $total, $givenAmount);
            if($exe){
                echo 'SUCCESS';
            }
        }
    }
} else {
    header('location: index.php');
}*/

/*if(isset($_POST['pay'])){
    $senderName = $_POST['sender-name'];
    $senderEmail = $_POST['sender-email'];
    $senderContact = $_POST['sender-contact'];
    $senderAddress = $_POST['sender-address'];
    $senderCity = $_POST['sender-city'];

    $receiverName = $_POST['receiver-name'];
    $receiverEmail = $_POST['receiver-email'];
    $receiverContact = $_POST['receiver-contact'];
    $receiverAddress = $_POST['receiver-address'];
    $receiverCity = $_POST['receiver-city'];

    $cargoWeight = $_POST['cargo-weight'];
    $cargoLength = $_POST['cargo-length'];
    $cargoHeight = $_POST['cargo-height'];
    $cargoQuantity = $_POST['cargo-quantity'];
    $cargoType = $_POST['cargo-type'];
    $givenAmount = $_POST['payment'];
    $theTotal = $_POST['theTotal'];
    $trackId = $_POST['track-id'];

    if(isset($senderName) && isset($senderEmail) && isset($senderContact) && isset($senderAddress) && isset($senderCity) &&
    isset($receiverName) && isset($receiverEmail) && isset($receiverContact) && isset($receiverAddress) && isset($receiverCity) && 
    isset($cargoWeight) && isset($cargoLength) && isset($cargoHeight) && isset($cargoQuantity) && isset($cargoType) &&
    isset($trackId) && isset($givenAmount) && isset($theTotal)){
            if($givenAmount < $theTotal){
                echo '
                <script type = "text/javascript">
                    alert("Insufficient Amount")
                    window.location.href = "cargo.php";
                </script>
                ';
            } else if($givenAmount >= $theTotal){
                $exe->addCargo($senderName, $senderEmail, $senderContact, $senderAddress, $senderCity, $receiverName, $receiverEmail,
                                                $receiverContact, $receiverAddress, $receiverCity, $cargoWeight, $cargoLength, $cargoHeight, $cargoQuantity,
                                                $cargoType, $trackId, $theTotal, $givenAmount);
                if($exe){
                    echo '<script type = "text/javascript">
                        alert("Paid.");
                    </script>';
                    header('Location: index.php');
                } else {
                    echo 'ERR!';
                }
            }
        }
}*/
?>