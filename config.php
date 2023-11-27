<?php
$connect=new mysqli("localhost","root","","youcontact");
if(!$connect){
    die(mysqli_error($connect)) ; 
}
?>
