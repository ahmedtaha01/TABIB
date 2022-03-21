<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_GET['id'])){

    
    queryHandler::DeleteData('testimonials',"id = '{$_GET['id']}'");
    

    // coorection of pagination
    $the_boolean = queryHandler::getData('testimonials','COUNT(id) as num','');
    $number_of_rows = $the_boolean->fetch(PDO::FETCH_ASSOC);
 
    $items_per_page = 3;       
    
    $number_of_pages = ceil($number_of_rows['num'] / $items_per_page); 
    if($_SESSION['page_number_admin_reviews'] > $number_of_pages){
        $_SESSION['page_number_admin_reviews'] =  $_SESSION['page_number_admin_reviews'] -1;  // not to 
    }                                                                                             //break pages
    header('location:dashboard-reviews.php');
    exit;
} else {
    header('location:dashboard-home.php');
    exit;
}


?>