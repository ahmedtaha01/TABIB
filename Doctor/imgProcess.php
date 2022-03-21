<?php
session_start() ;
require_once "../queryHandlerclass/query.php";
if (isset($_POST['submit'])){
    $img_arr =   $_FILES['img'];
    $img_name = $img_arr['name'] ;
    $img_type = $img_arr['type'] ;
    $img_tmp = $img_arr['tmp_name'] ;
    $img_size = $img_arr['size'] ;

    $To_path = __DIR__.'\imgs\\'.basename($img_name) ;
    move_uploaded_file($img_tmp,$To_path);
    echo $To_path;
    if ($img_size> 600000) {
        $_SESSION['alert'] = "Sorry, your file is too large.";
        header("location:dashboard-my-profile.php");
        exit();
    }

    if($_FILES['img']['type'] != "image/jpg" && $_FILES['img']['type'] != "image/png" && $_FILES['img']['type'] != "image/jpeg"
        && $_FILES['img']['type'] != "image/gif" && $_FILES['img']['type'] !="image/jfif" ) {
        $_SESSION['alert'] =  "Sorry, only JPG, JPEG, PNG & GIF & JFIF files are allowed.";
        header("location:dashboard-my-profile.php");
        exit();
    }
    $update_sql = queryHandler::UpdateData('doctors',"img_path='$img_name'","id='{$_GET['docid']}'");
    if ($update_sql){
        header("location:dashboard-my-profile.php");
        exit();
    }
}
