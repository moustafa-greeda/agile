<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="all.min.css">
    <!-- <link rel="stylesheet" href="contact1.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>contact</title>
    <style>
        * {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: "pt serif", times new roman, Times, serif;
    perspective: 1000px;
}

:root {
    --main-color: rgba(0, 103, 181, 1);
    --main-transition: 0.33s all ease-out;
    --main-padding: 60px 0;
    --main-margin: 60px 0;
}

.container {
    margin: 0 auto;
    padding: 0 15px;
    width: 100%;
}

nav {
    background-color: #0c2462;
}

nav .container {
    display: flex;
    align-items: center;
}

nav h2 {
    flex: 1;
    color: white;
    font-size: 35px;
}

nav ul {
    display: flex;
    justify-content: space-between;
    list-style: none;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 20px;
    padding: 20px;
    border-radius: 10px;
    transition: var(--main-transition);
}

nav ul li a:hover {
    background-color: var(--main-color);
}
/*****************************end navbar *************************************/
header {
    min-height: 90vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-size: 100% 100%;
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("imags/0_YQ5yRSG2nNPAysvl.png");
}

header .container .content {
    text-align: center;
    color: white;
}

header .container .content h1 {
    margin: 0;
}

header .container .content button {
    outline: none;
    border: 1px solid;
    background-color: #e85231;
    color: white;
    border-radius: 5px;
    padding: 15px 50px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    transition: var(--main-transition);
}

header .container .content button:hover {
    background-color: transparent;
    color: white;
}

.contact {
    padding: var(--main-padding);
}

.contact .container {
    display: flex;
    flex-direction: column;
    color: #253858;
}

.contact .container .content {
    margin-bottom: 30px;
    display: flex;
    justify-content: center;
    gap: 50px;
    flex-wrap: wrap;
}

.contact .container .address {
    width: calc(50% - 25px);
}

.contact h1 {
    margin-top: 0;
    font-size: 45px;
}

.contact .container .address p {
    line-height: 1.6;
}

.contact .container .met {
    width: calc(50% - 25px);
}

.contact .container .met img {
    width: 100%;
}

.contact .form {
    display: flex;
    flex-wrap: wrap;
    gap: 50px;
    align-items: center;
}

.contact .container form {
    width: calc(50% - 25px);
}

.contact .container .image {
    width: calc(50% - 25px);
}

.contact .container .image img {
    width: 100%;
}

.contact .container form h1 {
    font-size: 45px;
}

.contact .container form input {
    width: calc((100% - 50px) / 2);
    padding: 10px 0;
    border: none;
    border-bottom: 1px solid #9f9f9f;
    margin-bottom: 20px;
    outline: none;
    caret-color: #9f9f9f;
}

.contact .container form input:first-of-type {
    margin-right: 40px;
}

.contact .container form textarea {
    width: 100%;
    outline: none;
    border: 1px solid #9f9f9f;
    margin-top: 25px;
}

.contact .container form textarea input {
    border-bottom: 1px solid #9f9f9f;
}

.contact .container form button:first-of-type {
    margin-top: 20px;
    width: 64%;
    padding: 15px;
    border: none;
    outline: none;
    background-color: var(--main-color);
    cursor: pointer;
    color: white;
    font-size: 20px;
    transition: var(--main-transition);
}

.contact .container form button:first-of-type:hover {
    background-color: transparent;
    color: black;
    border: 1px solid #9f9f9f;
}

.contact .container form button:last-of-type {
    width: 30%;
    border: 1px solid #9f9f9f;
    outline: none;
    padding: 15px;
    background-color: transparent;
    cursor: pointer;
    font-size: 20px;
    margin-left: 4%;
    transition: var(--main-transition);
}

.contact .container form button:last-of-type:hover {
    background-color: var(--main-color);
    color: white;
    border: none;
}

.contact .container .form .image img {
    margin-top: 75px;
}

.team {
    padding: var(--main-padding);
    color: #253858;
}

.team .container {
    text-align: center;
}

.team .container h1 {
    color: #253858;
    padding: 60px;
    font-size: 45px;
    margin: 0;
}

.team .container .cards {
    display: flex;
    flex-wrap: wrap;
    gap: 100px;
}

.team .container .cards .card {
    width: 300px;
    height: 350px;
    text-align: center;
    position: relative;
    transition: all 1s ease-in-out;
    transform-style: preserve-3d;
}

.team .container .cards .card:hover {
    transform: rotatey(180deg);
}

.team .container .cards .card .front,
.team .container .cards .card .back {
    position: absolute;
    top: 0;
    left: 0;
    padding: 15px 20px;
    width: 100%;
    height: 100%;
    border: 1px solid #27D7A7;
    border-radius: 10px;
    backface-visibility: hidden;
}

.team .container .cards .card .front {
    z-index: 2;
}

.team .container .cards .card .front img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #27D7A7;
}

.team .container .cards .card .front h2 {
    margin: 7px;
}

.team .container .cards .card .front h3 {
    border: 1px solid #27D7A7;
    padding: 20px;
}

.team .container .cards .card .back {
    transform: rotateY(180deg);
    z-index: 1;
}

.team .container .cards .card .back .contact {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.team .container .cards .card .back span {
    display: flex;
    align-items: center;
    height: 20px;
    margin-bottom: 25px;
}

.team .container .cards .card .back span i {
    margin-right: 10px;
    color: #e85231;
    margin-left: 0;
    padding-left: 0;
}

.team .container .cards .card .back span a {
    color: black;
    text-decoration: none;
    transition: var(--main-transition);
    color: #253858;
}

.team .container .cards .card .back .contact .media {
    display: flex;
}

.team .container .cards .card .back .contact .media a {
    background-color: #27D7A7;
    color: white;
    height: 40px;
    width: 40px;
    text-align: center;
    border: 2px solid transparent;
    line-height: 38px;
    margin: 0 5px;
    border-radius: 50%;
}

.team .container .card .back .contact span a:hover {
    color: #e85231;
}

/*************************** start footer **************************************/
footer {
    position: relative;
    padding: 10px 5px;
    text-align: center;
    background-color: #0c2462;
    color: #fff;
}
/************************start media query *****************************/
@media (max-width: 767px) {
    .container {
        width: 100%;
        padding: 0 15px;
    }
}

@media (min-width: 768px) {
    .container {
        width: 750px;
    }
}

@media (max-width: 991px) {
    .contact .container .address {
        width: 100%;
    }
    .contact .container .met {
        width: 100%;
    }
    .contact .container form {
        width: 100%;
    }
    .contact .container .image {
        width: 100%;
    }
    .contact .container h1 {
        text-align: center;
        margin-top: 25px;
    }
    .team .container .cards {
        justify-content: center;
    }
}

@media (min-width: 992px) {
    .container {
        width: 970px;
    }
}

@media (min-width: 1200px) {
    .container {
        width: 1170px;
    }
}
    </style>
</head>
<body>
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
    <header class="header">
        <div class="container">
            <div class="content">
                <h1>The Agile Coach</h1>
                <h2>Contact us</h2>
                <a href="#contact"><button>Show more</button></a>
            </div>
        </div>
    </header>
    <section class="contact" id="contact">
    <div class="container">
      <div class="content">
           <div class="address">
            <h1>How to Find Us</h1>
            <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit our Institute(Met Academy).</p>
                <p>Dakahlia , mansourah 35111 Egypt , Governorate</p>
            </div>
            <div class="met">
                <img src="imags/met.jpg" alt="">
            </div>
      </div>
            <hr style="text-align: center; color:#0c2462; width:40%;">
            <div class="form">
                <form action="">
                <h1>Get in Touch</h1>
                <input type="text" name="Name" id="" placeholder="Name" required>
                <input type="email" name="Email" id="" placeholder="Email" required>
                <textarea name="Message" id="" cols="30" rows="10" placeholder="Message" required></textarea>
                <button type="submit">Send</button>
                <button>Reset</button>
            </form>
            <div class="image">
            <img src="imags/agile-1.jpg" alt="not found">
            </div>
            </div>
        </div>
    </section>
    <section class="team">
        <div class="container">
            <h1>Contact Our Team</h1>
            <div class="cards">
                <div class="card">
                    <div class="front">
                        <img src="imags/me3.jpg" alt="">
                        <h2>Eng/mahmoud elbialy</h2>
                        <p>front end devolober and my skills are Html5 , css3 , js</p>
                        <h3>Hover to contact</h3>
                    </div>
                    <div class="back">
                        <div class="contact">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            <h5>01119549505</h5>
                        </span>
                        <span>
                            <i class="far fa-envelope"></i>
                            <a href="https://www.facebook.com/profile.php?id=100009612817061" target="_blank"><h5>send a message</h5></a>
                        </span>
                        <div class="media">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="imags/Mo.jpeg" alt="">
                        <h2>Eng/Mostafa Greeda</h2>
                        <p>front end devolober and my skills are Html5 , css3 , js</p>
                        <h3>Hover to contact</h3>
                    </div>
                    <div class="back">
                        <div class="contact">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            <h5>01091852870</h5>
                        </span>
                        <span>
                            <i class="far fa-envelope"></i>
                            <a href="https://www.facebook.com/moustafa.greeda" target="_blank"><h5>send a message</h5></a>
                        </span>
                        <div class="media">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="imags/A.jpeg" alt="">
                        <h2>Eng/Amira El-sayed</h2>
                        <p>front end devolober and my skills are Html5 , css3 , js</p>
                        <h3>Hover to contact</h3>
                    </div>
                    <div class="back">
                        <div class="contact">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            <h5>01288136870</h5>
                        </span>
                        <span>
                            <i class="far fa-envelope"></i>
                            <a href="https://www.facebook.com/groups/261921945154016/user/100013224938957/" target="_blank"><h5>send a message</h5></a>
                        </span>
                        <div class="media">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="imags/M.jpeg" alt="">
                        <h2>Eng/Merehan Magdy</h2>
                        <p>backend devolober and my slills are php , mysql , laravel</p>
                        <h3>Hover to contact</h3>
                    </div>
                    <div class="back">
                        <div class="contact">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            <h5>01211646480</h5>
                        </span>
                        <span>
                            <i class="far fa-envelope"></i>
                            <a href="https://www.facebook.com/groups/261921945154016/user/100012512716668/" target="_blank"><h5>send a message</h5></a>
                        </span>
                        <div class="media">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="front">
                        <img src="imags/H.jpeg" alt="">
                        <h2>Eng/Hend kamal</h2>
                        <p>backend devolober and my slills are php , mysql , laravel</p>
                        <h3>Hover to contact</h3>
                    </div>
                    <div class="back">
                        <div class="contact">
                        <span>
                            <i class="fas fa-phone-alt"></i>
                            <h5>01021856497</h5>
                        </span>
                        <span>
                            <i class="far fa-envelope"></i>
                            <a href="https://www.facebook.com/groups/261921945154016/user/100044167026492/" target="_blank"><h5>send a message</h5></a>
                        </span>
                        <div class="media">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ********************************* start footer ************************************** -->
<footer>
  <h3>all copy right &copy; reserved</h3>
</footer>
</body>
</html>