<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IAI-Cargo Management System</title>
    <?PHP
        echo <<<STYLE
        <style type = "text/css">
        html {
            scroll-behavior: smooth;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            margin: 0 auto;
            padding: 0;
            background:rgb(35,35,35);
            height:100%;
            width:100%;
            color:#ffffff;
        }

        .nav-logo{
            height:70px;
            width:300px;
            float:left;
            margin:0 auto;
            padding:0px;
        }

        #top-nav{
            height:30px;
            width:100%;
            position:relative;
            background:#ff1a1a;
            float:left;
            text-align:right;
            display:inline;
            font-size:15px;
        }

        #top-nav ul,li{
            display:inline;
            padding:2px;
            overflow:hidden;
            margin-right: 10px;
        }

        #nav{
            height:70px;
            width:100%;
            position:relative;
            background:#000000;
            float:left;
            text-align:right;
            display:inline;
            font-size:20px;
            word-spacing:5px;
        }

        #nav ul{
            padding:0;
            overflow:hidden;
        }
        
        .nav-link{
            display:inline;
            text-decoration:none;
            text-align:right;
        }

        .nav-link1 a{
            text-decoration:none;
            color:#ffffff;
            width:50px;
            display:inline;
        }
        
        .nav-link1 :hover{
            color:#262626;
        }

        input[type=number] {
            width: 300px;
            padding: 8px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-right: 10px;
        }

        button[type=submit] {
            width: 100px;
            background-color: #ff1a1a;
            padding: 8px 20px;
            color: white;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button[type=submit]:hover {
            background-color: #e60000;
        }
        
        .nav-link1:visited{
            color:#262626;  
        }

        .nav-link1 :active{
            color:#262626;
        }

        .nav-link a{
            text-decoration:none;
            color:#ffe6e6;
            width:50px;
            display:inline;
            padding:35px 35px 25px 35px;
        }
        
        .nav-link :hover{ 
            color:#ff1a1a;  
        }

        .nav-link:visited{
            color:#ff1a1a;  
        }

        .nav-link :active{
            color:#ff1a1a;
        }
        </style>
STYLE;
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
        echo '<li class = "nav-link1" style = "color: yellow;"><a href = "adminpanel.php">Hello ' . $_SESSION['admin'] .'</a></li>';
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
    </header>
<?PHP
include('src/config.php');
$exe = new config();

echo ' <center>
    <form method = "POST" id = "form2">
        <div id = "search-field">
            <label>Track your shipping: &nbsp;</label>
            <input type = "number" name = "search" placeholder = "Enter Tracking ID" />
            <button type = "submit" name = "hit">
                Track
            </button>
        </div>
    </form>
</center>
';

if(isset($_POST['hit'])){
    $search = $exe->search($_POST['search']);
    $sender = '';
    $email = '';
    $receiver = '';
    $origin = '';
    $destiny = '';
    $trackId = '';
    $status = '';
    $id = '';

    while($row = $search->fetch_assoc()){
        $sender = $row['senderName'];
        $email = $row['senderEmail'];
        $origin = $row['origin'];
        $destiny = $row['destination'];
        $trackId = $row['trackId'];
        $status = $row['theStatus'];
        $receiver = $row['receiver'];
        $id = $row['Id'];
    }

    if($_POST['search'] === $trackId){
        if(isset($_SESSION['admin'])){
            echo '<table border = "1">';
            echo <<<THEAD
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Sender Name</th>
                    <th>Sender Email</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Receiver</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
THEAD;
        echo <<<TBODY
                <tr>
                    <td>$trackId</td>
                    <td>$sender</td>
                    <td>$email</td>
                    <td>$origin</td>
                    <td>$destiny</td>
                    <td>$receiver</td>
                    <td>$status</td>
                    <td>
                        <button type = "submit" name = "up" form = "formUp">
                            Update
                        </button>
                    </td>
                </tr>
TBODY;
            echo '</table>';
            echo '</div>';
            echo '</form>';
            echo '<form action = "modifyOrders.php" method = "POST" id = "formUp">
            <input type = "hidden" name = "id" value = '. $id .' />
            <input type = "hidden" name = "theTrack" value = '. $trackId .' />
            <input type = "hidden" name = "stat" value = '. $status .' />
            </form>';
        } else if(isset($_SESSION['custName']) || !isset($_SESSION['custName'])){
                echo '<table border = "1">';
                echo <<<THEAD
                <thead>
                    <tr>
                        <th>Tracking ID</th>
                        <th>Sender Name</th>
                        <th>Sender Email</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Receiver</th>
                        <th>Status</th>
                    </tr>
                </thead>
THEAD;
            echo <<<TBODY
                    <tr>
                        <td>$trackId</td>
                        <td>$sender</td>
                        <td>$email</td>
                        <td>$origin</td>
                        <td>$destiny</td>
                        <td>$receiver</td>
                        <td>$status</td>
                    </tr>
TBODY;
            echo '</table>';
            echo '</div>';
            echo '</form>';
        }
    } else {
        echo '<center>';
        echo 'No Shipping Available';
        echo '</center>';
    }
}
?>
</body>
</html>