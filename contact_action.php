<?php
require ('inc_file/network.php');
$fullname = $_POST['fullname'];
$old_number = $_POST['old_number'];
$new_number = $_POST['new_number'];
$complain = $_POST['complain'];

$sql = mysql_query("INSERT INTO complains (`id`, `fullname`, `old_number`, `new_number`, `complain`) VALUES ('','$fullname','$old_number','$new_number','$complain')");
$_SESSION['msg']="Complain Sent successfully!!!";
header("Location:contact.php");
?>