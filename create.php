<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--This project was created with the help of several tutorials--including, but not limited to Startutorial.com -->
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
 
</head>
 
<body class="background">
    <?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $addressError = null;
        $phoneError = null;
        $contactError = null;
        $postcodeError = null;
         
        // keep track post values
        $Client_Name = $_POST['Client_Name'];
        $Client_Address = $_POST['Client_Address'];
        $Client_Contact = $_POST['Client_Contact'];
        $Client_Phone = $_POST['Client_Phone'];
        $Client_Postcode = $_POST['Client_Postcode'];
        
        //$client_city = $_POST['Postcode_City'];
        //$client_post = $_POST['Postcode_ID'];
         
        // validate input
        $valid = true;
        if (empty($Client_Name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        } else { echo "Client_Name: check \n"; }
         
        if (empty($Client_Address)) {
            $addressError = 'Please enter Address';
            $valid = false;
        } else { echo "Client_Address : check \n"; }
         
        if (empty($Client_Contact)) {
            $contactError = 'Please enter Contact Person';
            $valid = false;
        } else { echo "Client_Contact: check \n"; }
        
        if (empty($Client_Phone)) {
            $phoneError = 'Please enter Phone Number';
            $valid = false;
        } else { echo "Client_Phone : check \n"; }
        
        if (empty($Client_Postcode)) {
            $postcodeError = 'Please enter Postcode';
            $valid = false;
        } else { echo "Client_Postcode : check \n"; }
         
         
         echo "<br><br>";
         
        // insert data
        if ($valid) {
          
          
            if($pdo = Database::connect())
            {
              echo "databaseforbindelse OK";
            }
            else{
              echo "Ingen databaseforbindelse";
            }
            
            echo "<br><br>";
            
            
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*
            $sql = "BEGIN; INSERT INTO client (Client_Name, Client_Address, Client_Contact, Client_Phone, Client_Postcode ) VALUES(?, ? , ? , ? , ?);
                            INSERT INTO postcode (Postcode_ID, Postcode_City) VALUES(?,?);
                            COMMIT";
            */
            $sql = "INSERT INTO client (Client_Name, Client_Address, Client_Contact, Client_Phone, Client_Postcode) VALUES(?, ? , ? , ? , ?)";
            //$sql= "INSERT INTO client (Client_Name, Postcode_Postcode_ID) VALUES (?, ?)"; $client_post,$client_city
            $q = $pdo->prepare($sql);
            if
            (
              $q->execute(
               
                array(
                                   $Client_Name,$Client_Address,$Client_Contact,$Client_Phone,$Client_Postcode
                )
              )
            )
            {
              echo "Successfully added to database";
            }
            else
            {
              echo "Problem with the addition";
            }
            
            
            Database::disconnect();
            
        
           
        } 
        
        //else {
            
        //  echo "This is not valid";
          
        //}
        
    //} else {
    
      //echo "Her ender vi";
      
    }
?>
    <div class="container">
     
                <div class="span12 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group warning <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label warning">Name</label>
                        <div class="controls">
                            <input name="Client_Name" type="text"  placeholder="Name" value="<?php echo !empty($Client_Name)?$Client_Name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group warning <?php echo !empty($addressError)?'error':'';?>">
                        <label class="control-label warning">Address</label>
                        <div class="controls">
                            <input name="Client_Address" type="text" placeholder="Address" value="<?php echo !empty($Client_Address)?$Client_Address:'';?>">
                            <?php if (!empty($addressError)): ?>
                                <span class="help-inline"><?php echo $addressError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group warning <?php echo !empty($contactError)?'error':'';?>">
                        <label class="control-label warning">Contact Person</label>
                        <div class="controls">
                            <input name="Client_Contact" type="text"  placeholder="Contact Person" value="<?php echo !empty($Client_Contact)?$Client_Contact:'';?>">
                            <?php if (!empty($contactError)): ?>
                                <span class="help-inline"><?php echo $contactError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        <div class="control-group warning <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label warning">Phone</label>
                        <div class="controls">
                            <input name="Client_Phone" type="text"  placeholder="Phone" value="<?php echo !empty($Client_Phone)?$Client_Phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                     <div class="control-group warning <?php echo !empty($postcodeError)?'error':'';?>">
                        <label class="control-label warning">Postcode</label>
                        <div class="controls">
                            <input name="Client_Postcode" type="text"  placeholder="Postcode" value="<?php echo !empty($Client_Postcode)?$Client_Postcode:'';?>">
                            <?php if (!empty($postcodeError)): ?>
                                <span class="help-inline"><?php echo $postcodeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div> 
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                    </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
