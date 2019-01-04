<?PHP
    class config{
        public function db(){
            $db = new mysqli("127.0.0.1", "root", "", "cargo");
            if(!$db) return false;
            return $db;
        }

        public function escapeChar($text){
            $string = mysqli_real_escape_string($this->db(), $text);
            return $string;
        }

        public function reg($fname, $lname, $contact, $username, $email, $userpass, $confirmPass){
            $active = 1;
            $connect=$this->db();
            $insert = "INSERT INTO tbl_users(fName, lName, contact, username, email, userpass, confirmPass, active)
                                    VALUES('$fname', '$lname', '$contact', '$username', '$email', '$userpass', '$confirmPass', '$active')";
            $execute = $connect->query($insert);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function addCargo($custId, $senderName, $senderEmail, $senderContact, $postalCode, $address, $origin, $destination,
        $receiver, $serviceType, $quantity, $weight, $cargoType, $trackId, $totalPrice, $paidAmount){
            $status = 'PENDING';
            $notif = 0;
            $connection=$this->db();
            $addCargo = "INSERT INTO tbl_cargo(custId, senderName, senderEmail, senderContact, postalCode, theAddress, origin, destination,
                                                receiver, serviceType, quantity, theWeight, cargoType, trackId, totalPrice, paidAmount, theStatus, levelStatus)
                                        VALUES('$custId', '$senderName', '$senderEmail', '$senderContact', '$postalCode', '$address', '$origin',
                                                '$destination', '$receiver', '$serviceType', '$quantity', '$weight', '$cargoType', '$trackId',
                                                '$totalPrice', '$paidAmount', '$status', '$notif')";
            $execute = $connection->query($addCargo);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function updateCargo($id, $trackingId, $theStatus){
            $connect=$this->db();
            $up = "UPDATE tbl_cargo SET theStatus = '$theStatus', levelStatus = '1' WHERE Id = '$id' AND trackId = '$trackingId'";
            $execute = $connect->query($up);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function notify($theId, $not){
            $connect=$this->db();
            $bode = "UPDATE tbl_cargo SET levelStatus = '$not' WHERE custId = '$theId'";
            $execute = $connect->query($bode);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function updatePassword($custId, $custPassword, $custConfirm){
            $connect=$this->db();
            $update = "UPDATE tbl_users SET userpass = '$custPassword', confirmPass = '$custConfirm' WHERE Id = '$custId'";
            $execute = $connect->query($update);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function updateName($id, $name){
            $connect=$this->db();
            $upname = "UPDATE tbl_users SET fName = '$name' WHERE Id = '$id'";
            $execute = $connect->query($upname);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function updateEmail($id, $email){
            $connect=$this->db();
            $upmail = "UPDATE tbl_users SET email = '$email' WHERE id = '$id'";
            $execute = $connect->query($upmail);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function updateUsername($id, $username){
            $connect=$this->db();
            $upUsername = "UPDATE tbl_users SET username = '$username' WHERE id = '$id'";
            $execute = $connect->query($upUsername);
            if($execute){
                return true;
            } else {
                return false;
            }
        }

        public function randomString(){
            $charset = "0123456789";
            $base = strlen($charset);
            $result = "";
            $now = explode(' ', microtime())[1];
            while($now >= $base){
                $i = $now % $base;
                $result = $charset[$i] . $result;
                $now /= $base;
            }
            $res = substr($result, +1, 9);
            return str_shuffle($res);
        }

        public function login($username, $password){
            $connect=$this->db();
            $select = "SELECT * FROM tbl_users WHERE username = '$username' AND userpass = '$password'";
            $execute = $connect->query($select);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function customers($custID){
            $connect=$this->db();
            $select = "SELECT * FROM tbl_cargo WHERE custId = '$custID'";
            $execute = $connect->query($select);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function search($trackingNo){
            $connect=$this->db();
            $search = "SELECT * FROM tbl_cargo WHERE trackId = '$trackingNo'";
            $execute = $connect->query($search);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function view(){
            $connect=$this->db();
            $search = "SELECT * FROM tbl_cargo";
            $execute = $connect->query($search);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function filter_shipping(){
            $connect=$this->db();
            $filter = "SELECT * FROM tbl_cargo";
            $execute = $connect->query($filter);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function users($customerId){
            $connect=$this->db();
            $display = "SELECT * FROM tbl_users WHERE Id = '$customerId'";
            $execute = $connect->query($display);
            if($execute){
                return $execute;
            } else {
                return false;
            }
        }

        public function order($order_id){
            $connect=$this->db();
            $sel = "SELECT Id, trackId, theStatus FROM tbl_cargo WHERE Id = '$order_id'";
            $qry = $connect->query($sel);
            if($qry){
                return $qry;
            } else {
                return false;
            }
        }
    }
?>