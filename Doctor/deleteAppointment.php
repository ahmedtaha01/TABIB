<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_GET['Appointment_id'])){
    $id = $_GET['Appointment_id'];
    $sql_statement = queryHandler::DeleteData("appointment","Appointment_id ='$id'");
    if ($sql_statement){
        header("location:dashboard-my-patients.php");
        exit();
    }
}else
{
    header("location:dashboard-my-patients.php");
    exit();
}