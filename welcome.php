<?php 

include 'config.php';

error_reporting(0);

if(!isset($_SESSION))
	session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login-in.php");
}

if(isset($_SESSION['registred']))
	echo "<script>alert('Wow! User Registration Completed.')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
    <!-- link css -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="normalize.css">
    <!-- cdn font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- cdn font owsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    ="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* .icon_bar{display: none;} */
</style>
</head>
<body>
<!-- start scroll top -->
    <p class="btn">up</p>
<!-- end scroll top -->
<!---------------------------------------- start header -------------------------------->
      <nav id="nav">
          <div class="container">
          <h2>Logo</h2>
          <i class="fas fa-bars icon_bar"></i>
          <div class="parent_links">
            <ul class="links">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="tasks_assign.php">tasks assign</a></li>
                <li><a href="project.php">project</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
          </div>
          </div>
      </nav>
<!---------------------------------------- end header -------------------------------->
      <header class="header">
          <div class="container">
              <div class="content">
                  <h1>The Agile Coach</h1>
                  <h2>our team guide to agile development</h2>
                  <a href="#about"><button>Show more</button></a>
              </div>
          </div>
      </header>
      <section class="start">
          <div class="container">
              <div class="box">
              <a href="project.php">
              <span>+</span>
              <span>start creating projects</span> 
              </a>
          </div>
          </div>
      </section>


<section class="about" id ="about">
    <h1 class="spcial-heading">Our Agile</h1>
    <p>what's meaning the agile </p>
    <div class="container">
        <div class="agilee ">
            <div class="info advantages">
                <h2>What is Agile?</h2>
                <p>Agile is an iterative approach to project management and software development that helps teams deliver value to their customers faster and with fewer headaches. Instead of betting everything on a "big bang" launch, an agile team delivers work in small, but consumable, increments. Requirements, plans, and results are evaluated continuously so teams have a natural mechanism for responding to change quickly.</p>
                <h2>Why choose agile?</h2>
                <p>Teams choose agile so they can respond to changes in the marketplace or feedback from customers quickly without derailing a year's worth of plans. "Just enough" planning and shipping in small, frequent increments lets your team gather feedback on each change and integrate it into future plans at minimal cost.
                But it's not just a numbers game—first and foremost, it's about people. As described by the Agile Manifesto, authentic human interactions are more important than rigid processes. Collaborating with customers and teammates is more important than predefined arrangements. And delivering a working solution to the customer's problem is more important than hyper-detailed documentation.
                An agile team unites under a shared vision, then brings it to life the way they know is best. Each team sets their own standards for quality, usability, and completeness. Their "definition of done" then informs how fast they'll churn the work out. Although it can be scary at first, company leaders find that when they put their trust in an agile team, that team feels a greater sense of ownership and rises to meet (or exceed) management's expectations.</p>
            </div>
            <div class="image advantages">
                <img src="imags/40832078.jpg" alt="">
                <img src="imags/agile_board.png" alt="">
            </div>
        </div>
    </div>
</section>
<!-- ********************************* start our service ************************************** -->
    <section class="our_service">
        <div class="container">
                <h1 class="spcial-heading">Our Agile Services</h1>
                <p>if you do it right ,it will last forever</p>

            <div class="parent-product">
                <div class="product">
                    <div>
                        <img src="imags/agile-digital-marketing.jpg" alt="">
                    </div>
                    <h3>Digital Marketing</h3>
                    <p>We offer Digital Marketing Services including complete Digital Transformations</p>
                </div>
                <div class="product">
                    <div>
                        <img src="imags/agile-web-google-ads-services.jpg" alt="">
                    </div>
                    <h3>web application</h3>
                    <p>Be on top, be found and boost your sales and profits.</p>
                </div>
                <div class="product">
                    <div>
                        <img src="imags/agile-web-social-media-services.jpg" alt="">
                    </div>
                    <h3>Social Media</h3>
                    <p>Maximize Awareness while getting close to your Audience.</p>
                </div>
                <div class="product">
                    <div>
                        <img src="imags/agile-ecommerce-solutions.jpg" alt="">
                    </div>
                    <h3>E-commerce Solutions</h3>
                    <p>
                        We provide consultation including strategic decisions and a unique combination of tools &
                        platforms, tailored to building a complete E-commerce solution for your business needs.
                    </p>
                </div>
                <div class="product">
                    <div>
                        <img src="imags/agile-web-seo-services.jpg" alt="">
                    </div>
                    <h3>Search Engine Optimization (SEO)</h3>
                    <p>
                       Best possible results can only be accomplished through hard work.
                       Work with us and achieve highest ranking in major Search Engines.
                    </p>
                </div>
                <div class="product">
                    <div>
                        <img src="imags/home-section-teamworking.jpg" alt="">
                    </div>
                    <h3>Team working & Collaboration</h3>
                    <p>
                        We work together to build winning Digital Marketing Strategies in an Agile manner, considering your business goals, current
                        status, brand, products and budget.
                    </p>
                </div>
            </div>
           </div>
        </section>
<!-- ********************************* start footer ************************************** -->
<section class="our_addvan">
<h1 class="spcial-heading">Advantages of Agile</h1>
        <p>if we are bulding the right product!</p>
    <div class="container">
        <div class="img-addvantages advantages">
            <img src="imags/agile-101-teams.jpg" alt="">
        </div>
        <div class="content-addvantages advantages">
            <p>1- Customer satisfaction is rapid, continuous development and delivery of useful software.</p>
            <p>2- Customer, Developer, and Product Owner interact regularly to emphasize rather than processes and tools.</p>
            <p>3- Product is developed fast and frequently delivered (weeks rather than months.)</p>
            <p>4- A face-to-face conversation is the best form of communication.</p>
            <p>5- It continuously gave attention to technical excellence and good design.</p>
            <p>6- Daily and close cooperation between business people and developers.</p>
            <p>7- Regular adaptation to changing circumstances.</p>
            <p>8- Even late changes in requirements are welcomed.</p>
        </div>
    </div>
</section>
    <footer>
    <h3>all copy right &copy; reserved</h3>
    </footer>
    <!-- link file js -->
<script src="./js/main.js"></script>
</body>
</html>
