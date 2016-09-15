<?php
require_once('connection.php');
$error = '';


 $form = $_POST['submit'];
 $user=$_POST['user'];
 $password=$_POST['password'];
 


if( isset($form) ) {

if( isset($user) && isset($password) && $user !== '' && $password !== '' ) {
    
    
    $sql = mysql_query("SELECT * FROM users WHERE uname='$user' and password='$password';");
    if( mysql_num_rows($sql) != 0 ) {
        
        $_SESSION['uname'] = $user;
        header('Location:welcome.php');
        exit;

} else {  $error = "Incorrect login info"; }

} else { $error = 'All information is not filled out correctly';}

}

?>

?>