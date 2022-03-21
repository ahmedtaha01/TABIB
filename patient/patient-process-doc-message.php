<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_POST['subit'])){
    $doctor_name='';

    if(isset($_POST['doctor'])){
        $doctor_name = $_POST['doctor'];         //check if doctor is selected
    }
    
    $content = $_POST['textareaContent'];

    $patient_id = $_SESSION['PATIENT_ID'];
    if($doctor_name == null || $content == null){
        $_SESSION['empty_inputs'] = true;
    } else {
        $datetime = date("y-m-d h:i:s");
        $boolean_doctor_id = queryHandler::getData('doctors','id',"username = '$doctor_name'");
        $doctor_id = $boolean_doctor_id->fetch(PDO::FETCH_ASSOC);
        queryHandler::AddData('messages','patient_id,doctor_id,patient_message,_datetime',
        "'$patient_id','{$doctor_id['id']}','$content','$datetime'");
    }
    header('location:dashboard-messages.php');
    exit;
} else {
    header('location:dashboard-home.php');
    exit;
}




?>