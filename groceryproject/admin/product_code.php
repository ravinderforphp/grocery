<?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
    

   
   
    if( isset($_POST) && !empty($_POST) ){  
   
       
    $product_name = $_POST['product_name'];
    $brand_name = $_POST['brand_name'];
      $category = $_POST['category'];
      $capacity = $_POST['capacity'];
      $image_upload = $_POST['file'];
       $price = $_POST['price'];
       $description = $_POST['description'];
      
   
 
   
    
    // Validations for mandatory fields
    $error_message = array();
   if( $product_name == '' ){
        $error_message[] = 'Plese enter Product name.';    
    }
    
    if( $brand_name == '' ){
        $error_message[] = 'Plese enter Brand name.';    
    }
    if( $category == '' ){
        $error_message[] = 'Plese enter category.';    
    }
    
    if( $capacity == '' ){
        $error_message[] = 'Plese enter capacity.';    
    }
    if( $price == '' ){
        $error_message[] = 'Plese enter price.';    
    }
    }
    
    //upload only jpeg image
       if(@$_POST ['submit'])
        {
        $file = $_FILES ['file'];
        $name1 = $file ['name'];
        $type = $file ['type'];
        $size = $file ['size'];
        $tmppath = $file ['tmp_name']; 
        if($name1!="")
        {
        if(move_uploaded_file ($tmppath, 'upload/'.$name1))//image is a folder in which you will save image
        {
        echo "Your image upload successfully !!";
        }
        
        else
        {
             echo "problem";
        }
        
        }
        }
    
    
    // checking if email is already exist
   $result = mysql_query("SELECT * FROM  add_product WHERE product_name = '$field' and brand_name='$brandName' and image_upload='$name1'" ) or exit(mysql_error());
    $num_rows = mysql_num_rows($result);;
    
    if( $num_rows > '0' ){
        $error_message[] = 'Image already exist, please use another.';    
    }
    
    
    $count = count($error_message);    
    
    if( $count == '0' ){
        
      $query = "INSERT INTO add_product (`cat_id`, `product_name`,`brand_name`,`capacity`,`price`,`description`,`image_upload` )
     VALUES('$category','$product_name','$brand_name','$capacity','$price','$description','$name1')";   
        
        
        if(mysql_query($query)){
            ?>
           
             <script type="text/javascript">

		  alert("product has been added successfully.");

		  top.location.href = "add_product.php";

		

		</script>
          <?php  
        }else{
            echo "<br/>Error: ".mysql_error();
            echo "<br/>Error No.: ".mysql_errno();
        }
    }else{
        foreach( $error_message AS $errors ){
            echo "<br/>".$errors;
        }
    }
}
   
    
    
    
?>
