<?php
session_start();

include('src/config.php');
$exe = new config();

if(!isset($_SESSION['custName']) && !isset($_SESSION['custId']) && !isset($_SESSION['fname'])){
    header('location: login.php');
}
echo '<head>';
echo '<style type = "text/css">
    body {
        margin: 0;
        padding: 0;
    }

    form {
        margin: 0;
    }

    .names{
        margin: 0;
        width: 10%;
    }

    .editThis {
        display: none;
    }

    .editThis2 {
        display: none;
    }

    .editThis3 {
        display: none;
    }

    .nameNoMargin {
        margin: 0;
        width: 10%;
    }

    #formPanel{
        display: none;
        margin: 0;
    }

    #formPanel2 {
        display: none;
        margin: 0;
    }

    #formPanel3 {
        display: none;
        margin: 0;
    }
</style>';

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
echo '<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';

echo '<script type = "text/javascript">
$(document).ready(function(){
    $("#thisName").mouseover(function(){
        $(".editThis").show();
    });
    $("#thisName").mouseleave(function(){
        $(".editThis").hide();
    });
    $(".editThis").click(function(){
        $("#formPanel").show();
        $("#thisName").hide();
    });
    $("#cancelButton").click(function(){
        $("#formPanel").hide();
        $("#thisName").show();
    });

    $("#thisUsername").mouseover(function(){
        $(".editThis2").show();
    });
    $("#thisUsername").mouseleave(function(){
        $(".editThis2").hide();
    });

    $(".editThis2").click(function(){
        $("#formPanel2").show();
        $("#thisUsername").hide();
    });

    $("#cancelButton2").click(function(){
        $("#formPanel2").hide();
        $("#thisUsername").show();
    });

    $("#thisEmail").mouseover(function(){
        $(".editThis3").show();
    });
    $("#thisEmail").mouseleave(function(){
        $(".editThis3").hide();
    });

    $(".editThis3").click(function(){
        $("#formPanel3").show();
        $("#thisEmail").hide();
    });

    $("#cancelButton3").click(function(){
        $("#formPanel3").hide();
        $("#thisEmail").show();
    });
});
</script>';

echo '</head>';

// Customer's Panel
echo '<div id = "theCustomer">';
echo '<a href = "index.php"><img src = "images/logo.png" id = "home-logo" /></a><br>';
echo '<h1>Customer Panel</h1>';
echo '<div id = "panel">';
echo '<p class = "names">Name: '. $_SESSION['fname'] .'</p>';
echo '<input type = "hidden" name = "sess-id" value = ' . $_SESSION['custId'] . '>';
echo '<a href = "yourPanel.php?you=yourOrders"id = "ea">My Orders</a><br>';
echo '<a href = "yourPanel.php?you=myProfile" id = "mp">My Profile</a><br>';
echo '<a href = "logout.php">Log out</a><br>';
echo '</div>';
echo '</div>';

// orders
if(isset($_GET['you'])){
    if($_GET['you'] === 'yourOrders'){
        $myOrders = $exe->customers($_SESSION['custId']);

        while($orders = $myOrders->fetch_assoc()){
            $custId = $orders['custId'];
            $postal = $orders['postalCode'];
            $address = $orders['theAddress'];
            $origin = $orders['origin'];
            $destiny = $orders['destination'];
            $receiver = $orders['receiver'];
            $serviceType = $orders['serviceType'];
            $quantity = $orders['quantity'];
            $weight = $orders['theWeight'];
            $cargoType = $orders['cargoType'];
            $trackID = $orders['trackId'];
            $status = $orders['theStatus'];
            $indic = $orders['levelStatus'];

            echo '<table border="1">';

            echo <<<THEAD
            <tr>
                <th>Customer ID</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Receiver</th>
                <th>Service Type</th>
                <th>Package</th>
                <th>Quantity</th>
                <th>Weight</th>
                <th>Track ID</th>
                <th>Status</th>
            </tr>
THEAD;
            echo <<<TBODY
            <tr>
                <td>$custId</td>
                <td>$address</td>
                <td>$postal</td>
                <td>$origin</td>
                <td>$destiny</td>
                <td>$receiver</td>
                <td>$serviceType</td>
                <td>$cargoType</td>
                <td>$quantity</td>
                <td>$weight</td>
                <td>$trackID</td>
                <td>$status</td>
            </tr>
TBODY;
            echo '</table>';

            echo '<style type = "text/css">
            #panel {
                display: none;
            }
        </style>';

            // alert
            if($indic === '1' || $_GET['you'] === 'ok'){
                $level = '0';
                $exe->notify($custId, $level);
                echo '<script type = "text/javascript">
                    document.write("Your Shipping status has been updated");
                </script>';
                echo '<a href = "yourPanel.php?you=ok">OK</a>';
                echo '<style type = "text/css">
                    #ea {
                        color: red;
                    }
                </style>';
            } else if($indic === '0'){
                echo '<script type = "text/javascript">
                    document.write("No Changes");
                </script>';
                echo '<br>';
                echo '<a href = "yourPanel.php">Back</a>';
                echo '<style type = "text/css">
                    #ea {
                        color: blue;
                    }
                </style>';
            }
        }
    } else if($_GET['you'] === 'edit'){
        $users = $exe->users($_SESSION['custId']);
        $theId = '';
        $name = '';
        $username = '';
        $userpass = '';
        $confirm = '';

        // update Password
        while($rows = $users->fetch_assoc()){
            $theId = $rows['Id'];
            $name = $rows['fName'];
            $username = $rows['username'];
            $userpass = $rows['userpass'];
            $confirm = $rows['confirmPass'];
        }

        echo '<style type = "text/css">
            #panel {
                display: none;
            }
        </style>';
        echo '<form id = "form1" method = "POST">
            <input type = "hidden" name = "id" value = '. $theId .'>
            <input type = "hidden" name = "userpass" value = '. $userpass .'>
            <input type = "text" name = "oldPassword" placeholder = "Old Password" >
            <input type = "text" name = "newPassword" placeholder = "Enter New Password" >
            <input type = "text" name = "confirmNewPassword" placeholder = "Confirm New Password" >
            <button type = "submit" name = "updateCust">
                Update
            </button>
        </form>
        ';
        echo '<a href = "yourPanel.php">Go Back</a><br>';
    } else if($_GET['you'] === 'myProfile'){

        // Customer's Profile
        $cust = $exe->users($_SESSION['custId']);
        $customerId = '';
        $customerFname = '';
        $usname = '';
        $customerEmail = '';

        while($row = $cust->fetch_assoc()){
            $customerId = $row['Id'];
            $customerFname = $row['fName'];
            $username = $row['username'];
            $customerEmail = $row['email'];
        }

        echo '<div id = "formPanel">';
        echo '<form action = "" method = "POST">';
        echo '<input type = "hidden" name = "yourId" id = "yourId" value = ' . $customerId . ' >';
        echo '<input type = "text" name = "namePanel" id = "namePanel" value = ' . $customerFname . '>';
        echo '<button type = "submit" name = "updateName" id = "updateName">Update</button>';
        echo '<button type = "button" name = "cancelButton" id = "cancelButton">Cancel</button>';
        echo '</form>';
        echo '</div>';
        echo '<p class = "names "nameNoMargin" id = "thisName">Name: ' . $customerFname . ' <span class = "editThis"><a href = "#" id = "editName">Edit</a></span></p>';
        echo '<div id = "formPanel2">';
        echo '<form action = "" method = "POST">';
        echo '<input type = "hidden" name = "thisId" id = "thisId" value = ' . $customerId .' >';
        echo '<input type = "text" name = "usernamePanel" id = "usernamePanel" value = ' . $username . '>';
        echo '<button type = "submit" name = "updateUsername" id = "updateUsername">Update</button>';
        echo '<button type = "button" name = "cancelButton2" id = "cancelButton2">Cancel</button>';
        echo '</form>';
        echo '</div>';
        echo '<p class = "nameNoMargin" id = "thisUsername">Username: '. $username .' <span class = "editThis2"><a href = "#" id = "editUsername">Edit</a></span></p>';
        echo '<div id = "formPanel3">';
        echo '<form action = "" method = "POST">';
        echo '<input type = "hidden" name = "emailId" id = "emailId" value = '. $customerId .' >';
        echo '<input type = "text" name = "emailPanel" id = "emailPanel" value = ' . $customerEmail . '>';
        echo '<button type = "submit" name = "updateEmail" id = "updateEmail">Update</button>';
        echo '<button type = "button" name = "cancelButton3" id = "cancelButton3">Cancel</button>';
        echo '</form>';
        echo '</div>';
        echo '<p class = "nameNoMargin" id = "thisEmail">Email: '. $customerEmail .' <span class = "editThis3"><a href = "#" id = "editEmail">Edit</a></span></p>';
        echo '<br>';
        echo '<a href = "yourPanel.php?you=edit">Edit Password</a>';
        echo '<br>';
        echo '<a href = "yourPanel.php">Back</a>';
        echo '<style type = "text/css">
            #panel {
                display: none;
            }
        </style>';
    }
}

// update Password
if(isset($_POST['updateCust'])){
    $customerId = $_POST['id'];
    $customerPassword = $_POST['userpass'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if($oldPassword === $userpass && $newPassword === $confirmNewPassword){
        $exe->updatePassword($customerId, $newPassword, $confirmNewPassword);
        if($exe){
            echo '<script type = "text/javascript">
                alert("Logging out.")
                window.location.href = "logout.php";
            </script>';
        } else {
            echo 'ERROR';
        }
    } else if(empty($confirmNewPassword) || empty($newPassword)){
        echo 'Empty Field';
    }
}

// update Name
if(isset($_POST['updateName'])){
    $id = $_POST['yourId'];
    $name = $_POST['namePanel'];

    if(!empty($name)){
        $exe->updateName($id, $name);
        if($exe){
            echo '<script type = "text/javascript">
            alert("Name Updated")
            window.location.href = "logout.php";
            </script>';
        } else {
            echo 'ERROR';
        }
    } else {
        echo 'Empty';
    }
}

// update Username
if(isset($_POST['updateUsername'])){
    $id = $_POST['thisId'];
    $uname = $_POST['usernamePanel'];

    if(!empty($uname)){
        $exe->updateUsername($id, $username);
        if($exe){
            echo '<script type = "text/javascript">
            alert("Username updated")
            window.location.href = "logout.php"
            </script>';
        } else {
            echo 'ERROR!';
        }
    } else {
        echo 'Empty';
    }
}

// update Email
if(isset($_POST['updateEmail'])){
    $id = $_POST['emailId'];
    $upEmail = $_POST['emailPanel'];

    if(!empty($upEmail)){
        $exe->updateEmail($id, $upEmail);;
        if($exe){
            echo '<script type = "text/javascript">
            alert("Email updated")
            window.location.href = "logout.php"
            </script>';
        } else {
            echo 'ERROR!';
        }
    } else {
        echo 'Empty';
    }
}
?>