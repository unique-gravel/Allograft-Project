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
      <section class="colored-section" id="title">
      <div class="landing-image">
        <img
          src="images/person-holding-anatomic-heart-model-educational-purpose.jpg"
          width="1600px"
          height="730px"
        />
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

      <!-- Title -->
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="big-heading">
              Every year millions of people die due to lack of organ donation.
            </h1>
            <h1 class="big-heading">Pleadge organs and save upto 8 lives</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->

    <section id="features">
      <div class="info-row">
        <img
          class="liver-img"
          src="images/istockphoto-688121868-612x612.jpg"
          alt="liver"
        />
        <h3 class="feature-title">Organ Donation</h3>
        <p>
          Organ donation is the process of surgically removing an organ or
          tissue from one person (the organ donor) and placing it into another
          person (the recipient). Transplantation is necessary because the
          recipient’s organ has failed or has been damaged by disease or
          injury..
        </p>
      </div>

      <div class="info-row">
        <img
          class="card-img"
          src="images/istockphoto-1290711052-170667a.jpg"
          alt="card"
        />
        <h3 class="feature-title">Pledge With Us</h3>
        <p>
          Pledge with us and help save lives.Pledging your organs is a simple
          procedure. Just fill out the online pledge form and we will send you a
          donor card with your unique government registration number. All
          pledges are registered with the National Organ & Tissue Transplant
          Organisation (NOTTO).
        </p>
      </div>

      <div class="info-row">
        <img
          class="whole-img"
          src="images/nhia-moua-F4cJtI7HCMw-unsplash.jpg"
          alt="whole body"
        />
        <h3 class="feature-title">Body Donation</h3>
        <p>
          Voluntary body donation is a programme wherein the general population
          can will their bodies to serve the purpose of medical education and
          scientific research.Whole body donation can only be made to hospitals
          that have been authorised by the state government to accept such
          donations.
        </p>
      </div>

      <div class="info-row">
        <img
          class="info-img"
          src="images/sox-advisory-top.png"
          alt="information"
        />
        <h3 class="feature-title">Get Information</h3>
        <p>
          Find the latest data on donation and transplantation and information
          on agencies.
        </p>
      </div>
    </section>

    <!-- Testimonials -->

    <section class="colored-section" id="testimonials">
      <div id="testimonial-carousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner">
          <div class="carousel-item active container-fluid">
            <h2 class="testimonial-text">
              I hope that when I die I can make a difference by donating my
              body."
            </h2>
            <img
              class="testimonial-image"
              src="images/PC.jpg"
              alt="lady-profile"
            />
            <em></em>
          </div>
          <div class="carousel-item container-fluid">
            <h2 class="testimonial-text">
              Megastar Amitabh Bachchan is one of the many stars who pledged to
              donate their eyes
            </h2>
            <img
              class="testimonial-image"
              src="images/AB3.jpg"
              alt="lady-profile"
            />
          </div>
          <div class="carousel-item container-fluid">
            <h2 class="testimonial-text">
              "It's simple to donate bone marrow. You don't have to spend money
              for it. I think everybody should go and donate bone marrow,
            </h2>
            <img
              class="testimonial-image"
              src="images/SM.jpg"
              alt="lady-profile"
            />
          </div>
          <div class="carousel-item container-fluid">
            <h2 class="testimonial-text">
              "A real hero is someone who helps everyone else recycle their
              organs. I have pledged my own organs and you can too and visit
              www. amargandhifoundation.in to register”
            </h2>
            <img
              class="testimonial-image"
              src="images/RK.jpg"
              alt="lady-profile"
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#testimonial-carousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a
          class="carousel-control-next"
          href="#testimonial-carousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon"></span>
        </a>
        <a
          class="carousel-control-prev"
          href="#testimonial-carousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a
          class="carousel-control-prev"
          href="#testimonial-carousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon"></span>
        </a>
      </div>
    </section>

    <footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>
  </body>
</html>
