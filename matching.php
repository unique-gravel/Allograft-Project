<?php 
ob_start();
error_reporting (E_ALL); 
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
    <link rel="stylesheet" href="css/matching.css" />

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

<style>
table {
    border-collapse: collapse;
    width: 90%;
	height: 90;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #E6211E;
    color: white;
}
</style>

<p>&nbsp;</p>
	<div class = "priority" align = "center">
	<div id="header"><h2 class="title" align = "center"><font face= "Montserrat" size = 13px>Matching</font></h2></div>
	<div id="main-wrap">
	<div id="sidebar">
	<form action = "matching.php" method = "post">
		<fieldset>
	<legend><b>Sort By</b></legend>
	<input type="radio" name="sort" value="1" checked> Username<br> 
	<input type="radio" name="sort" value="2"> First Name<br> 
	<input type="radio" name="sort" value="3"> Last Name<br>
	<input type="radio" name="sort" value="4"> Email<br> 
	<input type="radio" name="sort" value="5"> Blood Type<br>
	<input type="radio" name="sort" value="6"> Organ<br>
	<input type="radio" name="sort" value="7"> Score<br><br>
	
	<p><b>Order</b></p>
	<input type="radio" name="order" value="ASC"> Ascending<br>
	<input type="radio" name="order" value="DESC" checked> Descending<br> 
	<input type="submit" name = "sortbutton" value = "Sort"> <br> <br> 
	<p>&nbsp;</p>
	
	<p>Enter the username of the donor and recipient to match</p>
	<form action = "matching.php" method = "post"> 
	<legend><b>Matching</b></legend>
	Donor: <input type="text" name="donor"> <br> <br> 
	Recipient: <input type="text" name="recipient"> <br> <br> 
	<input type="submit" name = "matchbutton" value = "Match"> <br> <br> 
	</div>
		<div id="content-wrap" style = "overflow-x:auto;">
		<?php
			// error_reporting (0);
			require("connect.php");
			if(isset($_POST['sortbutton']))
			{
				$sortVariable = (int)$_POST['sort'];
				$orderVariable = $_POST['order']; 
				
				if($sortVariable == 7)
				{
					echo "<b>Donors</b>"; 
					$donorQuery = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount, accountinfo WHERE patientType = 1 AND patientinfo.userID = useraccount.userID AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.active = 1 AND useraccount.active = 1 AND patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' ORDER BY 6 $orderVariable"); 
					
					echo "<table>"; // start a table tag in the HTML
					echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <tr> "; 
					while($donorRow = mysqli_fetch_array($donorQuery))
					{   //Creates a loop to loop through results
						echo "<tr><td>" . $donorRow['Username'] . "</td> <td>" . $donorRow['First Name'] . "</td> <td>" . $donorRow['Last Name'] . "</td> <td>" . $donorRow['Email'] . "</td> <td>" . $donorRow['Blood Type'] . "</td> <td>" . $donorRow['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
					}
					echo "</table><br><br>"; //Close the table in HTML 
				}
				else
				{
					echo "<b>Donors</b>"; 
					$donorQuery = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount, accountinfo WHERE patientType = 1 AND patientinfo.userID = useraccount.userID AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.active = 1 AND useraccount.active = 1 AND patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' ORDER BY $sortVariable $orderVariable"); 
					
					echo "<table>"; // start a table tag in the HTML
					echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <tr> "; 
					while($donorRow = mysqli_fetch_array($donorQuery))
					{   //Creates a loop to loop through results
						echo "<tr><td>" . $donorRow['Username'] . "</td> <td>" . $donorRow['First Name'] . "</td> <td>" . $donorRow['Last Name'] . "</td> <td>" . $donorRow['Email'] . "</td> <td>" . $donorRow['Blood Type'] . "</td> <td>" . $donorRow['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
					}
					echo "</table><br><br>"; //Close the table in HTML 
				}
				
				echo "<b>Recipient Waitlist</b>";
				$queryRecipients = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ', waitlist.Score AS 'Score' FROM useraccount, patientinfo, waitlist, accountinfo WHERE useraccount.active = 1 AND patientinfo.patientType = 2 AND patientinfo.active = 1 AND useraccount.userID = patientinfo.userID AND patientinfo.userID = waitlist.userID AND patientinfo.title = '$databaseTitle' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND accountinfo.userID = '$userID' AND accountinfo.userID = '$userID' ORDER BY $sortVariable $orderVariable"); 
				echo "<table>"; // start a table tag in the HTML
				echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <th>Score</th> <tr> "; 
				while($recipientRow = mysqli_fetch_array($queryRecipients))
				{
					echo "<tr><td>" . $recipientRow['Username'] . "</td> <td>" . $recipientRow['First Name'] . "</td> <td>" . $recipientRow['Last Name'] . "</td> <td>" . $recipientRow['Email'] . "</td> <td>" . $recipientRow['Blood Type'] . "</td> <td>" . $recipientRow['Organ'] . "</td> <td>" . $recipientRow['Score'] . "</td></tr>";  //$row['index'] the index here is a field name
				}
				
				$connection->close(); 
			}
			else if(isset($_POST['matchbutton']))
			{
				$donorVariable = mysqli_real_escape_string($connection, $_POST['donor']); 
				$recipientVariable = mysqli_real_escape_string($connection, $_POST['recipient']); 
				
				if($donorVariable && $recipientVariable)
				{
					$checkPatient = mysqli_query($connection, "SELECT DISTINCT patientinfo.userID AS 'userID', patientinfo.title AS 'title', patientinfo.bloodType AS 'bloodType' FROM patientinfo, useraccount WHERE '$donorVariable' = useraccount.userName AND useraccount.userID = patientinfo.userID AND patientinfo.active = 1 AND patientinfo.patientType = 1 AND useraccount.active = 1"); 
					$numberOfSelectRows = mysqli_num_rows($checkPatient); 
					if($numberOfSelectRows == 1)
					{
						$row = mysqli_fetch_assoc($checkPatient);
						$donorUser = $row['userID']; 
						$donorBlood = $row['bloodType'];
						$donorOrgan = $row['title'];
						$checkrRecipientPatient = mysqli_query($connection, "SELECT DISTINCT patientinfo.userID AS 'userID', patientinfo.title AS 'title', patientinfo.bloodType AS 'bloodType' FROM patientinfo, useraccount WHERE '$recipientVariable' = useraccount.userName AND useraccount.userID = patientinfo.userID AND patientinfo.active = 1 AND patientinfo.patientType = 2 AND useraccount.active = 1"); 
						$numberOfSelectRows = mysqli_num_rows($checkrRecipientPatient); 
						if($numberOfSelectRows == 1)
						{
							$row2 = mysqli_fetch_assoc($checkrRecipientPatient);
							$recipientUser = $row2['userID']; 
							$recipientOrgan = $row2['title']; 
							$recipientBlood = $row2['bloodType']; 
							if($donorOrgan === $recipientOrgan )
							{
								$posneg = array('+', '-'); 
								$recipientBlood2 = (string)$recipientBlood; 
								$donorBlood2 = (string)$donorBlood; 
								$recipientBlood2 = str_replace($posneg, "", $recipientBlood);
								$donorBlood2 = str_replace($posneg, "", $donorBlood);

								if($recipientBlood2 == $donorBlood2 || $donorBlood2 == "O" || $recipientBlood2 == "AB")
								{
									$insertOrgan = mysqli_query($connection, "INSERT INTO organs VALUES ('$recipientUser', '$donorUser', '$recipientOrgan', '$recipientBlood', NOW())"); 
									$updatePatientinfo =  mysqli_query($connection, "UPDATE waitlist SET Score = -1 WHERE '$recipientUser' = userID"); 
									echo "<b>You've made a match. The patients will be notified by email.</b>";
									$connection->close(); 
									header("refresh:3;url=matching.php");
								}
								else
								{
									echo "<b>Incompatiable blood types</b>"; 
									$connection->close(); 
									header("refresh:2;url=matching.php");
								}
							}
							else
							{
								echo "The organs of the recipient and donor do not match."; 
								$connetion->close(); 
								header("refresh:2;url=matching.php");
							}
						}
						else
						{
							echo "Check the recipient username"; 
							$connection->close(); 
							header("refresh:2;url=matching.php");
						}
					}
					else
					{
						echo "Check the username for the donor"; 
						$connection->close(); 
						header("refresh:2;url=matching.php");
					}
				}
				else
				{
					echo "Please enter in all fields"; 
					header("refresh:2; url=matching.php");
				}
			}
			else 
			{ 
				echo "<b>Donors</b>";
				$query = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount, accountinfo WHERE patientType = 1 AND patientinfo.userID = useraccount.userID AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.active = 1 AND useraccount.active = 1 AND patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID'"); 
				
				echo "<table>"; // start a table tag in the HTML
				echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> </tr> "; 
				while($row = mysqli_fetch_array($query))
				{   //Creates a loop to loop through results
					echo "<tr><td>" . $row['Username'] . "</td> <td>" . $row['First Name'] . "</td> <td>" . $row['Last Name'] . "</td> <td>" . $row['Email'] . "</td> <td>" .$row['Blood Type'] . "</td> <td>" . $row['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
				}
				echo "</table><br><br>"; //Close the table in HTML 
				
				echo "<b>Recipient Waitlist</b>";
				$queryRecipients = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ', waitlist.Score AS 'Score' FROM useraccount, patientinfo, waitlist, accountinfo WHERE useraccount.active = 1 AND patientinfo.patientType = 2 AND patientinfo.active = 1 AND useraccount.userID = patientinfo.userID AND patientinfo.userID = waitlist.userID AND patientinfo.title = '$databaseTitle' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND accountinfo.userID = '$userID' ORDER BY 6 ASC"); 
				echo "<table>"; // start a table tag in the HTML
				echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <th>Score</th> </tr> "; 
				while($recipientRow = mysqli_fetch_array($queryRecipients))
				{
					echo "<tr><td>" . $recipientRow['Username'] . "</td> <td>" . $recipientRow['First Name'] . "</td> <td>" . $recipientRow['Last Name'] . "</td> <td>" . $recipientRow['Email'] . "</td> <td>" . $recipientRow['Blood Type'] . "</td> <td>" . $recipientRow['Organ'] . "</td> <td>" . $recipientRow['Score'] . "</td></tr>";  //$row['index'] the index here is a field name
				}		
				$connection->close(); 
			}
			echo "<p>&nbsp;</p>";		
		?>
			</div>
		</div>
		</div>
		<p>&nbsp;</p>
		<!-- <footer>
		<p class="footer1">AnshDaan - Give The Gift of Life</p>
	</footer> -->
	</body>
</html>