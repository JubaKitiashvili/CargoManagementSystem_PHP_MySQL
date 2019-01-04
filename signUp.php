<?PHP
session_start();
include("src/config.php");
$exe = new config();

if(isset($_SESSION['admin']) || isset($_SESSION['custName'])){
    header('location: index.php');
}

if(isset($_POST['signUp'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $newUsername = $_POST['regUsername'];
    $regEmail = $_POST['regEmail'];
    $password = $_POST['regPass'];
    $confirmPass = $_POST['confirm'];

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contact']) && isset($_POST['regUsername']) && isset($_POST['regEmail']) && isset($_POST['regPass']) && isset($_POST['confirm'])){
        if($password === $confirmPass){
            $exe->reg($fname, $lname, $contact, $newUsername, $regEmail, $password, $confirmPass);
            if($exe){
                echo <<<SCRIPT
                <script type = "text/javascript">
                    alert('New User Added!')
                </script>
SCRIPT;
                header('location: login.php');
            } else {
                echo "Password does not match";
            }
        } else {
            echo <<<SCRIPT
                <script type = "text/javascript">
                    alert('The Password field and Confirm Password field does not match!');
                </script>
SCRIPT;
            header('location: login.php');
        }
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

    <main> 
      
        <body style="background-image: url(images/cargo.jpg);background-size:cover;background-repeat:no repeat; width: 100%; height: 100%;">
            <header>
                <div class="blank-nav">
                    <img src="images/iac.png"/>
                    <a href="login.php" style="float: right; padding: 20px; margin-right: 120px; font-size: 18px; color: #ffffff; ">Back</a>
                </div>
            </header>


    <div id = "regForm">
        <form action = "" method = "POST" id = "form2">
            <center>
            <div class = "signUp">
                <h2 class="title">Sign Up</h2>
            </div>
            
                <input type = "text" required name = "fname" placeholder="Enter your First Name " />
                <input type = "text" required name = "lname" placeholder="Enter your Last Name" />                
                <input type = "text" name = "contact" placeholder="Contact Number" />
                <input type = "text" required name = "regUsername" placeholder="Create Username" />
                <input type = "text" required name = "regEmail"  placeholder="Enter your E-mail" />
                <input type = "password" required name = "regPass" placeholder="Create Password" />
                <input type = "password" required name = "confirm" placeholder="Confirm Password" />
            <p>
                <button type = "submit" name = "signUp" id = "signUp">
                    Sign Up
                </button>
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

