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
    <link rel="stylesheet" href="css/login.css" />

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
    <section class="colored-section" id="title">
      <!-- <div class="landing-image">
        <img
          src="images/person-holding-anatomic-heart-model-educational-purpose.jpg"
          width="100%"
          height="60%"
        />
      </div> -->

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
		<form action = "forgotpass.php" method = "post">
			<fieldset>
				<legend><b>Please enter your Username and Email Address</b></legend>
				<br>
				Username: <input type="text" name="username"> <br> <br>
				Email Address: <input type="text" name="email"> <br>
				<p>&nbsp;</p>
				<input type="submit" name = "submitbutton" value = "Submit">
			</fieldset>
		</form> 
		
		<?php
		require 'PHPMailerAutoload.php';
		if($_POST['submitbutton'])
		{
			$user = $_POST['username']; 
			$email = $_POST['email']; 
			
			if($user) //user is filled in 
			{
				if($email) // if email was filled in and has address sign
				{
					require("connect.php"); 
					
					$query = mysqli_query($connection, "SELECT userName, email, firstName, lastName, passwrd
												  FROM useraccount, patientinfo
												  WHERE useraccount.userID = patientinfo.userID AND '$user' = useraccount.userName");
												   
					$numberOfRows = mysqli_num_rows($query); //check if the result is NULL
					if($numberOfRows == 1)
					{
						$row = mysqli_fetch_assoc($query);
						$databaseUserName = $row['userName'];
						$databaseEmail = $row['email']; 
						$databasefirstName = $row['firstName']; 
						$databaselastName = $row['lastName']; 
						$databasepassword =$row['passwrd']; 
						
						$subject = "Organ Donation Password Recovery"; 
						$message = "Dear customer, your current password is: {$databasepassword}. Thank you for you using Organ Donation.";

						$mail = new PHPMailer;

						//$mail->SMTPDebug = 3;                               // Enable verbose debug output

						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'donationorgan417@gmail.com';                 // SMTP username
						// SMTP password goes here
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to

						$mail->setFrom('donationorgan417@gmail.com', "Organ Donation Support");
						$mail->addAddress($databaseEmail, $databasefirstName);     // Add a recipient
						$mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = $subject;
						$mail->Body    = $message;

						if(!$mail->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} else {
							echo '<b> An email has been sent with your information. </b>';
						} 
					}
					else
					{
						echo "Error: username or email address is not valid."; 
						$connection->close(); 
					}
				}
				else 
				{
					echo "Please enter your valid email"; 
					$connection->close();
				}
			}
			
			else 
				echo "Please enter your username"; 
		}
		?>
	</div>
	<footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>
</body>
</html>
