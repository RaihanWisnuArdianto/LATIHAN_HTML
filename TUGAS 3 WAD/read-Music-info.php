<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
  $Music_info=$Music_obj->view_music_by_music_id($_GET['id']);
  


     
 }else{
  header('Location: index.php');
 }
 
 
 ?>
<div class="container " > 
    
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View Music List</a> 
     
 <h3>View Music Info</h3>
       
    
     <hr/>
   
   
 
      
    <label >Title:</label>
   <?php  if(isset($Music_info['title_Music'])){echo $Music_info['title_Music']; }?>

<br/>
    <label>Genre:</label>
  <?php  if(isset($Music_info['genre'])){echo $Music_info['genre'];} ?>
    
    <br/>
    <label >Author:</label>
      <?php  if(isset($Music_info['author'])){echo $Music_info['author'];} ?>
    <br/>

  <label >Choose For:</label>
   <?php  if(isset($Music_info['choose_for'])){echo $Music_info['choose_for'];} ?>
  <br/>
    <label >Country:</label>
      <?php  if(isset($Music_info['country'])){echo $Music_info['country'];} ?>
    <br/>

          

    <a href="<?php echo 'update-Music-info.php?id='.$Music_info["Music_id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

