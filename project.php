<?php
require 'database.php';
$id = null;
if ( !empty($_GET['Client_ID'])) {
$id = $_REQUEST['Client_ID'];
}

if ( null==$id ) {
header("Location: index.php");
} else {
$pdo = Database::connect();
$sql = "SELECT * FROM project where Client_Client_ID = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));

$data = $q->fetchAll();

Database::disconnect();
}

?>



<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>View the Projects</h3>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>

                    <th>Project</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>

        <?php
        foreach($data as $key => $value){

            echo '<tr>';
            
            echo '<td>'. $value['Project_Name'] . '</td>';
            echo '<td>'. $value['Project_Startdate'] . '</td>';
            echo '<td>'. $value['Project_Enddate'] . '</td>'; 
            echo '<td>'. $value['Project_Detail'] . '</td>';
            
            
            echo '<td width=250>';
            echo '<a class="btn btn-warning" href="read.php?Client_ID='.$data['Client_ID'].'">Read</a>';
            echo ' ';
            echo '<a class="btn btn-success" href="update.php?Client_ID='.$data['Client_ID'].'">Update</a>';
            echo ' ';
            echo '<a class="btn btn-danger" href="delete.php?Client_ID='.$data['Client_ID'].'">Delete</a>';
            
            echo '</td>';
            echo '</tr>';

}
?>

</tbody>
</table>

<div class="form-actions">
<a class="btn" href="index.php">Back</a>
</div>
</div>
</div> 
>
</body>
</html>