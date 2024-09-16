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
if (!empty(Helper::input_value('id'))) {
    $category = Category_db::getCategoryById(Helper::input_value('id'));
    if (Helper::is_submit('edit_category')) {
        $category->setName(Helper::input_value('name'));
        if (Category_db::updateCategeory($category))
            Helper::redirect('.');
    }
}
?>

<h1>Edit Category</h1>
<form action="" method="post" id="action_form">
    <input type="hidden" name="action" value="edit_category">
    <label>Name:</label>
    <input type="input" name="name" value="<?php echo $category->getName(); ?>">
    <br>
    <label>&nbsp;</label>
    <input type="submit" value="Update">
    <br>
</form>
<p><a href="<?php echo Helper::get_url('admin/'); ?>">View Category List</a></p>

</html>