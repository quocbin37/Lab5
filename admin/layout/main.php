    <?php 
    include_once __DIR__ . '/../../model/da/helper.php';

  $content = Helper::input_value('c'); 
  if(!empty($content)) 
  { 
     switch($content) 
     { 
         case "addcat": 
            
            include_once __DIR__ . '/../view/category/add.php';
            break; 
         case "editcat": 
           
            include_once __DIR__ . '/../view/category/edit.php';
            break; 
         case "deletecat": 
           
            include_once __DIR__ . '/../view/category/delete.php';
            break;         
     } 
  } 
  else 
  include_once __DIR__ . '/../view/category/list.php';
?>