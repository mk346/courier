<?php
//variables declaration
$street = "";
$city = "";
$code = "";
$postal = "";
$county = "";
$contact = ""; 
if(isset($_POST['save_branch'])){
    $street = strip_tags($_POST['street']); //strip html tags
    $street = ucfirst(strtolower($street)); //capitalize first character
    $_SESSION['street'] = $street; //store sessesion variable

    $city = strip_tags($_POST['city']); //strip html tags
    $city = ucfirst(strtolower($city)); //capitalize first character
    $_SESSION['city'] = $city; //store sessesion variable

    $code = strip_tags($_POST['code']); //strip html tags
    $code = str_replace(' ', '', $code); //remove spaces
    $_SESSION['code'] = $code; //store sessesion variable

    $postal = strip_tags($_POST['postal']); //strip html tags
    $postal = str_replace(' ', '', $postal); //remove spaces
    $_SESSION['postal'] = $postal; //store sessesion variable

    $county = strip_tags($_POST['county']); //strip html tags
    $county = str_replace(' ', '', $county); //remove spaces
    $county = ucfirst(strtolower($county)); //capitalize first character
    $_SESSION['county'] = $county; //store sessesion variable

    $contact = strip_tags($_POST['contact']); //strip html tags
    $contact = str_replace(' ', '', $contact); //remove spaces
    $_SESSION['contact'] = $contact; //store sessesion variable

    $query = mysqli_query($con, "INSERT INTO branch VALUES('','$street','$city','$code','$postal','$county','$contact')");

    //clear session data
    $_SESSION['street'] = "";
    $_SESSION['city'] = "";
    $_SESSION['code'] = "";
    $_SESSION['postal'] = "";
    $_SESSION['county'] = "";
    $_SESSION['contact'] = "";

    header("Location: branchlist.php");

}


?>