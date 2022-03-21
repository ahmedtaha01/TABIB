<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_POST['subit'])){
    $patient_id = $_SESSION['PATIENT_ID'];
    $patient_name = $_POST['username'];
    $doctor_name = $_POST['doctor'];
    $cause = $_POST['cause'];

    $doctor_boolean = queryHandler::getData('doctors','id,time_of_presense',"username = '$doctor_name'");
    $data_to_enter = $doctor_boolean->fetch(PDO::FETCH_ASSOC);

    $doctor_id = $data_to_enter['id'];
    $doctor_time_presence = $data_to_enter['time_of_presense'];

    $time_of_reservation = date("y-m-d h:i:s");

    $added = queryHandler::AddData('appointment','patient_id,doctor_id,cause,time_appointment,time_reservation',
                        "'$patient_id','$doctor_id','$cause','$doctor_time_presence','$time_of_reservation'");
    
    if($added){
        $_SESSION['added']='true';
    }
    header('location:dashboard-appointment.php');
    exit;                  
} else {
    header('location:dashboard-appointment.php');
    exit;
}

?>