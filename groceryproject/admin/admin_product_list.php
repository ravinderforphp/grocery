<?php
error_reporting(E_PARSE);  
include('connection.php');
session_start();
if(isset($_SESSION['uname'])){
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                

    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link rel="shortcut icon" href="favicon.ico">
                <link rel="icon" type="image/jpg" href="favicon.ico"/>
                <link rel="stylesheet" type="text/css" href="../style/mylist.css" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    </head>
        <body>
        <div class="mainnav">
        <div class="admin_container"> <?php include('header.php'); ?></div>
        <form name="category_code" action="admin_product_list.php" method="post" onsubmit="return check_form();">
        <div class="midbody">
        <div class="menubar"><?php include('menu.php'); ?></div>
        <div class="siderbar">
        <div width="400" cellspacing="2" cellpadding="2" align="center" style="border:1px #000000 solid;">

            <?php
            $perpage = 5;
            
            if(isset($_GET["page"]))
            
            {
            
            $page = intval($_GET["page"]);
            
            }
            
            else
            
            {
            
            $page = 1;
            
            }
            
            $calc = $perpage * $page;
            
            $start = $calc - $perpage;
            
            $result = mysql_query("select * from  add_product Limit $start, $perpage  ");
            
            $rows = mysql_num_rows($result);
            
            if($rows)
            
            {
            
            $i = 0;
            echo "<div class='divTable'>
                <div  class='headRow'>
		<div  class='divCellHead'><a href='admin_product_list.php.php?sortby=product_name&order=$new_order'></a></div>
                <div  class='divCellHead'><a href='admin_product_list.php.php?sortby=product_name&order=$new_order'>Product Name</a></div>
                <div  class='divCellHead'><a href='admin_product_list.php.php?sortby=product_name&order=$new_order'>Brand </a></div>
		<div  class='divCellHead'><a href='admin_product_list.php.php?sortby=product_name&order=$new_order'>Capacity </a></div>
		<div  class='divCellHead'><a href='admin_product_list.php.php?sortby=product_name&order=$new_order'>Price </a></div>
                </div>";
            while($post = mysql_fetch_array($result))
            
            {
            
            ?>
	   
  
            
            <div class="divRowCat">
            
           <div class="divCell" id="divCell">
		<img  style="border-radius:10px 10px 10px 10px;" src="upload/<?php echo $post['image_upload'] ?>" width="70" height="70" />
		</div>
            <div class='divCellCat' id='divCell'><?php echo $post["product_name"]; ?></div>
	    <div class='divCellCat' id='divCell'><?php echo $post["brand_name"]; ?></div>
	    <div class='divCellCat' id='divCell'><?php echo $post["capacity"]; ?></div>
	    <div class='divCellCat' id='divCell'><?php echo $post["price"]; ?></div>
	    <!--<div class='divCellCat' id='divCell'> <img src="upload/<?php //echo $data['image_upload'] ?>" width="50" height="50" /></div>-->
            <div class='divCelldel' id='divCelldel'><a href="edit_product.php?id=<?php echo $id=$post['id'];?>">EDIT</a></div>
            <div class='divCelldel' id='divCelldel'><a href="product_delete_code.php?id=<?php echo $id=$post['id'];?>">DELETE</a></div>
            </div>
            
            
            
<?php
    }
    }
?>
            
            </div>
            <div width="400" cellspacing="2" cellpadding="2" align="center" >
            <div class="paginationCat" >
	     
            <?php
            
            if(isset($page))
            
            {
            
            $result = mysql_query("select Count(*) As Total from add_product");
            
            $rows = mysql_num_rows($result);
            
            if($rows)
            
            {
            
            $rs = mysql_fetch_array($result);
            
            $total = $rs["Total"];
            
            }
            
            $totalPages = ceil($total / $perpage);
            
            if($page <=1 )
            
            {
            
            echo "<span id='page_links' style='font-weight:bold;'>Prev</span>";
            
            }
            
            else
            
            {
            
            $j = $page - 1;
            
            echo "<span><a id='page_a_link' href='admin_product_list.php?page=$j'>< Prev</a></span>";
            
            }
            
            for($i=1; $i <= $totalPages; $i++)
            
            {
            
            if($i<>$page)
            
            {
            
            echo "<span><a href='admin_product_list.php?page=$i' id='page_a_link'>$i</a></span>";
            
            }
            
            else
            
            {
            
            echo "<span id='page_links' style='font-weight:bold;'>$i</span>";
            
            }
            
            }
            
            if($page == $totalPages )
            
            {
            
            echo "<span id='page_links' style='font-weight:bold;'>Next ></span>";
            
            }
            
            else
            
            {
            
            $j = $page + 1;
            
            echo "<span><a href='admin_product_list.php?page=$j' id='page_a_link'>Next ></a></span>";
            
            }
            
            }
            
            ?>
	    
         </div>
        </div>
       </form>
      </div>
     </div>
    </div>
  </body>
</html>
<?php
}else{
    
    header("location:welcome.php");
}
?>