<?php
session_start();
require_once '../queryHandlerclass/query.php';

$doctor_id = $_GET['id'];                             
$patient_id = $_SESSION['PATIENT_ID'];

$doctor_boolean = queryHandler::getData('doctors','subscribe',"id = '$doctor_id'");

$array_of_subscribtion = $doctor_boolean->fetch(PDO::FETCH_ASSOC);

$number_of_subscribtion = $array_of_subscribtion['subscribe'];

$exist_boolean = queryHandler::getData('subscribtion','*',"doctor_id='$doctor_id' AND patient_id ='$patient_id'");
$array_exist_subiscribtion = $exist_boolean->fetch(PDO::FETCH_ASSOC);


if($array_exist_subiscribtion){
                                    // if he already voted him                      
    $number_of_subscribtion = $number_of_subscribtion - 1;

    queryHandler::UpdateData('doctors',"subscribe ='$number_of_subscribtion'","id = '$doctor_id'");
    queryHandler::DeleteData('subscribtion',"doctor_id = '$doctor_id' AND patient_id = '$patient_id'");
} else {
                                    // if want to vote him
    $number_of_subscribtion = $number_of_subscribtion + 1;
    queryHandler::UpdateData('doctors',"subscribe ='$number_of_subscribtion'","id = '$doctor_id'");
    queryHandler::AddData('subscribtion','doctor_id,patient_id',"'$doctor_id','$patient_id'");
}


header('location:dashboard-my-doctors.php');
exit;
?>