<?php
error_reporting();

$conn = new misqli("localhost", "root", "", "");
if($conn ->connect_errno) {
   echo "falha ao se conectar com o servidor".$misqli -> connect_errno;
}
?>