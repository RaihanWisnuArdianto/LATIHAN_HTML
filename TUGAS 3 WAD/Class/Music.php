<?php
class Music
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "localhost";
    $dbname = "TUGAS3WAD_WEEK7";
    $username = "root";
    $password = "";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


    public function Music_list(){
        
       $sql = "SELECT * FROM Musics ORDER BY Music_id asc ";
       $result=  $this->conn->query($sql);
       return $result;  
    }
    
    public function create_Music_info($post_data=array()){
         
       if(isset($post_data['create_Music'])){
       $Music_title= mysqli_real_escape_string($this->conn,trim($post_data['Music_title']));
       $genre= mysqli_real_escape_string($this->conn,trim($post_data['genre']));
       $author= mysqli_real_escape_string($this->conn,trim($post_data['author']));
       $choose_for= mysqli_real_escape_string($this->conn,trim($post_data['choose_for']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));

       $sql="INSERT INTO Musics (Music_title, genre, author,country,choose_for) VALUES ('$Music_title', '$genre', '$author','$country','$choose_for')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully Created Music Info";
               
              header('Location: index.php');
           }
          
       unset($post_data['create_Music']);
       }
       
        
    }
    
    public function view_Music_by_Music_id($id){
       if(isset($id)){
       $Music_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from students where student_id='$Music_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_Music_info($post_data=array()){
       if(isset($post_data['update_Music'])&& isset($post_data['id'])){
           
       $Music_title= mysqli_real_escape_string($this->conn,trim($post_data['Music_title']));
       $genre= mysqli_real_escape_string($this->conn,trim($post_data['genre']));
       $choose_for= mysqli_real_escape_string($this->conn,trim($post_data['choose_for']));
       $author= mysqli_real_escape_string($this->conn,trim($post_data['author']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));
       $Music_id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE Musics SET Music_title='$Music_title',genre='$genre',author='$author',country='$country',choose_for='$choose_for' WHERE Music_id =$Music_id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Updated Music Info";
           }
       unset($post_data['update_Music']);
       }   
    }
    
    public function delete_Music_info_by_id($id){
        
       if(isset($id)){
       $Music_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  Musics  WHERE Music_id =$Music_id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted Music Info";
            
           }
       }
         header('Location: index.php'); 
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>