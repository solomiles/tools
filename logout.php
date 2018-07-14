<?php  
/** 
 * Created by osaighe solomon. 
 * User: TOOLZ 
 * Date: 12/07/2018 
 * Time: 3:46 PM 
 */  
  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
header("Location: login.php");//use for the redirection to login page  
?>