<?php
require_once '../queryHandlerclass/query.php';

if(isset($_POST['doctor_name'])){
    $doctor_name = $_POST['doctor_name'];
    $doctor_time_boolean = queryHandler::getData('doctors','time_of_presense',"username = '$doctor_name'");
    $doctor_time = $doctor_time_boolean->fetch(PDO::FETCH_ASSOC);
    echo $doctor_time['time_of_presense'];
}


?>