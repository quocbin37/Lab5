<?php
   include_once __DIR__ . '/../da/database.php';

class Category_db extends Database
{
    public static function getCategories() 
    { 
         $sql = "select * from categories"; 
         if(!empty(self::db_get_list($sql))) 
         { 
             foreach(self::db_get_list($sql) as $row){ 
                 $category = new Category(); 
                 $category->setId($row['categoryID']); 
                 $category->setName($row['categoryName']); 
                 $categorys[] = $category; 
             } 
             return $categorys; 
         } 
         return false; 
    } 
    

    public static function getCategoryByID($categoryid)
    {
        $sql = "select * from categories where categoryID=:categoryID";
        $params = ['categoryID' => $categoryid];
        $row = self::db_get_row($sql, $params);
        if (!empty($row)) {
            $category = new Category();
            $category->setId($row['categoryID']);
            $category->setName($row['categoryName']);
            return $category;
        }
        return false;
    }

    // public static function addCategory($category) {
    //     $params = [
    //         "categoryName" => $category->getName()
    //     ];
    //     $sql = "INSERT INTO categories VALUES (:categoryName)";
        
        
    //     if (self::db_execute($sql, $params)) {
    //         return true;
    //     } else {
    //         // Log the error
    //         error_log('Failed to add category: ' . print_r($params, true));
    //         return false;
    //     }
    // }
    // public static function addCategory($category) {
    //     $params = [
    //         "categoryName" => $category->getName()
    //     ];
    //     $sql = "INSERT INTO `lab05`.`categories` (`categoryName`) VALUES (:categoryName)";
        
    //     try {
    //         if (self::db_execute($sql, $params)) {
    //             return true;
    //         } else {
    //             // Log the error
    //             error_log('Failed to add category: ' . print_r($params, true));
    //             return false;
    //         }
    //     } catch (Exception $e) {
    //         // Log the exception
    //         echo 'Exception occurred while adding category: ' . $e->getMessage();
    //         return false;
    //     }
    // }
    public static function addCategory($category) {
        $params = [
            "categoryID" =>$category->getID(),
            "categoryName" => $category->getName()
        ];
        $bin =$category->getName();
        
        $sql = "INSERT INTO `lab05`.`categories` (`categoryName`) VALUES ( '$bin')";
           
        try {
            echo $sql;
            if (self::db_execute($sql, $params)) {
                return true;
            } else {
                // Log the error if db_execute fails
                error_log('Failed to add category: ' . print_r($params, true));
                return false;
            }
        } catch (Exception $e) {
            // Log any exceptions
            error_log('Exception occurred while adding category: ' . $e->getMessage());
            return false;
        }
    }
    

    public static function updateCategeory($category)
    {
        $sql = "update categories set categoryName=:categoryName where categoryID=:categoryID";
        $params = [
            "categoryID" => $category->getId(),
            "categoryName" => $category->getName()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
    public static function deleteCategeory($category)
    {
        $sql = "delete from categories where categoryID=:categoryID";
        $params = [
            "categoryID" => $category->getId()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
}
