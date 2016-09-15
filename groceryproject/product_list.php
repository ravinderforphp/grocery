<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Complete Collection</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div class="headerzone">
    <div class="header">
      <div class="headerText"><img src="Great_For_You.jpg" alt="" height="85px;" width="160  px;" /></div>
      <div class="phone"> 
        <div class="email"> </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="topmenu">
      <ul>
        <li class="first"><a  href="index.php">Home</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><a href="product_list.php">Product</a></li>
        <li style="border:none;"><a href="contact_us.php">Contact Us</a></li>
        <li><a href="admin/adminlogin.php">Admin Login</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="banner">
    
    <div class="clear"></div>
    
    <div class="clear"></div>
  </div>
  <div class="workZone1">
    
    
    
    <?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname']));
    ?>                
                
                
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link rel="shortcut icon" href="favicon.ico">
                <link rel="icon" type="image/jpg" href="favicon.ico"/>
                <link rel="shortcut icon" href="localhost/omr/favicon.ico" />
                <title>User List - Exceedwiz Infotech Pvt. Ltd.</title>
                <link rel="stylesheet" type="text/css" href="style/mylist.css" />
                </head>
                <?php
                
                $find = $_REQUEST['serach_param'];                
                //$find = strtoupper($find); 
                $find = strip_tags($find);                
                $find = trim($find);
                
                 
                ?>
                <div> 
                <form class="form-wrapper cf" action="product_list.php" method="post">
                <input id="search" name="serach_param" type="text" value="<?php echo $find;?>" placeholder="Search here..." required>
                <button id="submit"  type="submit">Search</button>
                </form>
                </div>
                <div class="border11"><header>PRODUCT LIST</header></div>
             
<?php
                if(isset($_GET['sortby'])){
                $colname = $_GET['sortby'];
            }
                else
            {
                $colname = 'product_name';
            }
                $order = ($_GET['order'] == 'asc') ? 'asc' : 'desc';
                $new_order = ($order == 'asc' ) ? 'desc' : 'asc';
                $sql = "select * from add_product WHERE product_name LIKE '%$find%' or brand_name LIKE '%$find%' or capacity LIKE '%$find%' or price  LIKE '%$find%'  ORDER BY ".$colname." ".$order;

                //$sql = "select * from   test_details";
                $num_results_per_page = 5;
                $num_page_links_per_page = 5;
                $pg_param = "&serach_param=".$find; // Ex: &q=value
                //include the pagination function file
                include('pagination.php');
                pagination($sql, $num_results_per_page, $num_page_links_per_page, $pg_param);
?>



<script type="text/javascript">
function checkboxlimit(checkgroup, limit){
  
	var checkgroup=checkgroup
	var limit=limit
	for (var i=0; i<checkgroup.length; i++){
		checkgroup[i].onclick=function(){
		var checkedcount=0
		alert("hello");
		for (var i=0; i<checkgroup.length; i++)
			checkedcount+=(checkgroup[i].checked)? 1 : 0
		if (checkedcount>limit){
			alert("You can only select a maximum of "+limit+" checkboxes")
			this.checked=false
			}
		}
	}
}
</script>
<?php
                if($pg_error == '')
        {
                echo "<div class='divborder1'>";
                if(mysql_num_rows($pg_result) > 0)
	{
                echo "<div class='divTable'>
                <div  class='headRow'>
                <div  class='divCellHead'><a href='product_list.php?sortby=product_name&order=$new_order'>Product Name</a></div>
                <div  class='divCellHead'><a href='product_list.php?sortby=brand_name&order=$new_order'>Brand Name</a></div>
                <div  class='divCellHead'><a href='product_list.php?sortby=capacity&order=$new_order'>Capacity</a></div>
                <div  class='divCellHead'><a href='product_list.php?sortby=price&order=$new_order'>Price</a></div>
		 <div  class='divCellHead' id='compare_product'>Compare</div>
              
                </div>";
                    
            {
                while($data = mysql_fetch_array($pg_result))
            {
	
                echo "<div class='divRow'>";
                echo "<div class='divCell' id='divCell'>" . $data['product_name'] . "</div>";
                echo "<div class='divCell' id='divCell'>" . $data['brand_name'] . "</div>";
                echo "<div class='divCell' id='divCell'>" . $data['capacity'] . "</div>";
                echo "<div class='divCell' id='divCell'>" . $data['price'] . "</div>";
		?>

		<div class="Cell1" >
		<div class="divCell" id="ImgdivCell">
		<a href="view_list.php?id=<?php echo $data['id'] ?>">
		<img src="admin/upload/<?php echo $data['image_upload'] ?>" width="150" height="130" />
		</a>
		<div class="Cell" ><span><a href="view_list.php?id=<?php echo $data['id'] ?>">view</a></span></div>
		</div>
		</div>
		<div align="center" style="margin-top: 60px;">
		<form id="world" name="world">
		<input type="checkbox" id="compare" name="compare[]" value="<?php echo $data['id'] ?>" />
		</form>
		</div>
		
		<script type="text/javascript">
		//Syntax: checkboxlimit(checkbox_reference, limit)
		checkboxlimit(document.forms.world.compare, 3)
		</script>
		
		 <?php
                echo "</div>";
            }
                echo "</div>";
            }
                echo $pagination_output;
            }
                else
            {
                echo $error="<div class='error_msg'>Sorry, but we can not find an entry to match your query</div>";
            }
        }
                else
            {
                echo $pg_error; //display any errors, you can remove this if you want.	
            }
                echo "</div>";
?>
         
        
    <div class="clear"></div>
  </div>
  <div class="footer">
    <ul style="color:#FFF;">
      Copyright (c) All rights reserved.  <a href="#" style="color:#FFF;"></a>.
    </ul>
  </div>
</div>
</body>
</html>
