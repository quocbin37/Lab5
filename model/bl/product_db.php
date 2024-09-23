<?php 
include_once __DIR__ . '/../da/database.php';

class Product_db extends Database
{
  public static function findProducts($condition) 
  { 
     $sql = "call timkiem(:condition)"; 
     $params = ['condition'=>$condition]; 
     if(!empty(self::db_get_list_condition($sql,$params))) 
     { 
        return self::db_get_list_condition($sql,$params); 
     } 
     return false; 
  }

public static function getStatistics() 
   { 
      $sql = "select * from v_quantity"; 
      if(!empty(self::db_get_list($sql))) 

      { 
         return self::db_get_list($sql); 
      } 
      return false; 
   } 
}
?>