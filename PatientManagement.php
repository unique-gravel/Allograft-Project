<?php
error_reporting (0);
session_start();
$userID = $_SESSION['userID'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>

<html>
<head>
    <title>Organ Donation</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
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
    <div class="priority" align="center">
        <h2 class="title">Patient Management</h2>

        <style>
            ul
            {
                text-align: left;
            }
            table
            {
                border-collapse: collapse;
            }

            table, td, th
            {
                border: 1px solid black;
            }
        </style>

        <p>&nbsp;</p>
        <ul id = "buttons">
            <li><a href="EditPatient.php">Edit Patient</a></li>
        </ul>
        
			<?php
				$form = "<form action = './PatientManagement.php' method = 'post'>
				<table>
				<tr>
					<td>Add Patient </td>
					<td><input type = 'text' name = 'patientID' /></td>
					<td>To Doctor ID </td>
					<td><input type = 'text' name = 'doctorID' /></td>
					<td><input type = 'submit' name = 'updatePatientDoctor' value = 'updatePatient' /></td>
				</tr>
				<table>
				</form>";

					if($_POST['updatePatientDoctor'])
					{
						$patientID = $_POST['patientID'];
						$doctorID = $_POST['doctorID'];

						require("connect.php");
						$query = mysqli_query($connection, "UPDATE patientinfo SET doctorUserID = '$doctorID' WHERE userID = '$patientID'");
						echo "Patient Successfully Updated";
					}			
				
			?>
		<?php
		
		require("connect.php");
        echo "<table>";
        echo "<thread>";
            echo "<tr>";
                echo "<td><b> First Name </b></td>";
                echo "<td><b> Last Name </b></td>";
                echo "<td><b> Patient ID </b></td>";
                echo "<td><b> Patient Condition </b></td>";
                echo "<td><b> Date of Birth </b></td>";
                echo "<td><b> Height </b></td>";
                echo "<td><b> Weight </b></td>";
                echo "<td><b> Doctor ID </b></td>";
                echo "<td><b> Doctor Name </b></td>";
            echo "</tr>";

			$query = mysqli_query($connection, "SELECT firstName, lastName, userID, patientCond, dob, height, weight, doctorUserID FROM patientinfo");
			$numberOfRows = mysqli_num_rows($query);

          //  echo "<tr>";
          //       echo "<td> John </td>";
          //       echo "<td> Smith </td>";
          //       echo "<td> 1 </td>";
          //       echo "<td> Critical </td>";
          //       echo "<td> 2001-01-01 </td>";
          //       echo "<td> 5 </td>";
          //       echo "<td> 210 lbs. </td>";
          //       echo "<td> 0001 </td>";
          //       echo "<td> Bob </td>";
          //   echo "</tr>";

			if ($numberOfRows > 0) 
			{
				 // output data of each row
				 while($row = mysqli_fetch_assoc($query)) 
				 {
                    $query2 = mysqli_query($connection, "SELECT CONCAT('Dr.', ' ', accountinfo.lastName) FROM patientinfo, accountinfo WHERE patientinfo.doctorUserID = accountinfo.doctorUserID");
                    $row2 = mysqli_fetch_assoc($query2);
					 echo "<tr>";
						echo "<td> ". $row["firstName"]. " </td>";
						echo "<td> ". $row["lastName"]. " </td>";
						echo "<td> ". $row["userID"]. " </td>";
						echo "<td> ". $row["patientCond"]. " </td>";
						echo "<td> ". $row["dob"]. " </td>";
						echo "<td> ". $row["height"]. " </td>";
						echo "<td> ". $row["weight"]. " </td>";
						echo "<td> ". $row["doctorUserID"]. " </td>";
                        echo "<td align = 'center'> ". $row2["lastName"]. "</td>";
					echo "</tr>";
				 }
			}

			else
			{
				echo "0 results";
			}

	?>
        </thread>
        <tbody>
            <?php

            ?>
        </tbody>
        </table>

    </div>
</body>
</html>