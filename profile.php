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
  <title>Profile Page</title>
  <link rel = "stylesheet" type = "text/css" href = "profile.css"/>
</head>
<body>
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
    <link rel="stylesheet" href="css/profile.css" />

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

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
			document.body.style.backgroundColor = "white";
		}
	</script>
  </head>
<body>
      <!-- Nav Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark">
        <!-- <a class="navbar-brand" href="index.html">AnshDaan</a> -->
        <a href="index.php"
          ><img id="logo" src="images/logo_AnshDaan.png" , width="200px"
        /></a>

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
              <a class="nav-link" href="contact_us.php">Contact</a>
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
                  echo "<li class='nav-item'> <a class='nav-link' href='login.php'>Login</a></li>"; 
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
	  

	  <div align = "left" >
		<span onclick="openNav()" class="material-symbols-outlined">menu</span>
		<div>
				<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<?php
						echo "<c>Welcome, {$username}</c><br>"; 
						echo "<p>&nbsp;</p>";
						echo "<li class='fieldset'>";
						if ($datebasePatientFlag == 1) {
							echo "<a href = 'POA_Management.php'> Power of Attorney Management </a>";
						}
						echo "<a href = 'changepassword.php'> Change Password </a>"; 
						echo "<a href = 'deactivate.php'> Deactivate Acount </a>";
						echo "</li>"; 
					?>
				</div>
			</div>
      </div>

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
	<!-- <p>&nbsp;</p>  -->
	<div class = "priority" align = "center">
	<div id="header"><h2 class="title" align = "center"><font face= "Montserrat-Bold" size = 13px>Profile</font></h2></div>
	<div id="main-wrap">
		<div id="content-wrap" style = "overflow-x:auto;">
		<p>&nbsp;</p>
			<?php
				if($datebasePatientFlag == 1)
				{
					require("connect.php");
					$query = mysqli_query($connection, "SELECT DISTINCT patientinfo.firstName, patientinfo.lastName, patientinfo.phoneNumber, patientinfo.email, patientinfo.title AS 'Organ', patientinfo.bloodType, patientinfo.height, patientinfo.weight FROM patientinfo, accountinfo WHERE '$userID' = patientinfo.userID ORDER BY 1 ASC"); 
					echo "<b>Profile Information</b>"; 
					echo "<table>"; // start a table tag in the HTML
					echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Phone Number</th> <th>Email</th> <th>Organ</th> <th>Blood Type</th> <th>Height</th> <th>Weight</th> <tr> "; 
					while($row = mysqli_fetch_array($query))
					{   //Creates a loop to loop through results
						echo "<tr><td>" . $row['firstName'] . "</td> <td>" . $row['lastName'] . "</td> <td>" .$row['phoneNumber'] . "</td> <td>" . $row['email'] . "</td> <td>" .$row['Organ'] . "</td> <td>" . $row['bloodType'] . "</td> <td>" . $row['height'] . "</td> <td>" . $row['weight'] . "</td></tr>";  //$row['index'] the index here is a field name
					}
					echo "</table><br><br>"; 
					echo "<b>Doctor Information</b>"; 
					
					$query2 = mysqli_query($connection, "SELECT accountinfo.firstName AS 'First Name', accountinfo.lastName AS 'Last Name', accountinfo.phoneNumber AS 'Phone Number', accountinfo.email AS 'Email' FROM accountinfo, patientinfo WHERE '$userID' = patientinfo.userID AND patientinfo.doctorUserID = accountinfo.doctorUserID"); 
					
					echo "<table>"; 
					echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Phone Number</th> <th>Email</th>"; 
					while($row2 = mysqli_fetch_array($query2))
					{   //Creates a loop to loop through results
						echo "<tr><td>" . $row2['First Name'] . "</td> <td>" . $row2['Last Name'] . "</td> <td>" .$row2['Phone Number'] . "</td> <td>" . $row2['Email'] . "</td></tr>";  //$row['index'] the index here is a field name
					}
					echo "</table><br><br>"; //Close the table in HTML 
					
					
					$query3 = mysqli_query($connection, "SELECT available FROM patientinfo WHERE '$userID' = userID"); 
					$row3 = mysqli_fetch_array($query3); 
					$status = $row3['available']; 
					if($status == 1)
					{
						echo "<b>We are in the process of finding a match for you. We appreciate your patience.</b>"; 
					}
					else if($status == 2) 
					{
						echo "<b>Congratulations, you have been matched! Your doctor will notify you for further directions soon.</b>"; 
					}
					else
					{
						echo "<b>Your surgery has been scheduled</b><br>"; 
						$appointmentQuery1 = mysqli_query($connection, "SELECT patientType FROM patientinfo WHERE userID = '$userID'"); 
						$patientrow = mysqli_fetch_array($appointmentQuery1); 
						if($patientrow == 1)
						{
							$appointmentQuery = mysqli_query($connection, "SELECT accountinfo.firstName AS 'Doctor First Name', accountinfo.lastName AS 'Doctor Last Name', accountinfo.phoneNumber AS 'Phone Number', accountinfo.email AS 'Email', scheduler.surgery_date AS 'Day', scheduler.surgery_time AS 'Time' FROM scheduler, accountinfo, patientinfo WHERE scheduler.doctorUserID = accountinfo.doctorUserID AND patientinfo.userID = '$userID' AND patientinfo.userID = scheduler.donorID"); 
							echo "<table>"; 
							echo "<tr> <th>Doctor First Name</th> <th>Doctor Last Name</th> <th>Phone Number</th> <th>Email</th> <th>Surgery Date</th> <th>Time</th>"; 
							while($appointmentRow = mysqli_fetch_array($appointmentQuery))
							{   //Creates a loop to loop through results
								echo "<tr><td>" . $appointmentRow['Doctor First Name'] . "</td> <td>" . $appointmentRow['Doctor Last Name'] . "</td> <td>" . $appointmentRow['Phone Number'] . "</td> <td>" . $appointmentRow['Email'] . "</td> <td>" . $appointmentRow['Day'] . "</td> <td>" . $appointmentRow['Time'] . "</td></tr>";  //$row['index'] the index here is a field name
							}
							echo "</table><br><br>"; //Close the table in HTML 
						}
						else
						{
							$appointmentQuery = mysqli_query($connection, "SELECT accountinfo.firstName AS 'Doctor First Name', accountinfo.lastName AS 'Doctor Last Name', accountinfo.phoneNumber AS 'Phone Number', accountinfo.email AS 'Email', scheduler.surgery_date AS 'Day', scheduler.surgery_time AS 'Time' FROM scheduler, accountinfo, patientinfo WHERE scheduler.doctorUserID = accountinfo.doctorUserID AND patientinfo.userID = '$userID' AND patientinfo.userID = scheduler.recipientID"); 
							echo "<table>"; 
							echo "<tr> <th>Doctor First Name</th> <th>Doctor Last Name</th> <th>Phone Number</th> <th>Email</th> <th>Surgery Date</th> <th>Time</th>"; 
							while($appointmentRow = mysqli_fetch_array($appointmentQuery))
							{   //Creates a loop to loop through results
								echo "<tr><td>" . $appointmentRow['Doctor First Name'] . "</td> <td>" . $appointmentRow['Doctor Last Name'] . "</td> <td>" . $appointmentRow['Phone Number'] . "</td> <td>" . $appointmentRow['Email'] . "</td> <td>" . $appointmentRow['Day'] . "</td> <td>" . $appointmentRow['Time'] . "</td></tr>";  //$row['index'] the index here is a field name
							}
							echo "</table><br><br>"; //Close the table in HTML 
						}
					}
				}
				else
				{
					require("connect.php");
					$query2 = mysqli_query($connection, "SELECT accountinfo.firstName, accountinfo.lastName, accountinfo.phoneNumber, accountinfo.email FROM accountinfo WHERE '$userID' = userID ORDER BY 1 ASC"); 
					echo "<table>"; // start a table tag in the HTML
					echo "<tr> <th>First Name</th> <th>Last Name</th> <th>Phone Number</th> <th>Email</th> <tr>"; 
					while($row2 = mysqli_fetch_array($query2))
					{   //Creates a loop to loop through results
						echo "<tr><td>" . $row2['firstName'] . "</td> <td>" . $row2['lastName'] . "</td> <td>" .$row2['phoneNumber'] . "</td> <td>" . $row2['email'] . "</td></tr>";  
					}
					echo "</table><br><br>"; //Close the table in HTML 
					
					if($databaseUserType == "1")
					{
						echo "<b>Donor Patients</b>"; 
						$query3 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount, accountinfo WHERE patientinfo.userID = useraccount.userID AND useraccount.active = 1 AND patientinfo.available = '1' AND patientinfo.title = '$databaseTitle' AND patientinfo.patientType = '1' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID ORDER BY 2"); 
					
						echo "<table>"; // start a table tag in the HTML
						echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <tr> "; 
						while($row3 = mysqli_fetch_array($query3))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row3['Username'] . "</td> <td>" . $row3['First Name'] . "</td> <td>" . $row3['Last Name'] . "</td> <td>" . $row3['Email'] . "</td> <td>" .$row3['Blood Type'] . "</td> <td>" . $row3['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
						}
						echo "</table><br><br>"; //Close the table in HTML 
						
						echo "<b>Recipient Patients</b>"; 
						$query3 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount, accountinfo WHERE patientinfo.userID = useraccount.userID AND useraccount.active = 1 AND patientinfo.available = '1' AND patientinfo.title = '$databaseTitle' AND patientinfo.patientType = '2' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID ORDER BY 2"); 
					
						echo "<table>"; // start a table tag in the HTML
						echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <tr> "; 
						while($row3 = mysqli_fetch_array($query3))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row3['Username'] . "</td> <td>" . $row3['First Name'] . "</td> <td>" . $row3['Last Name'] . "</td> <td>" . $row3['Email'] . "</td> <td>" .$row3['Blood Type'] . "</td> <td>" . $row3['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
						}
						echo "</table><br><br>"; //Close the table in HTML 
						
						echo "<b>Scheduled Surgeries</b><br>"; 
						echo "<table>"; 
						echo"<tr> <th>Donor</th> <th>Recipient</th> <th>Day</th> <th>Time</th> <tr> ";
						$surgeryQuery = mysqli_query($connection, "SELECT CONCAT(pa1.firstName, ' ', pa1.lastName) AS 'Donor', CONCAT(pa2.firstName, ' ', pa2.lastName) AS 'Recipient', scheduler.surgery_date AS 'Day', scheduler.surgery_time AS 'Time' FROM scheduler, accountinfo, patientinfo pa1, patientinfo pa2 WHERE scheduler.doctorUserID = accountinfo.doctorUserID AND accountinfo.userID = '$userID' AND pa1.userID = scheduler.donorID AND pa2.userID = scheduler.recipientID"); 
						while($surgeryRow = mysqli_fetch_array($surgeryQuery))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $surgeryRow['Donor'] . "</td> <td>" . $surgeryRow['Recipient'] . "</td> <td>" . $surgeryRow['Day'] . "</td> <td>" . $surgeryRow['Time'] . "</td></tr>";  //$row['index'] the index here is a field name
						}
						echo "</table><br><br>"; //Close the table in HTML 
					}
					else //managers
					{
						echo "<b>Donor Patients</b>"; 
						$query3 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ' FROM patientinfo, useraccount WHERE patientinfo.userID = useraccount.userID AND useraccount.active = 1 AND patientinfo.available = '1' AND patientinfo.patientType = '1' ORDER BY 2"); 
					
						echo "<table>"; // start a table tag in the HTML
						echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <tr> "; 
						while($row3 = mysqli_fetch_array($query3))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row3['Username'] . "</td> <td>" . $row3['First Name'] . "</td> <td>" . $row3['Last Name'] . "</td> <td>" . $row3['Email'] . "</td> <td>" .$row3['Blood Type'] . "</td> <td>" . $row3['Organ'] . "</td></tr>";  //$row['index'] the index here is a field name
						}
						echo "</table><br><br>"; //Close the table in HTML 
						
						echo "<b>Recipient Patient Waitlist</b>"; 
						$query3 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.email AS 'Email', patientinfo.bloodType AS 'Blood Type', patientinfo.title AS 'Organ', waitlistScore AS 'Wait List Score' FROM patientinfo, useraccount, waitlist WHERE patientinfo.userID = useraccount.userID AND useraccount.active = 1 AND patientinfo.available = '1' AND patientinfo.patientType = '2' AND waitlist.userID = useraccount.userID AND waitlist.userID = patientinfo.userID AND waitlistScore ORDER BY 2"); 
					
						echo "<table>"; // start a table tag in the HTML
						echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Blood Type</th> <th>Organ</th> <th>Score</th><tr> "; 
						while($row3 = mysqli_fetch_array($query3))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row3['Username'] . "</td> <td>" . $row3['First Name'] . "</td> <td>" . $row3['Last Name'] . "</td> <td>" . $row3['Email'] . "</td> <td>" .$row3['Blood Type'] . "</td> <td>" . $row3['Organ'] . "</td> <td>" . $row3['Wait List Score'] . "</td></tr>";  //$row['index'] the index here is a field name
						}
						echo "</table><br><br>"; //Close the table in HTML 
					}
				}
				$connection->close(); 
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