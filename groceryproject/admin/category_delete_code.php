<?php


include('connection.php');

$fid=$_GET['id']; 

$sql="DELETE FROM  product_category WHERE id='$fid'";
$result=mysql_query($sql);

// if successfully deleted
if($result){
    ?>
<script type="text/javascript">

		  alert("Record has been Deleted successfully.");

		  top.location.href = "../admin/admin_category_list.php";

		

		</script>
<?php
}

else {
echo "ERROR";
}

?>
