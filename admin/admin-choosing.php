<?php
session_start();
require_once '../queryHandlerclass/query.php';

if(isset($_SESSION['ADMIN_NAME'])){
    header('location:dashboard-home.php');
    exit;
} else {
    $admin_boolean = queryHandler::getData('admins','*','1');
    $data_of_admin = $admin_boolean->fetchAll(PDO::FETCH_ASSOC);    
}


?>

<ul>
    <?php
        if(!empty($data_of_admin)){
            foreach($data_of_admin as $one_admin){ ?>
                <li><a href="dashboard-home.php?id=<?=$one_admin['id'] ?>"><?= $one_admin['username']?></a></li>
           <?php }
        } 
    ?>
    
</ul>