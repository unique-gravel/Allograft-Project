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
    <link rel="stylesheet" href="css/register.css" />

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

	  
<p>&nbsp;</p>
	<div class = "priority" align = "center">
	<h2 class="title"><font face= "Montserrat-Bold" color="antiquewhite" size = 13px>Doctor and Staff Registration</font></h2> 
	<font color="maroon"><b>Forms with * are required</b></font></p>
		<form action = "staff_register.php" method = "post">
			<fieldset>
				<legend color="antiquewhite"><b>Step 1: Work Information</b></legend>
				*Are you a doctor or staff member? <br>
				<input type="radio" name="staff" value="1" checked> Doctor &nbsp;
				<input type="radio" name="staff" value="2"> Manager <br><br>
				
				
				If you are a doctor, what area are you concentrated in? If you mark staff manager on the question above, this field will be disregarded.<br>
				<input type="radio" name="organ" value="heart" checked> Cardiologist<br>
				<input type="radio" name="organ" value="lung"> Pulmonologist<br>
				<input type="radio" name="organ" value="liver"> Gastroenterologist<br>
				<input type="radio" name="organ" value="kidney"> Nephrologist<br><br>
				<p>&nbsp;</p>

				<legend color="antiquewhite"><b>Step 2: Account Information</b></legend>
				*Email Address: <input type="text" name="email"> <br> <br>
				*First Name: <input type="text" name="firstname"> <br> <br>
				*Last Name: <input type="text" name="lastname"> <br> <br>
				*Date of Birth: 
				<select name="month">
				<legend><b>Month</b></legend>
                    <option value="Month">Select Month</option>
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				<select name="day">
				<legend><b>Day</b></legend>
                    <option value="Day">Select Day</option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select name="year">
				<legend><b>Year</b></legend>
                <option value="Year">Select Year</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1988">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
				<option value="1946">1946</option>
				<option value="1945">1945</option>
				<option value="1944">1944</option>
				<option value="1943">1943</option>
				<option value="1942">1942</option>
				<option value="1941">1941</option>
				<option value="1940">1940</option>
				<option value="1939">1939</option>
				<option value="1938">1938</option>
				<option value="1937">1937</option>
				<option value="1936">1936</option>
				</select> <br> <br> 
				*Phone Number: <input type="number" name="phone" pattern=".{10,}" maxlength="10"> <br><br>
				*Aadhaar Number: <input type="number" maxlength="13" name="driversLicense"> <br> <br> 
				*Address 1: <input type="text" name="address1"> <br> <br> 
				Address 2: <input type="text" name="address2"> <br> <br> 
				Address 3: <input type="text" name="address3"> <br> <br>	
				*State: 
				<select name="state">
					<option value="1">Andra Pradesh</option>
					<option value="2">Arunanchal Pradesh</option>
					<option value="3">Assam</option>
					<option value="4">Bihar</option>
					<option value="5">Chhattisgarh</option>
					<option value="6">Goa</option>
					<option value="7">Gujarat</option>
					<option value="8">Haryana</option>
					<option value="9">Himachal Pradesh</option>
					<option value="10">Jammu and Kashmir</option>
					<option value="11">Jharkhand</option>
					<option value="12">Karnataka</option>
					<option value="13">Kerala</option>
					<option value="14">Madya Pradesh</option>
					<option value="15">Maharashtra</option>
					<option value="16">Manipur</option>
					<option value="17">Meghalaya</option>
					<option value="18">Mizoram</option>
					<option value="19">Nagaland</option>
					<option value="20">Odisha</option>
					<option value="21">Punjab</option>
					<option value="22">Rajasthan</option>
					<option value="23">Sikkim</option>
					<option value="24">Tamil Nadu</option>
					<option value="25">Telangana</option>
					<option value="26">Tripura</option>
					<option value="27">Uttar Pradesh</option>
					<option value="28">Uttarakhand</option>
					<option value="29">West Bengal</option>
				</select>
				<br><br>
				City: <input type="text" name="city"> <br> <br>
				Zip Code: <input type="text" name="zip"> <br> <br>
				</fieldset>
                <p>&nbsp;</p>
				<legend color="antiquewhite"><b>Step 3: Account Information</b></legend>
				<fieldset>
					Username: <input type="text" pattern=".{7,}" maxlength="15" name="username"> <br><br>
					Password: <input type="password" pattern=".{7,}" maxlength="15" name="pass"> <br><br>
					*Verify Password: <input type="password" name="verifypassword" maxlength="15"> <br><br> 
				</fieldset>
				<input type="submit" name = "submitbutton" value = "Submit">
		</form> 
		<p>&nbsp;</p>
		<?php
			if(isset($_POST['submitbutton']))
			{	
				require("connect.php"); 
				$accountinfo_typeofstaff = $_POST['staff'];
				$accountinfo_typeofstaff = intval($accountinfo_typeofstaff); 
				$accountinfo_title = $_POST['organ']; 
				$accountinfo_firstname = mysqli_real_escape_string($connection, $_POST['firstname']); 
				$accountinfo_lastname = mysqli_real_escape_string($connection, $_POST['lastname']); 
				$accountinfo_phone = mysqli_real_escape_string($connection, $_POST['phone']); 
				$accountinfo_email = mysqli_real_escape_string($connection, $_POST['email']);
				$accountinfo_driverslicense = mysqli_real_escape_string($connection, $_POST['driversLicense']);
			    $accountinfo_driverslicense = intval($accountinfo_driverslicense); 
				
				if($accountinfo_firstname && $accountinfo_lastname && $accountinfo_phone && $accountinfo_driverslicense)
				{
					$accountinfo_month = $_POST['month']; 
					$accountinfo_day = $_POST['day']; 
					$accountinfo_year = $_POST['year']; 
					$accountinfo_dob = "{$accountinfo_year}-{$accountinfo_month}-{$accountinfo_day}";
					$accountinfo_address = mysqli_real_escape_string($connection, $_POST['address1']); 
					$accountinfo_address2 = mysqli_real_escape_string($connection, $_POST['address2']); 
					$accountinfo_address3 = mysqli_real_escape_string($connection, $_POST['address3']); 
					$accountinfo_state = intval($_POST['state']); 
					$accountinfo_city = mysqli_real_escape_string($connection, $_POST['city']); 
					$accountinfo_zip = mysqli_real_escape_string($connection, $_POST['zip']);
					$accountinfo_driverslicense = mysqli_real_escape_string($connection, $_POST['driversLicense']);
					$accountinfo_driverslicense = intval($accountinfo_driverslicense);
					
					if($accountinfo_address && $accountinfo_city && $accountinfo_zip && $accountinfo_state)
					{
						
						$useraccount_username = mysqli_real_escape_string($connection, $_POST['username']); 
						$useraccount_password1 = mysqli_real_escape_string($connection, $_POST['pass']);
						$useraccount_password2 = mysqli_real_escape_string($connection, $_POST['verifypassword']);
						
						if($useraccount_username && $useraccount_password1 && $useraccount_password2 && $useraccount_password1 === $useraccount_password2)
						{
							$numberOfRows = 0; 
							$query = mysqli_query($connection, "SELECT * 
												  FROM useraccount
												  WHERE userName = '$useraccount_username'"); 
							$numberOfRows = mysqli_num_rows($query);

							if($numberOfRows == 0)
							{
								//creating userID
								$randomNumber = rand(1000, 9999); 
								$randomNumber = (string)$randomNumber;
								$useraccount_userID = $useraccount_username; 
								$useraccount_userID .= $randomNumber;
								
								do {
									$randomAddressID = rand(0, 99999); 
									$querySelect1 = mysqli_query($connection, "SELECT addressID 
																		FROM address
																		WHERE addressID = '$randomAddressID'"); 
									$numberOfRows = mysqli_num_rows($querySelect1); 
									}while ($numberOfRows == 1); 
								
								if($accountinfo_typeofstaff == 1) //doctor
								{
									do{
										$randomNumber = rand(1000, 9999); 
										$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
										$lettersLength = strlen($letters);
										$randomString = '';
										for ($i = 0; $i < 5; $i++) 
										{
											$randomString .= $letters[rand(0, $lettersLength - 1)];
										}
										$accountinfo_doctorUserID = strval($randomNumber); 
										$accountinfo_doctorUserID .= $useraccount_username; 
										$accountinfo_doctorUserID .= $randomString; 
										
										$querySelect2 = mysqli_query($connection, "SELECT doctorUserID 
																		FROM accountinfo
																		WHERE doctorUserID = '$accountinfo_doctorUserID'"); 
										$numberOfRows = mysqli_num_rows($querySelect2); 
										
									} while($numberOfRows == 1); 
									
									$accountinfo_address2 = !empty($accountinfo_address2) ? "'$accountinfo_address2'" : "NULL";
									$accountinfo_address3 = !empty($accountinfo_address3) ? "'$accountinfo_address3'" : "NULL";
									$queryInsert = mysqli_query($connection, "INSERT INTO address(addressID, adress1, adress2, adress3, city, zip_code, stateID) VALUES('$randomAddressID', '$accountinfo_address', '$accountinfo_address2', '$accountinfo_address3', '$accountinfo_city', '$accountinfo_zip', '$accountinfo_state')");
									
									if($queryInsert)
									{
										$queryInsert2 = mysqli_query($connection, "INSERT INTO useraccount(userName, passwrd, pateintFlag, userID, active) VALUES ('$useraccount_username', '$useraccount_password1', 0, '$useraccount_userID', 1)");
										
										if($queryInsert2)
										{
											require("connect.php");
											if($accountinfo_title === "heart")
											{
												$queryInsert4 = mysqli_query($connection, "UPDATE TABLE patientinfo SET doctorUserID = '$accountinfo_doctorUserID' WEHRE accountinfo.heartFlag = 1");
												$queryInsert3 = mysqli_query($connection, "INSERT INTO accountinfo (addressID, userID, driversLicense, firstName, lastName, title, phoneNumber, email, userType, decisionMakerFlag, liverFlag, heartFlag, lungFlag, kidneyFlag, doctorUserID) VALUES ('$randomAddressID', '$useraccount_userID', '$accountinfo_driverslicense', '$accountinfo_firstname', '$accountinfo_lastname', '$accountinfo_title', '$accountinfo_phone', '$accountinfo_email', 1, FALSE, FALSE, TRUE, FALSE, FALSE, '$accountinfo_doctorUserID')")or die (mysqli_error($connection));
												
											}
											else if($accountinfo_title === "lung")
											{
												$queryInsert4 = mysqli_query($connection, "UPDATE TABLE patientinfo SET doctorUserID = '$accountinfo_doctorUserID' WEHRE accountinfo.lungFlag = 1");
												$queryInsert3 = mysqli_query($connection, "INSERT INTO accountinfo (addressID, userID, driversLicense, firstName, lastName, title, phoneNumber, email, userType, decisionMakerFlag, liverFlag, heartFlag, lungFlag, kidneyFlag, doctorUserID) VALUES ('$randomAddressID', '$useraccount_userID', '$accountinfo_driverslicense', '$accountinfo_firstname', '$accountinfo_lastname', '$accountinfo_title', '$accountinfo_phone', '$accountinfo_email', 1, FALSE, FALSE, FALSE, TRUE, FALSE, '$accountinfo_doctorUserID')")or die (mysqli_error($connection));
											}
											else if($accountinfo_title === "liver")
											{
												$queryInsert4 = mysqli_query($connection, "UPDATE TABLE patientinfo SET doctorUserID = '$accountinfo_doctorUserID' WEHRE accountinfo.livertFlag = 1");
												$queryInsert3 = mysqli_query($connection, "INSERT INTO accountinfo (addressID, userID, driversLicense, firstName, lastName, title, phoneNumber, email, userType, decisionMakerFlag, liverFlag, heartFlag, lungFlag, kidneyFlag, doctorUserID) VALUES ('$randomAddressID', '$useraccount_userID', '$accountinfo_driverslicense', '$accountinfo_firstname', '$accountinfo_lastname', '$accountinfo_title', '$accountinfo_phone', '$accountinfo_email', 1, FALSE, TRUE, FALSE, FALSE, FALSE, '$accountinfo_doctorUserID')")or die (mysqli_error($connection));
											}
											else
											{
												$queryInsert4 = mysqli_query($connection, "UPDATE TABLE patientinfo SET doctorUserID = '$accountinfo_doctorUserID' WEHRE accountinfo.kidneyFlag = 1");
												$queryInsert3 = mysqli_query($connection, "INSERT INTO accountinfo (addressID, userID, driversLicense, firstName, lastName, title, phoneNumber, email, userType, decisionMakerFlag, liverFlag, heartFlag, lungFlag, kidneyFlag, doctorUserID) VALUES ('$randomAddressID', '$useraccount_userID', '$accountinfo_driverslicense', '$accountinfo_firstname', '$accountinfo_lastname', '$accountinfo_title', '$accountinfo_phone', '$accountinfo_email', 1, FALSE, FALSE, FALSE, FALSE, TRUE, '$accountinfo_doctorUserID')")or die (mysqli_error($connection)); 	
											}
												if($queryInsert3)
												{
													require 'PHPMailerAutoload.php';
													$mail = new PHPMailer;

													$mail->isSMTP();                                      // Set mailer to use SMTP
													$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
													$mail->SMTPAuth = true;                               // Enable SMTP authentication
													$mail->Username = 'donationorgan417@gmail.com';                 // SMTP username
													$mail->Password = 'organ123$';                           // SMTP password
													$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
													$mail->Port = 587;                                    // TCP port to connect to

													$mail->setFrom('donationorgan417@gmail.com', "Organ Donation Support");
													$mail->addAddress($accountinfo_email, $accountinfo_firstname);   // Add a recipient
													$mail->isHTML(true);                                  // Set email format to HTML

													$mail->Subject = "Organ Donation Registration";
													$mail->Body    = "Dear {$accountinfo_firstname}, your registration is complete! You can now login at our site. Your username: {$useraccount_username} and your password is: {$useraccount_password1} Thank you for choosing Organ Donation!";

													if(!$mail->send()) 
													{
														echo 'Message could not be sent.';
														echo 'Mailer Error: ' . $mail->ErrorInfo;
													} 
													else 
													{
														echo "<b>An email has been sent with your information Thank You for signing up with Organ Donation.</b>";
														$connection->close();   				
													} 	
												}
												else
												{
													echo "Query 3 did not run"; 
													$connection->close(); 
												}
											
										}
										else
										{
											echo "Error with user account information"; 
											$connection->close(); 
										}
									}
									else
									{
										echo "Error inserting address"; 
										$connection->close(); 
									}
										
								}
								else //manager
								{
									$accountinfo_address2 = !empty($accountinfo_address2) ? "'$accountinfo_address2'" : "NULL";
									$accountinfo_address3 = !empty($accountinfo_address3) ? "'$accountinfo_address3'" : "NULL";
									$queryInsert = mysqli_query($connection, "INSERT INTO address(addressID, adress1, adress2, adress3, city, zip_code, stateID) VALUES('$randomAddressID', '$accountinfo_address', '$accountinfo_address2', '$accountinfo_address3', '$accountinfo_city', '$accountinfo_zip', '$accountinfo_state')");
									
									if($queryInsert)
									{
										require("connect.php");
										$queryInsert2 = mysqli_query($connection, "INSERT INTO useraccount(userName, passwrd, pateintFlag, userID, active) VALUES ('$useraccount_username', '$useraccount_password1', 0, '$useraccount_userID', 1)");
										
										if($queryInsert2)
										{
											$queryInsert3 = mysqli_query($connection, "INSERT INTO accountinfo (addressID, userID, driversLicense, firstName, lastName, title, phoneNumber, email, userType, decisionMakerFlag, liverFlag, heartFlag, lungFlag, kidneyFlag, doctorUserID) VALUES ('$randomAddressID', '$useraccount_userID', '$accountinfo_driverslicense', '$accountinfo_firstname', '$accountinfo_lastname', NULL, '$accountinfo_phone', '$accountinfo_email', 2, FALSE, FALSE, FALSE, FALSE, FALSE, NULL)"); 
											
											if($queryInsert3)
											{
												require 'PHPMailerAutoload.php';
												$mail = new PHPMailer;

												$mail->isSMTP();                                      // Set mailer to use SMTP
												$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
												$mail->SMTPAuth = true;                               // Enable SMTP authentication
												$mail->Username = 'donationorgan417@gmail.com';                 // SMTP username
												$mail->Password = 'organ123';                           // SMTP password
												$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
												$mail->Port = 587;                                    // TCP port to connect to

												$mail->setFrom('donationorgan417@gmail.com', "Support");
												$mail->addAddress($accountinfo_email, $accountinfo_firstname);   // Add a recipient
												$mail->isHTML(true);                                  // Set email format to HTML

												$mail->Subject = "Organ Donation Registration";
												$mail->Body    = "Dear {$accountinfo_firstname}, your registration is complete! You can now login at our site. Your username: {$useraccount_username} and your password is: {$useraccount_password1} Thank you for choosing Organ Donation!";

												if(!$mail->send()) 
												{
													echo 'Message could not be sent.';
													echo 'Mailer Error: ' . $mail->ErrorInfo;
												} 
												else 
												{
													echo "<b> An email has been sent with your information. </b>";
													$connection->close(); 
												} 	
											}
										}
										else
										{
											echo "Error with user account information"; 
											$connection->close(); 
										}
									}
									else
									{
										echo "Error inserting address"; 
										$connection->close();
									}
								}
							}
							else
							{
								echo "Username is already in use"; 
								$connection->close(); 
							}
						}
						else
							echo "Check username, password fields"; 
					}
					else
						echo "<b> Check Address field and driversLicense"; 
				}
				else
				{
					echo "<b> Check the first name, last name, and phone number fields.</b>"; 
				}
				
			}
		?>
	</div>
    <footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>
</body>
</html>
			
			