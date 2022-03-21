<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_GET['id'])){
    ///to delete photo from folder
    $patient_boolean =  queryHandler::getData('patients','img_path',"id = '{$_GET['id']}'");
    $data_of_image = $patient_boolean->fetch(PDO::FETCH_ASSOC);
    $image = $data_of_image['img_path'];
    if($image != ''){
        unlink("../patientPhotos/$image");
    }

    /// delete patient from database
    queryHandler::DeleteData('patients',"id = '{$_GET['id']}'");
    

    // coorection of pagination
    $the_boolean = queryHandler::getData('patients','COUNT(id) as num','');
    $number_of_rows = $the_boolean->fetch(PDO::FETCH_ASSOC);
 
    $items_per_page = 3;       
    
    $number_of_pages = ceil($number_of_rows['num'] / $items_per_page); 
    if($_SESSION['page_number_admin_patients'] > $number_of_pages){
        $_SESSION['page_number_admin_patients'] =  $_SESSION['page_number_admin_patients'] -1;  // not to 
    }                                                                                             //break pages
    header('location:dashboard-my-patients.php');
    exit;
} else {
    header('location:dashboard-home.php');
    exit;
}


?>