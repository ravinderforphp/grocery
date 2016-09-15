<?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
    ?>

<?php
    error_reporting(E_ALL ^E_NOTICE);
   
    
   
       
     $category_name = $_POST['category_name'];
   
   
    
    // Validations for mandatory fields
    $error_message = array();
   if( $category_name == '' ){
        $error_message[] = 'Plese enter category.';    
    }
    }
    
    
    
    // checking if email is already exist
    $check_query = "SELECT count(*) AS countrow FROM product_category WHERE category_name='$category_name'";
    $my_result = mysql_query($check_query);
    $fetch_result = mysql_fetch_array($my_result);
    $countrow = $fetch_result['countrow'];
    
    if( $countrow > '0' ){
        $error_message[] = 'Category already exist, please use another.';    
    }
    
    
    $count = count($error_message);    
    
    if( $count == '0' ){
        
      $query = "INSERT INTO product_category (`id`, `category_name` ) VALUES('','$category_name')";   
        
        
        if(mysql_query($query)){
           ?>
           
             <script type="text/javascript">

		  alert("product has been added successfully.");

		  top.location.href = "add_category.php";

		

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
   
    
    
    
?>
