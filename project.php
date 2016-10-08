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
            
            
            <h3>Data View from Multiple Tables</h3>
        </div>
            
        <div class="row">
           
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Resource Name</th>
                            <th>Project Name</th>
                            <th>Project Start Date</th>
                            <th>Client</th>
                            <th>Hourly Usage Rate</th>
                           
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                           
                            $pdo = Database::connect();
                            
                            $sql= 'SELECT project.Project_Name, project.Project_Startdate, client.Client_Name, resources.Resources_Name, project_has_resources.hourly_Usage_Rate 
                                    FROM project, client, resources, project_has_resources 
                                    WHERE project.Client_Client_ID = client.Client_ID 
                                    AND project.Project_ID = project_has_resources.Project_Project_ID 
                                    AND project_has_resources.Resources_Resources_ID = resources.Resources_ID 
                                    ORDER BY resources.Resources_Name LIMIT 0, 1000';
                                foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['Resources_Name'] . '</td>';
                                echo '<td>'. $row['Project_Name'] . '</td>';
                                echo '<td>'. $row['Project_Startdate'] . '</td>';
                                echo '<td>'. $row['Client_Name'] . '</td>';
                                echo '<td>'. $row['hourly_Usage_Rate'] . '</td>';
                                
                                echo '</tr>';
                                }
                        Database::disconnect();
                        ?>
                        </tbody>
                </table>
        </div>
        <a class="btn" href="index.php">Back</a>
    </div> <!-- /container -->
</body>
</html>
