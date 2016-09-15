<?php
include('connection.php');
$user=$_SESSION['uname'];
if(isset($_SESSION['uname'])){
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
    </head>
    <div class="welcome">welcome:<?php echo $user ?></div><div class="welcome"> <a href="../logout.php">Logout</a></div>
    
    <div class="adminmenu">
        <ul>
            <li>
                <a href="../admin/add_product.php">Add Product </a>
            </li>
            <li>
                <a href="../admin/add_category.php">Add Product Category</a>
            </li>
         
            <li>
                <a href="../admin/add_nutrition.php">Add Nutrition</a>
            </li>
            <li>
                <a href="../admin/admin_product_list.php">Manage Product</a>
            </li>
            
            <li>
                <a href="../admin/admin_category_list.php">Manage Category</a>
            </li>
           
        </ul>
        
    </div>
    
    
    
    
    
 <?php   
    
}else{
    
    echo 'sorry';
}




?>