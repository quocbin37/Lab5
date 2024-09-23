<?php 
   $result = Product_DB::getStatistics(); 
?> 
<h2>Statistic of products</h2> 
<table> 
    <tr> 
        <th>Category Name</th> 
        <th>Quantity</th> 
    </tr> 
    <?php  
        if(!empty($result)) 
            foreach ($result as $row) : ?> 
    <tr> 
        <td><?php echo $row['categoryName']; ?></td> 
        <td><?php echo $row['quantity']; ?></td> 
    </tr> 
    <?php endforeach; ?> 
</table> 