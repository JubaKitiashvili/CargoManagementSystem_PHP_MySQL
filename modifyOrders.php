<?PHP
session_start();
include('src/config.php');
$exe = new config();

if(isset($_GET['order_id'])){
    $get_data = $exe->order($_GET['order_id']);

    while($rows = $get_data->fetch_assoc()){
        $cust_id = $rows['Id'];
        $track_id = $rows['trackId'];
        $cargo_status = $rows['theStatus'];
    }

    echo '<div id = "form-update">
        <form method = "POST" class = "post_data">
            <input type = "text" readonly name = "idUlet" value = '. $cust_id .' >
            <input type = "text" readonly name = "trackUlet" value = '. $track_id .' >
            <select name = "select-status">
                <option value = '. $cargo_status .'>'. $cargo_status .'</option>
                <option value = "PENDING">PENDING</option>
                <option value = "PROCESSING">PROCESSING</option>
                <option value = "ON THE WAY">ON THE WAY</option>
                <option value = "DELIVERED">DELIVERED</option>
                <option value = "CANCELLED">CANCELLED</option>
            </select>
            <button type = "submit" name = "update" >
                Modify
            </button>    
        </form>
    </div>';

} else {
    header('location: adminpanel.php');
}

if(isset($_POST['update'])){
    if(isset($_POST['idUlet']) && isset($_POST['trackUlet']) && isset($_POST['select-status'])){
        $level = '1';
        $exe->updateCargo($_POST['idUlet'], $_POST['trackUlet'], $_POST['select-status'], $level);
        if($exe){
            echo 'UPDATED' . '<br>';
            echo "<a href = 'trackOrders.php'>Let's Go Back now...</a><br>";
            echo '<style type = "text/css">
                .post_data{
                    display: none;
                }
            </style>';
        } else {
            echo 'ERR!';
        }
    }
} else {
    // do nothing...
}
?>