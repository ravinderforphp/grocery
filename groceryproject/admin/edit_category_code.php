<?php

 error_reporting(E_ALL ^E_NOTICE);
    session_start();
    // Database connection    
    include('connection.php');
    
    
if( isset($_SESSION['uname']) && $_SESSION['uname'] != '' ){
if(isset($_POST) && !empty($_POST)){
    
  $fid=$_POST['id'];
   $category_name=$_POST['category_name'];
   
    
        
 $update_query = "UPDATE   product_category SET category_name='$category_name' WHERE id='$fid' ";
  $excute_query=mysql_query($update_query);
  
  if($update_query){
    ?>
    <script>
     alert("Record has been updated successfully.");

		  top.location.href = "../admin/admin_category_list.php";

    </script>
<?php

}else{
    
    echo "problem";
    
}
}
}
?>