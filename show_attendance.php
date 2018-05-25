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

    <h1>  <div class="well text-center">Attendance system</div> </h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <a class="btn btn-success"  href="add.php">Add a Student</a>
                <a class="btn btn-info pull-right"  href="index.php">Back</a>
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

                        $query = "select * from attendance_records WHERE date = '$_POST[date]'";
                        $result = mysqli_query($connection,$query);
                        $serialnumber=0;
                        $counter=0;
                        while($row=mysqli_fetch_array($result))
                        {

                            $serialnumber++;
                            ?>


                            <tr>
                                <td><?php echo $serialnumber; ?></td>
                                <td><?php echo $row['student_name']; ?>

                                </td>
                                <td><?php echo $row['roll_number']; ?>

                                </td>

                                <td><input type="radio" name="attendance_status[<?php echo $counter; ?>]"
                                        <?php if($row['attendance_status']=="Present")
                                            echo "checked=checked";
                                        ?>


                                           value="Present">Present


                                    <input type="radio" name="attendance_status[<?php echo $counter; ?>]"

                                        <?php if($row['attendance_status']=="Absent")
                                            echo "checked=checked";
                                        ?>

                                           value="Absent">Absent


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