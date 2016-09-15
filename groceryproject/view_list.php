<?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
?>
 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Grocery</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="style/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
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
    $product_id=$_GET['id'];
    $sql_query="SELECT * FROM add_product WHERE id='$product_id'";
    $sql=mysql_query($sql_query);
    $data=mysql_fetch_assoc($sql);
    
    
      $product_name=count($data['product_name']);
      if($product_name!=""){
	 echo  $btn_disabled_class = 'product_disabled';
	
      }
?>

  
  <div class="view">
  <div class="dis"> 
  <div class="veiwimg"><ul class="gallery clearfix" id="gallery"><li><a  width="400" height="200" href="admin/upload/<?php echo $data['image_upload']?>" rel="prettyPhoto[gallery1]"><img src="admin/upload/<?php echo $data['image_upload']?>" width="200" height="150" /></a></li></ul></div>
  <div class="viewdes">
  <div class="veiwlist"><div class="listprrduct">Product Name</div><div class="listprrduct_d"><?php echo $data['product_name'] ?> </div></div>
  <div class="veiwlist"><div class="listprrduct">Brand</div><div class="listprrduct_d"><?php echo $data['brand_name'] ?></div> </div>
  <div class="veiwlist"><div class="listprrduct">Capacity</div><div class="listprrduct_d"><?php echo $data['capacity'] ?> </div></div>
  <div class="veiwlist"><div class="listprrduct">Price</div><div class="listprrduct_d"><?php echo $data['price'] ?></div> </div>
  <div class="veiwlist"><div class="listprrduct_dis">Decscription</div><div class="decscription"><p><?php echo $data['description'] ?></p></div></div>
  </div>    
  </div>
    
    
    
  </div>
		  
         
        
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