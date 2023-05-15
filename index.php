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
        <!-- <a class="navbar-brand" href="index.html">AnshDaan</a> -->
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
              <a class="nav-link" href="contact_us.php">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQs</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about_us.php">About Us</a>
            </li>

            <li class="nav-item">
              <?php
                if(!$userID)
                  {
                    echo "<div class='dropdown'>
                              <button>Register</button>
                              <div class='dropdown-content'>
                                <div class='dropdown-options'>
                                  <a class='nav-link' href='register.php'>Donor/Recipient</a>
                                  <a class='nav-link' href='staff_register.php'>Doctor/Staff</a>
                                </div>
                              </div>
                            </div>";
                  }
                ?>
              </li>

              <li class="nav-item">
                <?php
                if(!$username)
                {
                  echo "<a class='nav-link' href='login.php'>Login</a>"; 
                } 
                ?>
              </li>

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

<<<<<<< HEAD:index.php
    <footer>
      <p class="footer">AnshDaan - Give The Gift of Life</p>
    </footer>
=======

      <!-- Footer -->
  <footer class="bg-white footer-logos">
    <div class="container py-5 px-500">
      <div class="py-4">
        <div class=""><img src="img/logo.png" alt="" width="180" class="mb-3">
          <p class="font-italic text-muted">AnshDaan - Give the gift of life</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="www.instagram.com" target="_blank" title="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg></a></li>
            
          </ul>
        </div>
        <!-- <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">For Women</a></li>
            <li class="mb-2"><a href="#" class="text-muted">For Men</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Stores</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Wishlist</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
          <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>

    <!-- Copyrights -->

  </footer>
  <!-- End -->



>>>>>>> ebae205eab1ba4a9ee8739a1643ad2855fc906c8:index.html
  </body>
</html>
