<!-- <?php 
ob_start();
error_reporting (E_ALL ^ E_NOTICE); 
session_start(); 
$userID = $_SESSION['userID'];  
$username = $_SESSION['username']; 
$databaseTitle = $_SESSION['title']; 
$databaseUserType = $_SESSION['userType']; 
$datebasePatientFlag = $_SESSION['patientFlag']; 
?> -->
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>
      Together, We Can Save Lives - Join the Organ Donation Movement
    </title>
    <link rel="icon" type="image/png" href="images/logo_2.png" />

	<!-- Material theme for login button -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

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
	<!-- Nav Bar -->
	      </div>
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
		<!-- <section title="login_box"> -->
		<div class = "priority" align="center">
			<h2 class="title"><font face="Montserrat-Bold" size = 13px><b>Login</b></font></h2>
			<!-- <p>&nbsp;</p> -->
			<div class="container">
				<div class="box"> 
				<span class="material-symbols-outlined">login</span><br>
					<?php
					if($username && $userID) //if the user is already logged in 
					{
						echo "You're already logged in as <b>$username</b>"; 
					}
					
					else
					{
						$form  = "<form action = './login.php' method = 'post'>
								<table>
									<tr>
										<td>Username:</td>
										<td><input type = 'text' name = 'user' /></td>
									</tr>
									<tr>
										<td>Password:</td>
										<td><input type = 'password' name = 'password' /></td>
									</tr>
									<br>
									<tr>
									<td><input type = 'submit' class='fancybutton' name='loginbutton' value='Login' /></td>
									<br>
								</tr>
							<table>
						</form>"; 
						
						if(isset($_POST['loginbutton']))
						{
							$user = $_POST['user'];
							$password = $_POST['password']; 
						
							if($user) //if user typed in field
							{
								//check if password field was entered
								if($password)
								{
									require("connect.php"); 
									
									//added encryption for extra secruity 
									// $password = md5(md5 ("hfd9skla".$password."kALjdha53")); 
									
									$query = mysqli_query($connection, "SELECT userName, passwrd, pateintFlag, userID 
														FROM useraccount
														WHERE userName = '$user'
														AND passwrd = '$password'
														AND active = 1"); 
									$numberOfRows = mysqli_num_rows($query); 
									
									//checking if anything was returned from the query
									if($numberOfRows === 1)
									{ 
										//fetches data from query 
										$row = mysqli_fetch_assoc($query);
										$databaseUserName = $row['userName']; 
										$databasePass = $row['passwrd']; 
										$datebasePatientFlag = $row['pateintFlag']; 
										$databaseUserID = $row['userID'];
										
										if($datebasePatientFlag === "0") 
										{
											$query2 = mysqli_query($connection, "SELECT accountinfo.userType, accountinfo.title FROM accountinfo, useraccount WHERE useraccount.passwrd = '$databasePass' AND '$databaseUserName' = useraccount.userName AND useraccount.userID = accountinfo.userID");
											
												$numberOfRows2 = mysqli_num_rows($query2);
												if($numberOfRows2 == 1)
												{
													$row2 = mysqli_fetch_assoc($query2);
													$databaseTitle = $row2['title']; 
													$databaseUserType = $row2['userType']; 
													//set session information
													$_SESSION['username'] = $databaseUserName; 
													$_SESSION['userID'] = $databaseUserID;
													$_SESSION['title'] = $databaseTitle; 
													$_SESSION['userType'] = $databaseUserType; 
													$_SESSION['patientFlag'] = $datebasePatientFlag;   
													$connection->close(); 
													echo "Welcome to Ansh-Dann <b>{$databaseUserName}</b>";
													header("refresh:1; url = index.php"); 
												}
												else
												{
													echo "Error retrieving information"; 
													$connection->close(); 
													header("refresh:2; url = login.php");
												}
										}
										else if($datebasePatientFlag === "1")
										{
											$_SESSION['title'] = 0; 
											$_SESSION['userType'] = 0; 
											$_SESSION['username'] = $databaseUserName; 
											$_SESSION['userID'] = $databaseUserID;
											$_SESSION['patientFlag'] = $datebasePatientFlag; 
											$connection->close(); 
											echo "Welcome to Ansh-Dann Organ Donation <b>{$username}</b>!";
											header("refresh:1; url = index.php"); 
										}

										else
										{ 
											echo "Error with password entry. Please try again."; 
											$connection->close(); 
											header("refresh:2;url=login.php");
										}
											
									}
									else
									{
										echo "Username / password combination is invalid."; 
										$connection->close(); 
										header("refresh:2 ; url=login.php");
									}
								} 
							}
							else 
								echo "You must enter the username."; 
						}
						else 
							echo $form;
					}				
					// mysqli_close($connection); // Closing Connection
					?>
				<br>
				<!-- <p>&nbsp;</p> -->
				<a href="forgotuser.php">Forgot Username? </a>
				<br>
				<a href="forgotpass.php">Forgot Password? </a>
				</div> 
			</div> 
		<!-- </section> -->
	</div>
	<footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>
</body>
</html>