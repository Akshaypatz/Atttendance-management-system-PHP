<?php
include('db.php');


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

    <h1>  <div class="well text-center">Attendance System</div> </h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <a class="btn btn-success"  href="add.php">Add a Student</a>
                <a class="btn btn-info pull-right"  href="index.php">Back</a>
            </h2>





            <div class="panel panel-body">




                    <table class="table table-striped">
                        <tr>
                            <th>Serial Number</th>
                            <th>Dates</th>
                            <th>Show Attendance</th>

                        </tr>

                        <?php


                        $result  = mysqli_query($connection,"select distinct date from attendance_records");
                        $serialnumber=0;

                        while($row=mysqli_fetch_array($result))
                        {

                            $serialnumber++;
                            ?>


                            <tr>
                                <td><?php echo $serialnumber; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>
                                    <form action="show_attendance.php" method="post">

                                        <input type="hidden" value="<?php echo $row['date'];  ?>" name="date">
                                        <input type="submit" class="btn btn-primary" value="Show Attendance">
                                    </form>
                                    
                                </td>



                            </tr>


<?php  }  ?>



                    </table>



</div>

            </div>
        </div>

    </div>



</body>
</html>