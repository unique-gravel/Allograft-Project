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
	<link rel = "stylesheet" type = "text/css" href = "style.css"/>
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
</div>
	<p>&nbsp;</p> 
	<div class = "priority" align = "center">
		<h2 class="title">Change Password</h2>
		<p>&nbsp;</p>
<style>
table {
    border-collapse: collapse;
    width: 50%;
	height: 90;
	border-style: none; 
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
        <?php            
            if($username && $userID ) //if the user is already logged in 
            {
                $formText = "
                Change password for user id: $userID<br>  
                <form action='changepassword.php' method='post'>
                <table>
                <tr>
                    <td>New password:</td>
                    <td><input type='text' name='newpassword' value='' maxlength='40'></td><br>
                </tr>
                <tr>
                    <td>Re-enter new password:</td>
                    <td><input type='text' name='reenteredpassword' value='' maxlength='40'></td><br>
                </tr>
                <tr>
                    <td></td><td><input type='submit' name='changepasswordbutton' value='Submit'></td>
                </tr>
                </table>
                </form>
                <p>&nbsp;</p>";

                if( $_POST['changepasswordbutton'] ) {
                    //echo "changing password for userID $userID<br>";

                    $newpassword 		= $_POST['newpassword'];
                    $reenteredpassword  = $_POST['reenteredpassword'];

					if( $newpassword != $reenteredpassword) {
						echo "Passwords don't match! <br> Please try again.";
						header("refresh:3; url = changepassword.php");

					} else {
	                    require("connect.php"); 
	                    $query = mysqli_query($connection, "SELECT * 
	                                          FROM useraccount
	                                          WHERE userID = '$userID'"); 
	                    $numberOfRows = mysqli_num_rows($query);                   
	                    $databasePassword = "";
	                    $databaseUserName = "";
	                    $databasePatientFlag = "";
	 
	                     //checking if anything was returned from the query
	                    if($numberOfRows > 0)
	                    { 
	                        //echo "got one row of information .";
	                        //fetches data from query 
	                        $row = mysqli_fetch_assoc($query);
	                        $databasePassword = $row['passwrd']; 
	                        $databaseUserName = $username;
	                        $databasePatientFlag = $row['pateintFlag'];

	                        $query = mysqli_query($connection, "UPDATE   
	                                           useraccount 
	                                          SET  passwrd = '$newpassword' WHERE userID = '$userID'"); 
	                        if( $query)
	                            echo ("Changed password for userID $userID<br>");
	                        else 
	                            echo( "Could not change password for userID $userID. error = " . mysqli_error($connection) .  "<br>");
	                    } else {
	                        echo "adding new password to database<br>";
	                    }

	                }
                } else {
                    echo $formText;
                }
            } else {
            	echo "You are not yet logged in. Please log in first.";
            }
        ?>  


	</div>
</body>
</html>