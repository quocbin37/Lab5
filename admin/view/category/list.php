<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../../public/css/main.css">
</head><?php 
   include_once __DIR__ . '/../../../model/da/helper.php';   
   include_once __DIR__ . '/../../../model/bl/category_db.php';
    

?>
<h1>Categories</h1> 
           
        <table> 
            <tr> 
                <th>Id</th> 
                <th>Name</th> 
                <th>&nbsp;</th> 
            </tr> 
            <?php  
                if(!empty(Category_db::getCategories())) 
                  foreach (Category_db::getCategories() as $category) : ?> 
            <tr> 
                <td><?php echo $category->getId(); ?></td> 
                <td><?php echo $category->getName(); ?></td> 
                <td> 
                <a href="<?php echo Helper::get_url('admin/?c=editcat&id=' . $category->getId());?>">Edit</a> 
                <a href="<?php echo Helper::get_url('admin/?c=deletecat&id=' . $category->getId());?>">Delete</a> 
                </td> 
            </tr> 
            <?php endforeach; ?> 
            </table> 
            <a href="<?php echo Helper::get_url('admin/view/category/add.php');?>">Add Category</a>
</html>