<?php
 require_once '../queryHandlerclass/query.php';

 $the_boolean = queryHandler::getData('appointment','COUNT(appointment_id) as num',"1");
 $number_of_rows = $the_boolean->fetch(PDO::FETCH_ASSOC);

 $items_per_page = 2;       

 $number_of_pages = ceil($number_of_rows['num'] / $items_per_page);    // celing because of odd numbers

  if(isset($_GET['num'])){
    $_SESSION['page_number_admin_appoint'] = $_GET['num'];
  }
  if(!isset($_SESSION['page_number_admin_appoint'])){    // check for the first entry there is no session
   $_SESSION['page_number_admin_appoint'] = 1;          // so error will be established
}  
 if(isset($_GET['state']) && $_GET['state'] == 'previous'){
   if($_SESSION['page_number_admin_appoint'] != 1){
    
    $_SESSION['page_number_admin_appoint'] =  $_SESSION['page_number_admin_appoint'] -1;
       
    }
 } else if (isset($_GET['state']) && $_GET['state'] == 'next'){ 
    if($_SESSION['page_number_admin_appoint'] != $number_of_pages){
    
      $_SESSION['page_number_admin_appoint'] =  $_SESSION['page_number_admin_appoint'] +1;
        
    }
    
}

 $offset = $items_per_page * ($_SESSION['page_number_admin_appoint'] -1);              //start
 $limit = $items_per_page;                               // number of items
 
      
?>