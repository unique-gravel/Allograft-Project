<!DOCTYPE html>
<html>
<title>Organ Management</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
                  echo "<li class='nav-item'>
                          <div>
                            <button>Register</button>
                            <div class='dropdown-content'>
                              <div class='dropdown-options'>
                                <a href='register.php'>Donor/Recipient</a>
                                <a href='staff_register.php'>Doctor/Staff</a>
                              </div>
                            </div>
                          </div>
                        </li>";
                }
            ?>

            <?php
              if(!$username) {
                echo "<li  class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>"; 
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
                echo "<li class='nav-item'><a class='nav-link' href='POA_Management.php'>Power Of Attorney</a></li>";
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
	<h2 class="title"><font face= "Brush Script MT" size = 13px>Organ Management System</font></h2> 
<table style='width:35%' align = 'left' bgcolor='white'>
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
	<?php
	
	//connnect to mySQL
	$mySQL = mysqli_connect('127.0.0.1', 'root', 'password', 'organdonation');
	if(!$mySQL)
	{
		echo "ERROR: Cannot connect to mySQL database.";
		exit;
	}
	
	//select the organ donor database in mySQL
	$organDonorDB = mysqli_select_db($mySQL, "organdonation");
	if(!$organDonorDB)
	{
		echo "ERROR: Cannot connect to Organ Donor Database";
		exit;
	}
	
	//display all available data for organs
	$query = "SELECT userID, recipientID, typeOfOrgan, bloodType, weight, expirationTime, availableTime, status
			  FROM organs";
	
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
</div>
</body>
</html>