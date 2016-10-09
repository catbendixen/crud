</head>
 
<body class="background">
    
    <div class="container">
     
                <div class="span12 offset1">
    				<div class="row background">
		    			<h3>Update a Customer</h3>
		    		</div>
             
                    <form class="form-horizontal" action="update.php?Client_ID=<?php echo $id?>" method="post">
                      <div class="control-group warning <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label warning">Name</label>
                        <div class="controls">
                            <input name="Client_Name" type="text"  placeholder="Name" value="<?php echo !empty($Client_Name)?$Client_Name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group warning<?php echo !empty($addressError)?'error':'';?>">
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
                            <?php endif;?>
                        </div>
                      </div> 
                      <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
