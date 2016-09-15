<?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
   
    if( isset($_POST) && !empty($_POST) ){  
   
       
     $product_id              = $_POST['product_name'];
     $saturated_fat           = $_POST['saturated_fat'];
     $polyunsaturated_fat     = $_POST['polyunsaturated_fat'];
     $monounsaturated_fat     = $_POST['monounsaturated_fat'];
     $trans_fat               = $_POST['trans_fat'];
     $cholesterol             = $_POST['cholesterol'];
     $sodium                  = $_POST['sodium'];
     $potassium               = $_POST['potassium'];
     $protein                 = $_POST['protein'];
     $vitamin_a               = $_POST['vitamin_a'];
     $vitamin_c               = $_POST['vitamin_c'];
     $vitamin_e               = $_POST['vitamin_e'];
     $calcium                 = $_POST['calcium'];
     $phosphorus              = $_POST['phosphorus'];
     $iron                    = $_POST['iron'];
     $magnesium               = $_POST['magnesium'];
     $zinc                    = $_POST['zinc'];
     $copper                  = $_POST['copper'];
     $manganese               = $_POST['manganese'];
      

    
    // Validations for mandatory fields
    $error_message = array();
   if( $product_id == '' ){
     $error_message[] = 'Plese enter Product name.';    
    }
    
   
   }
    
    
    //upload only jpeg image
    
 

    
    
    //// checking if email is already exist
    //$check_query = "SELECT count(*) AS countrow FROM add_product WHERE product_name='$product_id'";
    //$my_result = mysql_query($check_query);
    //$fetch_result = mysql_fetch_array($my_result);
    //$countrow = $fetch_result['countrow'];
    //
    //if( $countrow > '0' ){
    //    $error_message[] = 'Category already exist, please use another.';    
    //}
    //
    
    $count = count($error_message);    
    
    if( $count == '0' ){
        
   $query = "INSERT INTO  nutrition (`product_id`,`saturated_fat`, `polyunsaturated_fat`,`monounsaturated_fat`, `trans_fat`,`cholesterol`,  `sodium`, `potassium`, `protein`,`vitamin_a`,`vitamin_c`, `vitamin_e`,`calcium`,`phosphorus`,`iron`, `magnesium`, `zinc`,`copper`,`manganese`)
                  VALUES('$product_id', '$saturated_fat','$polyunsaturated_fat','$monounsaturated_fat','$trans_fat','$cholesterol','$sodium', '$potassium', '$protein','$vitamin_a', '$vitamin_c','$vitamin_e', '$calcium','$phosphorus', '$iron', '$magnesium','$zinc','$copper','$manganese' )";
              
       if(mysql_query($query)){
            ?>
           
             <script type="text/javascript">

		  alert("product has been added successfully.");

		  top.location.href = "add_nutrition.php";

		

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