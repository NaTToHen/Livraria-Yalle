<?php
error_reporting();

$conn = new mysqli("localhost", "root", "", "yalledb");
if($conn -> connect_errno) {
   header("Location: erro.php");
}
?>