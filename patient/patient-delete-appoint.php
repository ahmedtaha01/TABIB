<?php
require_once '../queryHandlerclass/query.php';

$appointment_id = $_GET['id'];

queryHandler::DeleteData('appointment',"appointment_id = '$appointment_id'");

header('location:dashboard-bookings.php');
exit;
?>