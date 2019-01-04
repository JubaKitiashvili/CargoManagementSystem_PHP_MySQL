<?php
session_start();
include('src/config.php');
$exe = new config();

if(!isset($_SESSION['admin'])){
    header('location: login.php');
}

echo '<div id = "adminPanel">';
echo 'Hello, ' . $_SESSION['admin'] . '<br>';
echo '<a href = "adminpanel.php?view=viewRecords">View Records</a><br>';
echo '<a href = "adminpanel.php?view=viewReports">View Reports</a><br>';
echo '<a href = "trackOrders.php">Track Orders</a><br>';
echo '<a href = "logout.php">Log out</a><br>';
echo '</div>';

if(isset($_GET['view'])){
    
    if($_GET['view'] === 'viewRecords'){
        $show = $exe->view();
        
        echo '<form action = "adminpanel.php?view=orders" method = "POST">';

        echo '<div id = "category-container">';
        echo '<label>Categories</label>';
        echo '<select name = "shipping-category" id = "shipping-category">';
        echo '<option>Categorize by:</option>';
        echo '<option>Service Type</option>';
        echo '<option>Cargo Type</option>';
        echo '<option>Status</option>';
        echo '</select>';
        echo '<input type = "submit" name = "catBy" value = "Cata" >';
        echo '</div>';

        echo '<table border = "1" style = "width: 100%;">';
        echo <<<THEAD
            <tr>
                <th>Tracking ID</th>
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Package</th>
                <th>Origin</th>
                <th>Type of Service</th>
                <th>Destination</th>
                <th>Receiver</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
THEAD;
        while($details = $show->fetch_assoc()){
            $_SESSION['sender_name'] = $details['senderName'];
            $_SESSION['sender_email'] = $details['senderEmail'];
            $_SESSION['service_type'] = $details['serviceType'];
            $_SESSION['sender_origin'] = $details['origin'];
            $_SESSION['destination'] = $details['destination'];
            $_SESSION['receiver'] = $details['receiver'];
            $_SESSION['cargo_type'] = $details['cargoType'];
            $_SESSION['track_id'] = $details['trackId'];
            $_SESSION['status'] = $details['theStatus'];
            $_SESSION['cust_id'] = $details['Id'];
        
            print <<<TBODY
            <tr>
                <input type = "hidden" name = "cust_id" value = "$_SESSION[cust_id]" >
                <td>$_SESSION[track_id]</td>
                <input type = "hidden" name = "track_id" value = "$_SESSION[track_id]" >
                <td>$_SESSION[sender_name]</td>
                <input type = "hidden" name = "sender_name" value = "$_SESSION[sender_name]" >
                <td>$_SESSION[sender_email]</td>
                <input type = "hidden" name = "sender_email" value = "$_SESSION[sender_email]" >
                <td>$_SESSION[cargo_type]</td>
                <input type = "hidden" name = "cargo_type" value = "$_SESSION[cargo_type]" >
                <td>$_SESSION[sender_origin]</td>
                <input type = "hidden" name = "country_of_origin" value = "$_SESSION[sender_origin]" >
                <td>$_SESSION[service_type]</td>
                <input type = "hidden" name = "type_of_service" value = "$_SESSION[service_type]" >
                <td>$_SESSION[destination]</td>
                <input type = "hidden" name = "destination" value = "$_SESSION[destination]" >
                <td>$_SESSION[receiver]</td>
                <input type = "hidden" name = "receiver" value = "$_SESSION[receiver]" >
                <td>$_SESSION[status]</td>
                <input type = "hidden" name = "stat" value = "$_SESSION[status]" >
                <td>
                    <a href = "modifyOrders.php?order_id={$_SESSION['cust_id']}" name = "up">Modify Orders</a>
                </td>
            </tr>
TBODY;

        }
        echo '</table>';
        echo '</form>';
    }

    // view reports

    // categorize shipping
    if($_GET['view'] === 'orders'){
        $filter_by = $_POST['shipping-category'];
        if($filter_by === 'Service Type'){
            $filter_by_service = $exe->filter_shipping();

            echo '<div id = "service-type">';
            echo '<table border = "1" style = "width: 100%;">';
            echo <<<table_head
                <tr>
                    <th>Tracking ID</th>
                    <th>Sender Name</th>
                    <th>Service Type</th>
                </tr>
table_head;

            while($rows = $filter_by_service->fetch_assoc()){
                $cust_id = $rows['Id'];
                $track_id = $rows['trackId'];
                $sender_name = $rows['senderName'];
                $service_type = $rows['serviceType'];

                echo <<<table_body
                <tr>
                    <input type = "hidden" name = "cust_id" value = "$cust_id">
                    <input type = "hidden" name = "track_id" value = "$track_id">
                    <td>$track_id</td>
                    <input type = "hidden" name = "sender_name" value = "$sender_name">
                    <td>$sender_name</td>
                    <input type = "hidden" name = "service_type" value = "$service_type">
                    <td>$service_type</td>
                </tr>
table_body;
            }
            echo '</table>';
            echo '</div>';
        } else if($filter_by === 'Cargo Type'){
            $filter_by_cargo = $exe->filter_shipping();

            echo '<div id = "cargo-type">';
            echo '<table border = "1" style = "width: 100%;">';
            echo <<<table_head
                <tr>
                    <th>Tracking ID</th>
                    <th>Sender Name</th>
                    <th>Cargo Type</th>
                </tr>
table_head;

            while($result = $filter_by_cargo->fetch_assoc()){
                $cust_id = $result['Id'];
                $track_id = $result['trackId'];
                $sender_name = $result['senderName'];
                $cargo_type = $result['cargoType'];

                echo <<<table_body
                <tr>
                    <input type = "hidden" name = "cust_id" value = "$cust_id">
                    <input type = "hidden" name = "track_id" value = "$track_id">
                    <td>$track_id</td>
                    <input type = "hidden" name = "sender_name" value = "$sender_name">
                    <td>$sender_name</td>
                    <input type = "hidden" name = "cargo_type" value = "$cargo_type">
                    <td>$cargo_type</td>
                </tr>
table_body;
            }
            echo '</table>';
            echo '</div>';
        } else if($filter_by === 'Status'){
            $filter_by_status = $exe->filter_shipping();

            echo '<div id = "status-type">';
            echo '<table border = "1" style = "width: 100%;">';
            echo <<<table_head
                <tr>
                    <th>Tracking ID</th>
                    <th>Sender Name</th>
                    <th>Status</th>
                </tr>
table_head;

            while($result = $filter_by_status->fetch_assoc()){
                $cust_id = $result['Id'];
                $track_id = $result['trackId'];
                $sender_name = $result['senderName'];
                $status_type = $result['theStatus'];

                echo <<<table_body
                <tr>
                    <input type = "hidden" name = "cust_id" value = "$cust_id">
                    <input type = "hidden" name = "track_id" value = "$track_id">
                    <td>$track_id</td>
                    <input type = "hidden" name = "sender_name" value = "$sender_name">
                    <td>$sender_name</td>
                    <input type = "hidden" name = "status_type" value = "$status_type">
                    <td>$status_type</td>
                </tr>
table_body;
            }

            echo '</table>';
            echo '</div>';
        } else if($filter_by === 'Categorize by:'){
            echo 'LOL';
        }
    }
}
?>