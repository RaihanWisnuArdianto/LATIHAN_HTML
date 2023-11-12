<?php
 include 'header.php';
 if(isset($_GET['id'])){
  $Music_info=$Music_obj->delete_Music_info_by_id($_GET['id']);
 
     
 }else{
  header('Location: index.php');
 }
 
 ?>
