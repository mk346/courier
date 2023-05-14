<?php
$from_date = "";
$to_date = "";
$status = "";
$update = "";
$err_array = array();
$sender_name = "";
$recipient_name = "";
$date_created = "";
$amount = "";
$i = 0;
if(isset($_POST['filter'])){
    $status = $_POST['status'];
    $from_date = $_POST['from'];
    $to_date = $_POST['to'];
    //echo $status;

    $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out of Delivery", "Ready for Pickup", "Delivered", "Picked-Up", "Unsuccessful Delivery Attempt") ;

    if($status == 'all'){
        $query = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date'";
        $result = mysqli_query($con,$query);

    
        if($result){
            $rows = mysqli_num_rows($result);
            if($rows > 0){
                foreach($result as $data){
                    $i++;
                    $sender_name = $data['sname'];
                    $recipient_name = $data['rname'];
                    $date_created = date("M d, Y", strtotime($data['date_created']));
                    $update = $status_arr[$data['status']];
                    $amount = number_format($data['amount'],2);
                }
            }else if($rows <= 0){
                array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
    
            }
        }
    }
    else{
        //echo "this an else";
        $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
        $result2 = mysqli_query($con,$query2);
        
        if($result2){
            $rows = mysqli_num_rows($result2);
            //$i = 0;
            if($rows > 0){
                foreach($result2 as $data){
                    $i++;
                    $sender_name = $data['sname'];
                    $recipient_name = $data['rname'];
                    $date_created = date("M d, Y", strtotime($data['date_created']));
                    $update = $status_arr[$data['status']];
                    $amount = number_format($data['amount'],2);
                }
            }else if($rows <= 0){
                array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
    
            }
        }

    }
    



}





?>