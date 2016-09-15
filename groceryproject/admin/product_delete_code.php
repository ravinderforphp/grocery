<?php


include('connection.php');

$fid=$_GET['id']; 

$sql="DELETE FROM  add_product WHERE id='$fid'";
$result=mysql_query($sql);

// if successfully deleted
if($result){
    ?>
<script type="text/javascript">

		  alert("Record has been Deleted successfully.");

		  top.location.href = "../admin/admin_product_list.php";

		

</script>
<?php
}

else {
echo "ERROR";
}

?>
