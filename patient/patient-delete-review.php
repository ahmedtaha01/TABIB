<?php 
require_once '../queryHandlerclass/query.php';

$review_id = $_GET['id'];

queryHandler::DeleteData('testimonials',"id = '$review_id'");

header('location:dashboard-reviews.php');
exit;

?>