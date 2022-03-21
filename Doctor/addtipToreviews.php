<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (!isset($_SESSION['DOCTOR_ID'])){
    header("location:../login/index.php");
    exit();
}
if (isset($_POST['submit'])){
    $doctip = $_POST['doctip'];
    $docid = $_GET['docid'] ;
    $sql_statement = queryHandler::AddData("tips","doctor_id,doctor_tip","'$docid','$doctip'");
    if ($sql_statement){
        header("location:dashboard-home.php");
        exit();
    }
}