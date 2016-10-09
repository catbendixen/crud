<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php
     include 'database.php';
    ?>
    
    <meta charset="utf-8">
        <!--This project was created with the help of several tutorials--including, but not limited to Startutorial.com -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
   
</head>
 
<body class="background">
    <div class="container">
        <div class="row">
            <h3>Module 2 Part 3</h3>
        </div>
            
        <div class="row">
            <p><a href="create.php" class="btn btn-success">Create a New Client</a></p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact person</th>
                            <th>Phone</th>
                            <th>Postcode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                           
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM client ORDER BY Client_ID DESC';
                            foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['Client_Name'] . '</td>';
                                echo '<td>'. $row['Client_Address'] . '</td>';
                                echo '<td>'. $row['Client_Contact'] . '</td>';
                                echo '<td>'. $row['Client_Phone'] . '</td>';
                                echo '<td>'. $row['Client_Postcode'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn btn-warning" href="read.php?Client_ID='.$row['Client_ID'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?Client_ID='.$row['Client_ID'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?Client_ID='.$row['Client_ID'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                                }
                   
                        Database::disconnect();
                        ?>
                    </tbody>
                </table>
               <a class="btn btn-danger" href="project.php">Project View</a>
            </div>
        </div>    
        

    </div> <!-- /container -->
</body>
</html>
