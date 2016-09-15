
  
  
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
      
        
         <form name="category_code" action="category_code.php" method="post" onsubmit="return check_form();">
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"><h2>Add Category</h2></div>
            <div class="siderbar_right"> <div class="container">
        
        <div class="">
        <div class="CategoryName"><label>Category Name: </label></div>
        <div class="CategoryName"> <input type="text" name="category_name"></div>
        </div>
    <div class="CategoryName"> <input type="submit"  value="Add Category"></div>
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
    
    
    
    
    
    
    
    
    

      
    
    