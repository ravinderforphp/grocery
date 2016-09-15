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
      
        
        
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"> </div>
            <div class="siderbar_right"></div>
        </div>
        
        
     
        
        
        
</div>
    
</body>
</html>
    
  <?php
}else{
    
    header("location:index.php");
    
}
?>
    
    
    
    
    
    
    
    
    

    