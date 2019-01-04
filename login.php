<?PHP
session_start();
if(isset($_SESSION['custName']) || isset($_SESSION['admin'])){
    header('location: index.php');
}

include("src/config.php");
$exe = new config();

if(isset($_POST['signIn'])){
    $user = $exe->login($_POST['username'], $_POST['userpass']);
    $uname = '';
    $upass = '';
    $userType = '';
    $userId = '';
    $fname = '';
    $email = '';
    $lname = '';

    while($row = $user->fetch_assoc()) {
        $uname = $row['username'];
        $upass = $row['userpass'];
        $userType = $row['type'];
        $userId = $row['Id'];
        $fname = $row['fName'];
        $email = $row['email'];
        $lname = $row['lName'];
    }
    
    if($uname === $_POST['username'] && $upass === $_POST['userpass']){
        if($userType === '0'){
            session_start();
            $_SESSION['custName'] = $uname;
            $_SESSION['custId'] = $userId;
            $_SESSION['fname'] = $fname;
            $_SESSION['email'] = $email;
            header('location: yourPanel.php');
        } else if($userType === '1'){
            session_start();
            $_SESSION['admin'] = $uname;
            //$_SESSION['custId'] = $userId;
            header('location: adminpanel.php');
        }
    } else {
        echo '<script type = "text/javascript">
            alert("Wrong Credentials")
        </script>';
    }
}
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
<body style="background-image: url(images/cargo.jpg);background-size:cover;background-repeat:no repeat; width: 100%; height: 100%;">    
    <main> 
       <header>
            <div class="blank-nav">
                <a href = "index.php"><img src = "images/logo.png" id = "home-logo" /></a>
            </div>
        </header>
    <div id = "loginForm">
        <form action = "" method = "POST" id = "form1" style="padding-bottom: 140px ">
            <center>
                    <div class = "signIn">
                        <br> <h2 class="title">Log in</h2>
                    </div>
                    <input type = "text" name = "username" placeholder="Username" />
                    <input type = "password"  name = "userpass" placeholder="Password" />
                <p>
                    <button type = "submit" name = "signIn" id = "signIn">
                        Log In
                    </button><br>
                    Don't have an account? <a href="signUp.php">Sign Up</a>
                </p>
            </center>
        </form>
    </div>
    <footer style="background: rgb(0,0,0,0.5)">
        <p>&copy; Copyright 2018</p>
        <p>HardCode</p>
    </footer>
</body>
</html>

