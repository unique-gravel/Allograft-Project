<?php 
error_reporting (0); 
session_start(); 
$userID = $_SESSION['userID'];  
$username = $_SESSION['username']; 
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