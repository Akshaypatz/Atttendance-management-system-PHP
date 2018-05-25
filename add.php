<?php 

include("db.php");

$flag=0;
if(isset($_POST['submit']))
    
{
    
      $studentname = $_POST['name'];
    $rollnumber = $_POST['rollno'];
   
 



 
    $query = "INSERT INTO attendance(student_name,roll_number) ";
    $query .= "VALUES ('$studentname','$rollnumber')";
    




   $result = mysqli_query($connection, $query);
    if($result) {
        
        $flag=1;
        
    
    } else {
    
     
    die('Query FAILED' . mysqli_error());
    }




}

?>
<!DOCTYPE html>
<html lang="en">
<head>

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
   
    <meta charset="UTF-8">
    <title>Shivams web app</title>
</head>
<body>
   
   <div class="container">
       
    <h1>  <div class="well text-center">Atenndce system</div> </h1> 
       
       <?php if($flag == 1) {  ?>
       
       
       <div class="panel panel-default">
          
          <div class="alert alert-success">
              
              <strong>!success</strong> student enrolled successfully;
          </div>
          
          <?php } ?>
          
          
          
           <div class="panel-heading">
              
              <h2>
              <a class="btn btn-success"  href="add.php">Add a Student</a>
                <a class="btn btn-info pull-right"  href="index.php">Go back</a>
                
                </h2>
           </div>
           
           <div class="panel-body">
               
               <form action="" method="post">
                   
                   
                   <div class="form-group">
                   <label for="name">Stident name :</label>
                   <input type="text" name="name" id="name" class="form-control" required>
                   
                   </div>
                   
                   <div class="form-group">
                   <label for="rollno">Roll Number:</label>
                   <input type="text" name="rollno" id="rollno" class="form-control" required>
                   
                   </div>
                    <div class="form-group">
                  
                   <input type="submit" name="submit" value="submit" class="btn btn-primary" required>
                   
                   </div>
                   
               </form>
           </div>
           
       </div>
       
   </div>
    
</body>
</html> 