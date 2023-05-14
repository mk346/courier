<?php
//session_start();
ini_set('display_errors', 1);

class Action{
    private $db;

    public function __construct()
    {
        ob_start();

        include 'config/config.php';

        $this->db = $con;
    }

    function __destruct()
    {
        $this->db->close();
        ob_end_flush();
    }

    function get_parcel_data()
    {
        extract($_POST);
        $data = array();
        $parcel = $this->db->query("SELECT * FROM parcels WHERE reference_number = '$ref_no'");
        if ($parcel->num_rows <= 0) {
            return 2;
        } else {
            $parcel = $parcel->fetch_array();
            $data[] = array('status' => 'Item Accepted by Courier', 'date_created' => date("M d, Y h:i A", strtotime($parcel['date_created'])));
            $history = $this->db->query("SELECT * FROM parcels WHERE parcel_id = {$parcel['id']}");
            $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out of Delivery", "Ready for Pickup", "Delivered", "Picked-Up", "Unsuccessful Delivery Attempt");
            while ($row = $history->fetch_assoc()){
                $row['date_created'] = date("M d, Y h:i A", strtotime($row['date_created']));
                $row['status'] = $status_arr[$row['status']];
                $data[] = $row;
            }
            return json_encode($data);
        }
    }
}





?>