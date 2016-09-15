
  
  
  <?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
    
    if( isset($_SESSION['uname']) && $_SESSION['uname'] != '' ){   
     $id=$_GET['id']; 

              $order="SELECT * FROM add_product WHERE  id='$id'";
	       $sql_query=mysql_query($order);
	       while($result =mysql_fetch_assoc($sql_query)){
                
                $id		=$result['id'];
		$cat_id 	=$result['cat_id'];
                $product_name	=$result['product_name'];
		$brand_name	=$result['brand_name'];
		$capacity	=$result['capacity'];
		$price		=$result['price'];
		$description	=$result['description'];
		$image_upload	=$result['image_upload'];
              }
 

    ?>
    <html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    </head>
<body>
<div class="mainnav">
      
      
      <div class="container"> <?php include('header.php'); ?></div>
      
        
         <form name="product_code" action="edit_product_code.php" method="post" onsubmit="return check_form();">
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"><h2>Add Category</h2></div>
            <div class="siderbar_right"> <div class="container">
        
         <div class="formLayout">
	<label>Category</label>
        <select id="category" name="category">
    <?php
        $getDropdown2 = mysql_query("select * from product_category ");
        while($row = mysql_fetch_array($getDropdown2))
    {
        echo "<option value=\"".$row["id"]."\">".$row["category_name"]."</option>";
    }
    ?>
        </select><br />
	 <!--<label>Image Upload</label>
       <input type="file" name="upload_image" id="upload_image" value="<?php // echo $upload_imane ?>" /> 
        </div>-->
        <label>Product Name</label>
        <input id="name" name="product_name" value="<?php echo $product_name ?>"><br>
        <label>Brand Name</label>
        <input id="brand_name" name="brand_name" value="<?php echo $brand_name ?>"><br>
         <label>Capacity</label>
        <input id="capacity" name="capacity" value="<?php echo $capacity ?>"><br>
        <label>Price</label>
        <input id="price" name="price" value="<?php echo $price?>"><br>
        
        <label>Description</label>
        <input id="description" name="description" value="<?php echo $description ?>"><br><br><br>
        
     
    <div class="CategoryName">
           <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
        <input type="submit"  value="Update Product">
    </div>
    </div>
            
            </div>
        </div>
         </form>
        
        
     
        
        
        
</div>
    
</body>
</html>
    
  <?php
}else{
    
    header("location:welcome.php");
    
}
}
?>