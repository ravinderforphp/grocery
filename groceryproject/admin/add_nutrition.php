
  
  
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
      
        
         <form name="product_code" action="nutrition_code.php" method="post" enctype="multipart/form-data" onsubmit="return check_form();">
        
        <div class="midbody">
            <div class="menubar"><?php include('menu.php'); ?></div>
            <div class="siderbar_left"><h2>Add Nutrition</h1> </div>
            <div class="siderbar_right"> <div class="container">
        <div class="formLayout">
            
         <label>Product Name</label>
        <select id="product_name" name="product_name">
    <?php
        $getDropdown2 = mysql_query("select * from add_product ");
        while($row = mysql_fetch_array($getDropdown2))
    {
        echo "<option value=\"".$row["id"]."\">".$row["product_name"]."</option>";
    }
    ?>
        </select><br />
        <label>Saturated fat</label>
        <input id="saturated_fat" name="saturated_fat"><br>
        <label>Polyunsaturated Fat</label>
        <input id="polyunsaturated_fat" name="polyunsaturated_fat"><br>
         <label>Monounsaturated Fat</label>
        <input id="monounsaturated_fat" name="monounsaturated_fat"><br>
        <label>Trans Fat</label>
        <input id="trans_fat" name="trans_fat"><br>
        <label>Cholesterol</label>
        <input id="cholesterol" name="cholesterol"><br>
        
        <label>Sodium</label>
        <input id="sodium" name="sodium"><br>
        <label>Potassium</label>
        <input id="potassium" name="potassium"><br>
        <label>Protein</label>
        <input id="protein" name="protein"><br>
        <label>Vitamin A</label>
        <input id="vitamin_a" name="vitamin_a"><br>
        <label>Vitamin C</label>
        <input id="vitamin_c" name="vitamin_c"><br>
        <label>Vitamin E</label>
        <input id="vitamin_e" name="vitamin_e"><br>
        <label>Calcium</label>
        <input id="calcium" name="calcium"><br>
        <label>Phosphorus</label>
        <input id="phosphorus" name="phosphorus"><br>
        <label>Iron</label>
        <input id="iron" name="iron"><br>
        <label>Magnesium</label>
        <input id="magnesium" name="magnesium"><br>
        <label>Zinc</label>
        <input id="zinc" name="zinc"><br>
        <label>Copper</label>
        <input id="copper" name="copper"><br>
        <label>Manganese</label>
        <input id="manganese" name="manganese"><br>
         <div class="CategoryName"> <input type="submit" name="submit"  value="Add Nutrition"></div>
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
?>
    
    
    
    
    
    
    
    
    

      
    
    