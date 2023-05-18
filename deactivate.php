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
    <link rel="stylesheet" href="css/styles.css" />

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
		<h2 class="title"><font face= "Brush Script MT" size = 13px>Deactivate Account</font></h2>
		<p>&nbsp;</p>
		<p><b>To deactivate your account, enter in your email and password in the specified fields. WARNING: This action is binding! Are you sure you want to deactivate your account?</b></p>
		
		<form action = "deactivate.php" method = "post">
		<fieldset>
			Email: <input type="text" name="email"> <br> <br> 
			Username: <input type="text" name="username"> <br> <br> 
			Password: <input type="password" name="pass"> <br> <br> 
			<input type="submit" name = "submitdeactivate" value = "Submit">
		</fieldset>
		
		<?php 
		require("connect.php"); 
		
		if($_POST['submitdeactivate'])
		{
			$email = mysqli_real_escape_string($connection, $_POST['email']); 
			$patient_username = mysqli_real_escape_string($connection, $_POST['username']); 
			$patient_password = mysqli_real_escape_string($connection, $_POST['pass']); 
			
			if($email && $patient_username && $patient_password && $databaseUserType == "0")
			{
				$query = mysqli_query($connection, "SELECT userName, passwrd, pateintFlag, useraccount.userID 
														  FROM useraccount, patientinfo
														  WHERE useraccount.userName = '$patient_username'
														  AND useraccount.passwrd = '$patient_password'
														  AND patientinfo.email = '$email'
														  AND useraccount.userID = patientinfo.userID"); 
				$numberOfRows = mysqli_num_rows($query);
				if($numberOfRows == 1)
				{
					$updateQuery = mysqli_query($connection, "UPDATE useraccount SET active = 0 WHERE userName = '$patient_username' AND passwrd = '$patient_password'");
					unset($_SESSION["username"]);
					unset($_SESSION["userID"]);
					unset($_SESSION['title']); 
					unset($_SESSION['userType']);
					unset($_SESSION['patientFlag']);
					session_destroy(); 
					echo "<b>You're account has been deactivated. Thank You for using St. Teresa's Organ Donation Center!</b>"; 
					header("refresh:3; url = index.php");
				}
				else
				{
					echo "Error occurred, please try again."; 
					header("refresh:2;url=deactivate.php");
					$connection->close(); 
				}
			}
			else if($email && $patient_username && $patient_password && $databaseUserType == "1" || $databaseUserType == "2")
			{
				$query = mysqli_query($connection, "SELECT userName, passwrd, email 
														  FROM useraccount, accountinfo
														  WHERE userName = '$patient_username'
														  AND passwrd = '$patient_password'
														  AND email = '$email'
														  AND useraccount.userID = accountinfo.userID"); 
				$numberOfRows = mysqli_num_rows($query);
				if($numberOfRows == 1)
				{
					$updateQuery = mysqli_query($connection, "UPDATE useraccount SET active = 0 WHERE userName = '$patient_username' AND passwrd = '$patient_password'");
					unset($_SESSION["username"]);
					unset($_SESSION["userID"]);
					unset($_SESSION['title']); 
					unset($_SESSION['userType']);
					unset($_SESSION['patientFlag']);
					session_destroy(); 
					echo "You're account has been deactivated. Thank You for using St. Teresa's Organ Donation Center!"; 
					header("refresh:2; url = index.php");
				}
				else
				{
					echo "Error occurred"; 
					header("refresh:2;url=deactivate.php");
					$connection->close();  
				}
			}
			else
			{
				echo "Please enter in all fields."; 
				header("refresh:2;url=deactivate.php");
				$connection->close(); 
			}
		}

		?>
		
		
	</div>
</body>
</html>