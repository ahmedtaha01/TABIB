<?php
require_once "../db/db.php";

class queryHandler{

    public static  function AddData($tbname,$colsname,$valuesname){
        $query = "INSERT INTO $tbname ($colsname) VALUES ($valuesname) ";
        $sql_statement = $GLOBALS['connection']->prepare($query);
        $result = $sql_statement->execute();
        if($result){
            return $sql_statement ;
        }
        return false;
    }

    public static function getData($tbname,$colname,$condition){
        if($condition == ""){
            $query = "SELECT $colname FROM $tbname";
        }else{
            $query = "SELECT $colname FROM $tbname WHERE $condition";
        }
        $sql_statement = $GLOBALS['connection']->prepare($query);
        $result = $sql_statement->execute();
        if($result){
            return $sql_statement ;
        }
        return false;
    }

    public  static function DeleteData($tbname,$condition){
        if($condition == ""){
            $query = "DELETE  FROM $tbname ";
        }else{
            $query =  "DELETE  FROM $tbname WHERE $condition ";
        }
        $sql_statement = $GLOBALS['connection']->prepare($query);
        $result = $sql_statement->execute();
        if($result){
            return $sql_statement ;
        }
        return false;
    }

    public static  function UpdateData($tbname,$colsANDvals,$condition){
        if($condition == ""){
            $query = "UPDATE $tbname SET $colsANDvals ";
        }else{
            $query = "UPDATE $tbname SET $colsANDvals WHERE $condition";
        }
        $sql_statement = $GLOBALS['connection']->prepare($query);
        $result = $sql_statement->execute();
        if($result){
            return $sql_statement ;
        }
        return false;
    }

}
?>