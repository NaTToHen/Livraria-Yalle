<?php
error_reporting();

$conn = new mysqli("localhost", "root", "", "Yalle");
if($conn -> connect_errno) {
   die($misqli -> connect_errno);
}
?>