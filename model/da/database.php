<?php  
   class Database 
   { 
      private static $dsn = 'mysql:host=localhost;dbname=lab05'; 
      private static $username = 'root'; 
      private static $password = ''; 
      private static $con = null; 
      public function __construct() 
      { 
        self::db_connect(); 
      } 
      public static function db_connect() 
      { 
         try{ 
            if(is_null(self::$con)) 
            {  
              self::$con = new PDO(self::$dsn,self::$username,self::$password); 
              self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            } 
         }catch(PDOException $e) 
         { 
            $error_message = $e->getMessage(); 
            include_once('../errors/database_error.php'); 
         } 
      } 
      public static function db_disconnect() 
      { 
        if(!is_null(self::$con)) 
           self::$con = null; 
      }   
      public function __destruct() 
      { 
         self::db_disconnect();
        } 
   //      public static function db_execute($sql = '', $params = []) {

   //       if (is_null(self::$con)) {
   //           error_log('Database connection is not established.');
   //           return false;
   //       }
     
   //       try {
   //           $stmt = self::$con->prepare($sql);
   //           $stmt->execute($params);
     
   //           return true;
   //       } catch (PDOException $e) {
   //           error_log('Database query error: ' . $e->getMessage());
   //       } catch (Exception $e) {
   //           error_log('Unexpected error: ' . $e->getMessage());
   //       }
     
   //       return false;
   //   }
   public static function db_execute($sql = '', $params = [])
    {
        if (!is_null(self::$con)) {
            $result = self::$con->prepare($sql);
            $result->execute($params);
            if ($result->rowCount() > 0) {
                $result->closeCursor();
                return true;
            }
        }
        return false;
    }
  
        public static function db_get_list($sql = '')
        { 
         if(!is_null(self::$con)) 
         { 
            $result = self::$con->prepare($sql); 
            $result->execute(); 
            if($result->rowCount() > 0)  
            { 
               $rows = $result->fetchAll(); 
               $result->closeCursor(); 
               return $rows; 
            } 
         } 
         return false; 
         } 
        
        public static function db_get_list_condition($sql = '',$params = []) 
        { 
           if(!is_null(self::$con)) 
           { 
            $result = self::$con->prepare($sql); 
            $result->execute($params); 
            if($result->rowCount() > 0)  
            { 
                $rows = $result->fetchAll(); 
                $result->closeCursor(); 
                return $rows; 
            } 
         } 
         return false; 
      } 
      public static function db_get_row($sql = '',$params = []) 
      { 
         if(!is_null(self::$con)) 
         { 
            $result = self::$con->prepare($sql); 
            $result->execute($params); 
            if($result->rowCount() > 0)  
            { 
              $row = $result->fetch(); 
              $result->closeCursor(); 
              return $row; 
            } 
         } 
         return false; 
      }   
   } 
?>