<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_GET['messageid'])){
    $id = $_GET['messageid'];
    $sql_statement = queryHandler::DeleteData("messages","id ='$id'");
    if ($sql_statement){
        header("location:dashboard-messages.php");
        exit();
    }
}else
{
    header("location:dashboard-messages.php");
    exit();
}