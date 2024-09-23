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
include_once __DIR__ . '/../../../model/bl/category.php';
include_once __DIR__ . '/../../../model/da/helper.php';
include_once __DIR__ . '/../../../model/bl/category_db.php';


if (Helper::is_submit('add_category')) {
    $category = new Category();
    $category->setName(Helper::input_value('name'));

    if (!empty($category->getName())) {

        if (Category_db::addCategory($category)) {


            echo "Add succesfully";
        }
    } else {
        echo 'Category name cannot be empty.';
    }
}
?>
<h1>Add Category</h1>
<form action="" method="post" id="action_form">
    <input type="hidden" name="action" value="add_category">
    <label>Name:</label>
    <input type="input" name="name" value="<?php echo Helper::input_value('name');  ?>">
    <br>
    <label>&nbsp;</label>
    <input type="submit" value="Add Category">
    <br>
</form>
<p><a href="<?php echo Helper::get_url('admin/index.php'); ?>">View Category List</a></p>

</html>