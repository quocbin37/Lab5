<!DOCTYPE html> 
<html> 
<!-- the head section --> 
<head> 
    <title>My Laptop Shop</title> 
</head> 
<!-- the body section --> 
<body> 
<header> 
  <h1 style="float:left">My Laptop Shop</h1> 
  <div style="float:right"> 
     <h4 style="color:#D08504;margin:0px">Tìm kiếm:</h4> 
     <form style="margin:0px;" action="<?php echo Helper::get_url('admin/?c=findpro'); ?>" 
method="post"> 
         <input type="text" name="search"> 
         <input type="submit" value="Search"> 
     </form> 
  </div> 
  <div style="clear:both"></div> 
</header>  