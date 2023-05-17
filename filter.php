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
<?php
	$filter = $_POST['filter'];
	echo "
<table style='width:35%' align = 'left' bgcolor='aquamarine'>
	<tr>
		<td>
			<form method = 'post' action = 'filter.php'>
				<select name = 'filter' default = 'all'>
					<option value = 'all'>all</option>
					<option value = 'heart'>heart</option>
					<option value = 'kidney'>kidney</option>
					<option value = 'liver'>liver</option>
					<option value = 'lung'>lung</option>
				</select>
				<input type='submit' name='runFilter' value = 'filter'>
			</form>
		</td>
		
		<td>
			<form  method = 'post' action = 'add.php'>
				<input type = 'submit' name='add' name ='add' value = 'add'>
			</form>
		</td>
		
		<td>
			<form method = 'post' action = 'remove.php'>
				<input type = 'submit' name='remove' name ='remove' value = 'remove'>
			</form>
		</td>
		
		<td>
			<form method = 'post' action = 'accept.php'>
				<input type = 'submit' name='accept' name ='accept' value = 'accept'>
			</form>
		</td>
		
		<td>
			<form method = 'post' action = 'deny.php'>
				<input type = 'submit' name='deny' name ='deny' value = 'deny'>
			</form>
		</td>
	</tr>
</table>
<br><br><br>
<table style='width: 1050px' border = '1px solid black' align = 'left' bgcolor='white'>
	<tr>
		<th>Select</th>
		<th>Organ Type</th>
		<th>Donor ID</th>
		<th>Recipient ID</th>
		<th>Blood Type</th>
		<th>Weight</th>
		<th>Start</th>
		<th>Expiration</th>
		<th>Status</th>
	</tr>
	";
	
	//connnect to mySQL
	$mySQL = mysqli_connect('127.0.0.1', 'root', 'password', 'organdonation');
	if(!$mySQL)
	{
		echo "ERROR: Cannot connect to mySQL database.";
		exit;
	}
	
	//select the organ donor database in mySQL
	$organDonorDB = mysqli_select_db($mySQL, 'organdonation');
	if(!$organDonorDB)
	{
		echo "ERROR: Cannot connect to Organ Donor Database";
		exit;
	}
	
	if ($filter == 'all')
	{
	//display all available data for organs
	$query = "SELECT userID, recipientID, typeOfOrgan, bloodType, weight, expirationTime, availableTime, status
			  FROM organs";
	}
	else
	{
		//limited query based on $filter variable
		$query = "SELECT userID, recipientID, typeOfOrgan, bloodType, weight, expirationTime, availableTime, status
			  FROM organs WHERE typeOfOrgan = '" . $filter . "'";
	}
	
	$result = mysqli_query($mySQL, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo
				"
					<tr>
						<td align='center' style='width:100px'><input type='checkbox' name = '" . $row["typeOfOrgan"] . "-" . $row["userID"] . "'></td>
						<td align='center' style='width:100px'>" . $row["typeOfOrgan"] ."</td>
						<td align='center' style='width:100px'>" . $row["userID"] ."</td>
						<td align='center' style='width:100px'>" . $row["recipientID"] ."</td>
						<td align='center' style='width:100px'>" . $row["bloodType"] ."</td>
						<td align='center' style='width:100px'>" . $row["weight"] ."</td>
						<td align='center' style='width:150px'>" . $row["availableTime"] ."</td>
						<td align='center' style='width:150px'>" . $row["expirationTime"] ."</td>
						<td align='center' style='width:150px'>" . $row["status"] . "</td>
					</tr>
				";
		}
		echo "</table><br>";
		exit;
	}
	else
	{
		echo "</table><br><br>";
		echo "No available records.";
		exit;
	}
	
	?>
	

</body>
</html>