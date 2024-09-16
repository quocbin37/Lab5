<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../public/css/main.css">
</head>
<body>
<?php 
    include_once './../model/da/database.php'; 
    include_once '../model/da/helper.php'; 
    include_once '../model/bl/category.php'; 
    include_once '../model/bl/category_db.php'; 
  //  include_once('./../model/da/helper.php');

      $db = new Database(); 
?> 
<base href="<?php echo Helper::get_url('admin/'); ?>"> 
<?php  
  $view = filter_input(INPUT_GET, 'v'); 
  $action = filter_input(INPUT_GET, 'a');
if (empty($view) || empty($action)) {
    $view = 'common';
    $action = 'admin';
}
$path = 'view/' . $view . '/' . $action . '.php';
if (file_exists($path)) {
    include_once($path);
} else {
    header('Location:../404.php');
}
?>
</body>
</html>