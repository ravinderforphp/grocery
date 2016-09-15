<?php

session_start();
include('connection.php');

if(isset($_SESSION['uname'])){
unset($_SESSION['uname']);
header("Location:index.php");
}else{
    
    echo"sorry session notmaintained";
}
?> 