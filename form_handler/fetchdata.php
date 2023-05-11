<?php
$ref_no = "";
$err_array = array();
$track_number;
$reference_number;
if(isset($_POST['submit'])){
    $ref_no = strip_tags($_POST['track_no']);
    $qry2 = "SELECT * FROM parcels WHERE reference_number = '$ref_no'";
    $result = mysqli_query($con, $qry2);
    if($result){
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            //echo "reference number found";
            while($rows = mysqli_fetch_assoc($result)){
                $reference_number = $rows['reference_number'];
                $origin = $rows['saddress'];
                $destination = $rows['raddress'];
                //echo $reference_number;
            }
        }else if($rows <= 0){
            array_push($err_array, "<span style='color: red;'>Tracking Number Not Found</span><br>");
        }
    }



}





//$query = "SELECT * FROM parcels WHERE reference_no = '$ref_no'";
?>