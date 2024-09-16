<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../../public/css/main.css">
</head>

<?php 
   
   include_once __DIR__ . '/../../../model/da/helper.php';   
   include_once __DIR__ . '/../../../model/bl/category_db.php';
//    require_once'model/bl/category.php';
//    require_once'model/da/helper.php';
   


  if(!empty(Helper::input_value('id'))) 
  {    
     $category = Category_db::getCategoryById(Helper::input_value('id')); 
     if(Helper::is_submit('delete_category')) 
     { 
        if(Category_db::deleteCategeory($category)) 
        { 
           Helper::redirect('.'); 
        } 
     } 
  } 
?> 
<h2>Confirm deletion information</h2> 
<h3>Do you really want to delete this item ?</h3> 
<p style="margin-left:50px"><?php echo $category->getName();?></p> 
<div> 
    <form action="" method="post"> 
       <input type="hidden" name="action" value="delete_category"> 
       <input type="submit" value="Yes"> 
       <a href="<?php Helper::get_url('.'); ?>">No</a> 
    </form> 
</div> 

</html>