<!-- <?php 
error_reporting (0); 
session_start(); 
$userID = $_SESSION['userID'];  
$username = $_SESSION['username']; 
$databaseTitle = $_SESSION['title']; 
$databaseUserType = $_SESSION['userType']; 
$datebasePatientFlag = $_SESSION['patientFlag']; 
?> -->

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
    <link rel="stylesheet" href="css/report.css" />

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
	<div id="header"><h2 class="title" align = "center"><font face= "Montserrat" size = 13px>Reports</font></h2></div>
	<div id="main-wrap">
		<div id="content-wrap" style = "overflow-x:auto;">
		<p>&nbsp;</p>
		<?php
		error_reporting(0);
		require("connect.php"); 
		if($databaseUserType == 2)
		{
			$query = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'Number Of Heart Patients' 
												FROM patientinfo 
												WHERE title = 'heart'"); 
			$row = mysqli_fetch_array($query); 
			
			$query2 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'Number Of Lung Patients' 
												FROM patientinfo 
												WHERE title = 'lung'");
			$row2 = mysqli_fetch_array($query2); 
			
			$query3 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'Number Of Kidney Patients' FROM patientinfo WHERE title = 'kidney'"); 
			$row3 = mysqli_fetch_array($query3); 
			
			$query4 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'Number Of Liver Patients' 
												FROM patientinfo 
												WHERE title = 'liver'"); 
			$row4 = mysqli_fetch_array($query4); 
			
			//organ count 
			echo "<b>Number of Available Patients</b>"; 
			echo "<table>"; 
			echo "<tr> <th>Heart Patients</th>  <th>Lung Patients</th>  <th>Kidney Patients</th>  <th>Liver Patients</th> </tr>"; 
			echo "<tr><td>" . $row['Number Of Heart Patients'] . "</td> <td>" . $row2['Number Of Lung Patients'] . "</td> <td>" . $row3['Number Of Kidney Patients'] . "</td> <td>" . $row4['Number Of Liver Patients'] . "</td></tr>"; 
			echo "</table><br><br>"; 
			
			$query5 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.title AS 'Organ', patientinfo.bloodType AS 'Blood Type', patientinfo.patientType AS 'Patient Type', organs.date_matched AS 'Date Matched'   
												FROM useraccount, patientinfo, organs
												WHERE useraccount.userID = patientinfo.userID AND patientinfo.userID = organs.userID 
												UNION
												SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.title AS 'Organ', patientinfo.bloodType AS 'Blood Type', patientinfo.patientType AS 'Patient Type', organs.date_matched AS 'Date Matched'
												FROM useraccount, patientinfo, organs
												WHERE useraccount.userID = patientinfo.userID AND patientinfo.userID = organs.donorID
												ORDER BY 7"); 
			
			//bloodtype count
			$bloodQuery = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'O' 
												FROM patientinfo 
												WHERE patientinfo.bloodType = 'O+' OR patientinfo.bloodType = 'O-'"); 
			$bloodrow1 = mysqli_fetch_array($bloodQuery); 
			
			$bloodQuery2 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'A' 
												FROM patientinfo 
												WHERE patientinfo.bloodType = 'A+' OR patientinfo.bloodType = 'A-'"); 
			$bloodrow2 = mysqli_fetch_array($bloodQuery2); 
			
			$bloodQuery3 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'B' 
													FROM patientinfo 
													WHERE patientinfo.bloodType = 'B+' OR patientinfo.bloodType = 'B-'"); 
			$bloodrow3 = mysqli_fetch_array($bloodQuery3); 
			
			$bloodQuery4 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'AB' 
													FROM patientinfo 
													WHERE patientinfo.bloodType = 'AB+' OR patientinfo.bloodType = 'AB-'"); 
			$bloodrow4 = mysqli_fetch_array($bloodQuery4);
			
			echo "<b>Blood Type</b>"; 
			echo "<table>"; 
			echo "<tr> <th>O</th>  <th>A</th>  <th>B</th>  <th>AB</th> </tr>";
			echo "<tr><td>" . $bloodrow1['O'] . "</td> <td>" . $bloodrow2['A'] . "</td> <td>" . $bloodrow3['B'] . "</td> <td>" . $bloodrow4['AB'] . "</td></tr>"; 
			echo "</table><br><br>"; 
			
			echo "<b>Matched Patients </b>"; 
			echo "<table>"; 
			echo "<tr> <th>Username</th>  <th>First Name</th>  <th>Last Name</th>  <th>Organ</th> <th>Blood Type</th> <th>Patient Type</th> <th>Date Matched</th> </tr>"; 
			while($row5 = mysqli_fetch_array($query5))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row5['Username'] . "</td> <td>" . $row5['First Name'] . "</td> <td>" . $row5['Last Name'] . "</td> <td>" . $row5['Organ'] . "</td> <td>" .$row5['Blood Type'] . "</td> <td>" . $row5['Patient Type'] .  "</td> <td>" . $row5['Date Matched'] . "</td><tr>";  
						}
			echo "</table>";
		}
		else //doctor
		{
			$query = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'Number of Patients'
												FROM patientinfo, accountinfo
												WHERE patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID"); 
			$row = mysqli_fetch_array($query); 
			$numbOfPatients = $row['Number of Patients']; 
			echo "<b>Patient Count: $numbOfPatients</b><br><br>"; 
			
			if($numbOfPatients > 0)
			{
				//bloodtype count
				$bloodQuery = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'O' 
													FROM patientinfo, accountinfo 
													WHERE patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.bloodType LIKE 'O%'"); 
				$bloodrow1 = mysqli_fetch_array($bloodQuery); 
				
				$bloodQuery2 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'A' 
													FROM patientinfo, accountinfo
													WHERE patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.bloodType LIKE 'A%'"); 
				$bloodrow2 = mysqli_fetch_array($bloodQuery2); 
				
				$bloodQuery3 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'B' 
														FROM patientinfo, accountinfo
														WHERE patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.bloodType LIKE 'B%'"); 
				$bloodrow3 = mysqli_fetch_array($bloodQuery3); 
				
				$bloodQuery4 = mysqli_query($connection, "SELECT COUNT(patientinfo.userID) AS 'AB' 
														FROM patientinfo, accountinfo
														WHERE patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID AND patientinfo.bloodType LIKE 'AB%'"); 
				$bloodrow4 = mysqli_fetch_array($bloodQuery4); 
				
				echo "<table>";
				echo "<b>Blood Type</b>"; 
				echo "<table>"; 
				echo "<tr> <th>O</th>  <th>A</th>  <th>B</th>  <th>AB</th> </tr>";
				echo "<tr><td>" . $bloodrow1['O'] . "</td> <td>" . $bloodrow2['A'] . "</td> <td>" . $bloodrow3['B'] . "</td> <td>" . $bloodrow4['AB'] . "</td></tr>"; 
				echo "</table><br><br>";
				
				$query5 = mysqli_query($connection, "SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.title AS 'Organ', patientinfo.bloodType AS 'Blood Type', patientinfo.patientType AS 'Patient Type'    
													FROM useraccount, patientinfo, organs, accountinfo
													WHERE useraccount.userID = patientinfo.userID AND patientinfo.userID = organs.userID AND patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID 
													UNION
													SELECT useraccount.userName AS 'Username', patientinfo.firstName AS 'First Name', patientinfo.lastName AS 'Last Name', patientinfo.title AS 'Organ', patientinfo.bloodType AS 'Blood Type', patientinfo.patientType AS 'Patient Type'
													FROM useraccount, patientinfo, organs, accountinfo
													WHERE useraccount.userID = patientinfo.userID AND patientinfo.userID = organs.donorID AND patientinfo.title = '$databaseTitle' AND accountinfo.userID = '$userID' AND patientinfo.doctorUserID = accountinfo.doctorUserID");
				
				echo "<b>Matched Patients </b>"; 
				echo "<table>"; 
				echo "<tr> <th>Username</th>  <th>First Name</th>  <th>Last Name</th>  <th>Organ</th> <th>Blood Type</th> <th>Patient Type</th> </tr>"; 
				while($row5 = mysqli_fetch_array($query5))
						{   //Creates a loop to loop through results
							echo "<tr><td>" . $row5['Username'] . "</td> <td>" . $row5['First Name'] . "</td> <td>" . $row5['Last Name'] . "</td> <td>" . $row5['Organ'] . "</td> <td>" .$row5['Blood Type'] . "</td> <td>" . $row5['Patient Type'] . "</td><tr>" . "</td></tr>";  
						}
				echo "</table>";
			}
			$connection->close(); 
		}
		?>
		</div>
			<div id="sidebar" align = "left">
				<?php
					echo "<b>Key:</b><br>"; 
					echo "<fieldset>"; 
					echo "Patient Type:<br>";
					echo "1 <span>&#8594;</span> Donor<br>"; 
					echo "2 <span>&#8594;</span> Recipient<br><br>";
					echo "Matched Patients:<br>"; 
					echo "Every 2 rows represents a matched pair."; 
					echo "</fieldset>"; 
				?>
			</div>
		</div>
		</div>
  </body>
  <footer>
    <p class="footer">AnshDaan - Give The Gift of Life</p>
  </footer>
</html>