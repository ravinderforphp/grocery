
  
  
  <?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
    
    if( isset($_SESSION['uname']) && $_SESSION['uname'] != '' ){   
     $id=$_GET['id']; 

              $order="SELECT * FROM product_category WHERE  id='$id'";
	       $sql_query=mysql_query($order);
	       while($result =mysql_fetch_assoc($sql_query)){
                
                $id=$result['id'];
                $category_name=$result['category_name'];
               
		
                
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
      
        
         <form name="category_code" action="edit_category_code.php" method="post" onsubmit="return check_form();">
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"><h2>Add Category</h2></div>
            <div class="siderbar_right"> <div class="container">
        
        <div class="">
        <div class="CategoryName"><label>Category Name: </label></div>
        <div class="CategoryName"> <input type="text" name="category_name" value="<?php echo $category_name ?>"></div>
        </div>
     
    <div class="CategoryName">
           <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
        <input type="submit"  value="Add Category">
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
    
    header("location:index.php");
    
}
}
?>