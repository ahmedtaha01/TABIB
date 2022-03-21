<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_GET['id'])){
    queryHandler::DeleteData('appointment',"appointment_id = '{$_GET['id']}'");
    
    $the_boolean = queryHandler::getData('appointment','COUNT(appointment_id) as num','');
    $number_of_rows = $the_boolean->fetch(PDO::FETCH_ASSOC);
 
    $items_per_page = 3;       

    $number_of_pages = ceil($number_of_rows['num'] / $items_per_page); 
    if($_SESSION['page_number_admin_appoint'] > $number_of_pages){
        $_SESSION['page_number_admin_appoint'] =  $_SESSION['page_number_admin_appoint'] -1;  // not to 
    }                                                                                         //break pages
    header('location:dashboard-bookings.php');
    exit;
} else {
    header('location:dashboard-home.php');
    exit;
}


?>