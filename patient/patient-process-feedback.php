<?php
session_start();
require_once '../queryHandlerclass/query.php';


if(isset($_POST['subit'])){
    $textareaContent = $_POST['textareaContent'];
    
    $date = date("y-m-d h:i:s");
    
    queryHandler::AddData('testimonials',"content,patient_id,_datetime"," '$textareaContent ' , '{$_SESSION['PATIENT_ID']}' , '$date' ");
    
    header('location:dashboard-home.php');
    exit;
}else {
    header('location:dashboard-home.php');
    exit;
}


?>