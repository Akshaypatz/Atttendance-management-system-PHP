<?php
include('db.php');
$flag=0;
$update=0;
if(isset($_POST['submit']))
{
    $date= date("Y-m-d");
    $records = mysqli_query($connection,"select * from attendance_records where date ='$date'");
    $num=mysqli_num_rows($records);

    if($num)
    {
        foreach($_POST['attendance_status'] as $id=>$attendance_status){
            $student_name =  $_POST['student_name'][$id];
            $roll_number = $_POST['roll_number'][$id];


           $result =  mysqli_query($connection,"update attendance_records set student_name='$student_name' , roll_number='$roll_number' , attendance_status='$attendance_status' , date='$date' where date='$date' AND student_name='$student_name'");

            if($result){
                $update=1;
            }


        }
    }
    else
    {
        foreach($_POST['attendance_status'] as $id=>$attendance_status){
            $student_name =  $_POST['student_name'][$id];
            $roll_number = $_POST['roll_number'][$id];


            $result = mysqli_query($connection,"insert into attendance_records(student_name,roll_number,attendance_status,date)value('$student_name','$roll_number','$attendance_status','$date')");

            if($result){
                $flag=1;
            }


        }

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
       
    <h1>  <div class="well text-center">Attendance system</div> </h1>
       
       <div class="panel panel-default">
           <div class="panel-heading">
              <h2>
              <a class="btn btn-success"  href="add.php">Add a Student</a>
                <a class="btn btn-info pull-right"  href="view_all.php">View all</a>
           </h2>

          <?php if($flag == 1) { ?>
               <div class="alert alert-success">

                   Attendance data inserted successfully

               </div>
          <?php } ?>
               <?php if($update ==1) { ?>
                   <div class="alert alert-success">

                       Attendance data Updated successfully

                   </div>
               <?php } ?>
           
           <h2>
           <div class="well text-center">Date:
               
               <?php  echo date("Y-m-d"); ?>
               
           </div>
           </h2>
           
           
           <div class="panel panel-body">
               
               <form action="index.php" method="post">
                   
                   
                   <table class="table table-striped">
                       <tr>
                       <th>Serial Number</th>
                        <th>Student Name</th>
                         <th>Roll Number</th>
                          <th>Attendance Status</th>
                          </tr>
                          
                          <?php 
                       
                       
                       $result  = mysqli_query($connection,"select * from attendance");
                        $serialnumber=0;
                          $counter=0;
                       while($row=mysqli_fetch_array($result))
                       {

                           $serialnumber++;
                          ?> 
                          
                          
                          <tr>
                          <td><?php echo $serialnumber; ?></td>
                          <td><?php echo $row['student_name']; ?>
                              <input type="hidden" value="<?php echo $row['student_name']; ?>" name="student_name[]">
                          </td>
                          <td><?php echo $row['roll_number']; ?>
                              <input type="hidden" value="<?php echo $row['roll_number']; ?>" name="roll_number[]">
                          </td>
                          
                          <td>

                              <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present"

                                  <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter] == "Present"){
                                      echo "checked=checked";
                                  }  ?>
                              >Present

                              <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent"

                                  <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter] == "Absent"){
                                      echo "checked=checked";
                                  }  ?>

                              >Absent
                          
                          
                          </td>
                          
                          </tr>
                          
                       
                       
                  <?php $counter++;
                       }   ?>
                          
                       
                       
                   </table>
                   <input type="submit" name="submit" value="submit" class="btn btn-primary">
                   
               </form>
               
               
           </div>
            </div>
           
       </div>
       
   </div>
    
</body>
</html>