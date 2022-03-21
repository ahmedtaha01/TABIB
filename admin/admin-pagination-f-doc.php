<?php
 require_once '../queryHandlerclass/query.php';

 $the_boolean = queryHandler::getData('doctors','COUNT(id) as num','');
 $number_of_rows = $the_boolean->fetch(PDO::FETCH_ASSOC);
 
 $items_per_page = 3;       

 $number_of_pages = ceil($number_of_rows['num'] / $items_per_page);    // celing because of odd numbers
 
 if(isset($_GET['num'])){
    $_SESSION['page_number_admin_mydoctors'] = $_GET['num'];
 }

  if(!isset($_SESSION['page_number_admin_mydoctors'])){      //check for the first entry there is no session
   $_SESSION['page_number_admin_mydoctors'] = 1;             // so error will be established
  }                                                            //of course first entry means page 1
 if(isset($_GET['state']) && $_GET['state'] == 'previous'){
   if($_SESSION['page_number_admin_mydoctors'] != 1){              

      $_SESSION['page_number_admin_mydoctors'] =  $_SESSION['page_number_admin_mydoctors'] -1;                                     
    
    }
 } else if (isset($_GET['state']) && $_GET['state'] == 'next'){ 
    if($_SESSION['page_number_admin_mydoctors'] != $number_of_pages){
    
      $_SESSION['page_number_admin_mydoctors'] = $_SESSION['page_number_admin_mydoctors'] +1;
    
    }
 }

 $offset = $items_per_page * ($_SESSION['page_number_admin_mydoctors']-1);              //start
 $limit = $items_per_page;                               // number of items
 
      
?>
