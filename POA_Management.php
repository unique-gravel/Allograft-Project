<!--validate information for updating, adding, and deleting -->
<?php 
error_reporting (0); 
session_start(); 
$userID = $_SESSION['userID'];  
$username = $_SESSION['username']; 
$databaseTitle = $_SESSION['title']; 
$databaseUserType = $_SESSION['userType']; 
$datebasePatientFlag = $_SESSION['patientFlag']; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
      Together, We Can Save Lives - Join the Organ Donation Movement
    </title>
    <link rel="icon" type="image/png" href="images/logo_2.png" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu"
      rel="stylesheet"
    />

    <!-- CSS Stylesheets -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/poa.css" />

    <!-- Font Awesome -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"
    ></script>

    <!-- Bootstrap Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </head>
<body>
      <!-- Nav Bar -->
      
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="index.php"><img id="logo" src="images/logo_AnshDaan.png" , width="200px"/></a>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarTogglerDemo02"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse navbar_text"
          id="navbarTogglerDemo02"
        >
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQs</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about_us.php">About Us</a>
            </li>

              <?php
                if(!$userID)
                  {
                    echo "<li class='nav-item'>";
                    echo "<div class='dropdown'>
                              <button>Register</button>
                              <div class='dropdown-content'>
                                <div class='dropdown-options'>
                                  <a class='nav-link' href='register.php'>Donor/Recipient</a>
                                  <a class='nav-link' href='staff_register.php'>Doctor/Staff</a>
                                </div>
                              </div>
                            </div>";
                    echo "</li>";
                  }
                ?>
            
              <?php
              if(!$username)
                {
                  echo "<li class='nav-item'>";
                  echo "<a class='nav-link' href='login.php'>Login</a>"; 
                  echo "</li>";
                } 
              ?>
            

            <?php
                if($userID && $databaseUserType != "0") 
                { 
                  echo "<li class='nav-item'><a class='nav-link' href='reports.php'>Reports</a></li>"; 
                }
                if($userID && ($databaseUserType == "1"))
                {
                  echo "<li class='nav-item'><a class='nav-link' href='matching.php'>Matching</a></li>";
                } 
            ?>
            
            <?php 
              if($userID && ($databaseUserType == "2"))	
              {
              echo "<li class='nav-item'><a class='nav-link' href='scheduler.php'>Scheduler</a></li>";
              } 
            ?>
              
            <?php 
              if($userID) {
                // echo "<li class='nav-item'><a class='nav-link' href='POA_Management.php'>Power Of Attorney</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
              } 
            ?>
  
            <?php
              if($userID)
              {
                echo "<li class='nav-item'> <a class='nav-link' href='profile.php'>Hello, {$username}</a>"; 
              }
            ?>
                
          </ul>
        </div>
      </nav>
      <!-- Navigation Bar End -->
	  
	<p>&nbsp;</p> 
	<div class = "priority" align = "center">
	<div id="header"></div>
	<div id="main-wrap">
		<div id="content-wrap" style = "overflow-x:auto;">
		<h2 class="title" align = "center"><font face="Montserrat-Bold"size = 13px>Power of Attorney Management</font></h2>
		<p>&nbsp;</p>
		<p ><strong>To add or update your current emgency contact, type all of the fields with the new information. If you already have an emergency contact, you cannot add another.</strong></p>
		<?php
			require("connect.php"); 
			$showpoa = mysqli_query($connection, "SELECT DISTINCT powerofattorney.firstName, powerofattorney.lastName, powerofattorney.email, powerofattorney.phoneNumber FROM powerofattorney, patientInfo WHERE '$userID' = powerofattorney.userID AND decisionMakerFlag = '1'");  
			
			$numberOfRows = mysqli_num_rows($showpoa);
			if($numberOfRows == 1)
			{
				echo "<table>"; // start a table tag in the HTML
				echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Phone Number</th><tr> "; 
				while($row = mysqli_fetch_array($showpoa))
				{   //Creates a loop to loop through results
					echo "<tr><td>" . $row['firstName'] . "</td> <td>" . $row['lastName'] . "</td> <td>" . $row['email'] . "</td> <td>" .$row['phoneNumber'] ."</td></tr>";  
				}
				echo "</table>"; //Close the table in HTML 
			}
			else
			{
				echo "You currently do not have a power of attorney. You can add a power of attorney by selecting 'Add' and filling in all required fields"; 
			}
			$connection->close(); 
		?>
		</div>
			<div id="sidebar" align = "center">
		<form action="POA_Management.php" method= "post">
		<p>&nbsp;</p>
		<fieldset>
			<input type="radio" name="poa" value="edit" checked> Edit  
			<input type="radio" name="poa" value="add"> Add  
			<input type="radio" name="poa" value="delete"> Delete  
		</fieldset>
		<p>&nbsp;</p>
			First name: <input type="text" name="firstName" value=""maxlength="40"><br><br>
			Last name: <input type="text" name="lastName" value=""maxlength="40"><br><br>
			Email Address: <input type="text" name="Email" value= ""maxlength="40"><br><br>
			Phone Number: <input type="text" name="Phone" value= "">
			<p>&nbsp;</p>
			<input class="fancybutton" type="submit" name = "submitbutton" value = "Submit">
		</form>
		
		<?php 
			if(isset($_POST['submitbutton']))
			{
				require("connect.php");
				$poa_edit =  mysqli_real_escape_string($connection, $_POST['poa']);
				$poa_firstname = mysqli_real_escape_string($connection, $_POST['firstName']);
				$poa_lastname = mysqli_real_escape_string($connection, $_POST['lastName']);
				$poa_email = mysqli_real_escape_string($connection, $_POST['Email']);
				$poa_phone = mysqli_real_escape_string($connection, $_POST['Phone']);
				
				//validate information for updating, adding, and deleting 
				
				if($poa_firstname && $poa_lastname && $poa_email && $poa_phone)
				{ 
					if($poa_edit === "edit")
					{
						$showpoa3 = mysqli_query($connection, "SELECT DISTINCT powerofattorney.firstName, powerofattorney.lastName, powerofattorney.email, powerofattorney.phoneNumber FROM powerofattorney, patientInfo WHERE '$userID' = powerofattorney.userID AND decisionMakerFlag = '1'");  
			
						$numberOfRows3 = mysqli_num_rows($showpoa3);
						
						if($numberOfRows3 == 1)
						{
							$queryUpdate2 = mysqli_query($connection, "UPDATE patientInfo 
																	  SET decisionMakerFlag = 1
																	  WHERE userID = '$userID'");
							$queryUpdate = mysqli_query($connection, "UPDATE powerofattorney 
																	  SET firstName= '$poa_firstname', lastName = '$poa_lastname', phoneNumber = '$poa_phone' , email = '$poa_email'
																	  WHERE userID = '$userID'");
							if($queryUpdate && $queryUpdate2)
							{
								echo "<b> The Power Of Attorney Record has been successfully updated."; 
								$connection->close(); 
							}
							else
							{
								echo "Problem updating power of attorney record."; 
								$connection->close(); 
							}
						}
						else
						{
							echo "You do not have a power of attorney. To add one, select the add button and fill out all required fields, then press submit."; 
							$connection->close(); 
						}
					}
					else if ($poa_edit === "add")
					{
						$showpoa2 = mysqli_query($connection, "SELECT DISTINCT powerofattorney.firstName, powerofattorney.lastName, powerofattorney.email, powerofattorney.phoneNumber FROM powerofattorney, patientinfo WHERE patientinfo.userID = powerofattorney.userID AND '$userID' = powerofattorney.userID AND decisionMakerFlag = '1'");  
					
						$numberOfRows2 = mysqli_num_rows($showpoa2);
						
						if($numberOfRows2 == 0)
						{
							do{
								$patientinfo_poaID = rand(0, 9999); 
								$query = mysqli_query($connection, "SELECT poaID 
																	FROM powerofattorney
																	WHERE powerofattorney.poaID = '$patientinfo_poaID'"); 
								$numberOfRows = mysqli_num_rows($query); 
								}while ($numberOfRows == 1);
								
							$queryInsert = mysqli_query($connection, "INSERT INTO powerofattorney(poaID, userID, firstName, lastName, phoneNumber, email) VALUES ('$patientinfo_poaID', '$userID', '$poa_firstname', '$poa_lastname', '$poa_phone', '$poa_email')"); 
							
							if($queryInsert)
							{
								echo "<b> The Power Of Attorney Record has been successfully added. </b>"; 
								$connection->close(); 
							}
							else 
							{
								echo "Not all fields were entered in"; 
								$connection->close(); 
							}
						}
					else
						{
							$powerFetchRow = mysqli_fetch_array($showpoa2); 
							$powerUser = $powerFetchRow['userID']; 
							if($powerUser == '$userID')
							{
								$queryUpdate = mysqli_query($connection, "UPDATE powerofattorney 
																	  SET firstName= '$poa_firstname', lastName = '$poa_lastname', phoneNumber = '$poa_phone' , email = '$poa_email'
																	  WHERE userID = '$userID'");
								$queryUpdate2 = mysqli_query($connection, "UPDATE patientInfo 
																	  SET decisionMakerFlag = 1
																	  WHERE userID = '$userID'");
								echo "Power of Attorney added."; 
							}
							else
							{
								echo "<br>"; 
								echo "<b>You already have an emergency contact!</b>";
							}							
							$connection->close();
						}
					}
					else
					{
						$queryDelete = mysqli_query($connection, "UPDATE patientInfo 
																  SET decisionMakerFlag = 0 
																  WHERE userID = '$userID'");
						
						if($queryDelete)
						{
							echo "<b> The Power Of Attorney Record has been successfully deleted."; 
							$connection->close();
						}
						else
						{
							echo "Error occured when deleting."; 
							$connection->close();
						}
					}
				}
				else
				{
					echo "<br> Not all fields were entered in"; 
				}
			}
		?>
		<p>&nbsp;</p>
	</div>
	</div>
	</div>

	<footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>

</body>
</html>