<?php
 
 $connection = new PDO("mysql://hostname=localhost;dbname=project",'root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
 PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8'));
 
?>