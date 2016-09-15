<?php

 error_reporting(E_ALL ^E_NOTICE);
    session_start();
    // Database connection    
    include('connection.php');
    
    
if( isset($_SESSION['uname']) && $_SESSION['uname'] != '' ){
if(isset($_POST) && !empty($_POST)){
    
                $fid		=$_POST['id'];
		$cat_id 	=$_POST['category'];
                $product_name	=$_POST['product_name'];
		$brand_name	=$_POST['brand_name'];
		$capacity	=$_POST['capacity'];
		$price		=$_POST['price'];
		$description	=$_POST['description'];
		$image_upload	=$_POST['file'];
		
        
 $update_query = "UPDATE   add_product SET cat_id='$cat_id',product_name='$product_name',brand_name='$brand_name',capacity='$capacity',price='$price',description='$description',image_upload='$file_name' WHERE id='$fid' ";
 $excute_query=mysql_query($update_query);
  
  if($update_query){
    ?>
    <script>
     alert("Record has been updated successfully.");

		  top.location.href = "../admin/admin_product_list.php";

    </script>
<?php

}else{
    
    echo "problem";
    
}
}
}
?>