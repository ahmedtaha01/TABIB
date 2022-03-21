<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_POST['submit'])){
    $doctor_reply = $_POST['docreply'];
    $id = $_GET['messageid'] ;
    $sql_statement = queryHandler::UpdateData("messages","doctor_reply='$doctor_reply'","id='$id'");
    var_dump($sql_statement);
    if ($sql_statement){
        header("location:dashboard-messages.php");
        exit();
    }
}
else
{
    header("location:replyMessage.php");
    exit();
}