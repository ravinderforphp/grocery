
  
  
  <?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
    ?>
    <html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    </head>
<body>
<div class="mainnav">
      
      
      <div class="container"> <?php include('header.php'); ?></div>
      
        
         <form name="product_code" action="product_code.php" method="post" enctype="multipart/form-data" onsubmit="return check_form();">
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"><h2>Add Product</h1> </div>
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
        <label>Product Name</label>
        <input id="name" name="product_name"><br>
        <label>Brand Name</label>
        <input id="brand_name" name="brand_name"><br>
         <label>Capacity</label>
        <input id="capacity" name="capacity"><br>
        <label>Price</label>
        <input id="price" name="price"><br>
        
        <label>Description</label>
        <input id="description" name="description"><br>
         <label>Image Upload</label>
        <input type="file" name="file" id="file" />  
    </div>
        
        
        
        
        
    <div class="CategoryName"> <input type="submit" name="submit"  value="Add Product"></div>
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
?>
    
    
    
    
    
    
    
    
    

      
    
    