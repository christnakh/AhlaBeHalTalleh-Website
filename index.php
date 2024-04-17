<?php
// Start session
session_start();

// Include the database connection file
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AhlaBhalTalleh</title>

	
	<link rel="stylesheet" href="../static/style.css">

	
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<link rel="icon" type="image/x-icon" href="/static/img/Aur.png">
</head>
<body>
	

	<section>

		<section class="hero">
		 <header>
            <nav>
                <a class="logo" href="/">AhlaBhalTalleh</a>
                <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
                </div>
                    <ul class="nav-list">
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#exchange">Exchange</a></li>
                    <li><a href="/culturel.php">Must Vist</a></li>
                    <li><a href="/exchange.php">Exchange</a></li>
                    <li><a href="/booking_hotel.php">Book Hotel</a></li>
                    <li><a href="/booking_flights.php">Book Flight</a></li>

                    <?php
                    // Check if session variable exists and is set
                    if(isset($_SESSION['UserID'])) {
                        // User is logged in
                        echo '<li><a href="/booked.php">Booked</a></li>';
                        echo '<li><a href="/profile.php">Profile</a></li>';
                        echo '<li><a href="/logout.php">Logout</a></li>';
                    } else {
                        // User is not logged in
                        echo '<li><a href="/login.php">Login</a></li>';
                    }
                    ?>

                </ul>
            </nav>
        </header>
			<div class="container">
				<div class="hero-content">
					<h2 class="heading white">
                    AhlaBhalTalleh
					</h2>
					<div class="back_op">
						<p class="para-line white">
                        We are a leading travel booking platform dedicated to providing seamless travel experiences for our customers. With our user-friendly interface and wide range of options, you can easily book flights, hotels, and more, all in one place.
						</p>
					</div>
					<button class="btn btn-white">
						<a href="/">
							Book Now! &nbsp; <ion-icon name="caret-forward-outline"></ion-icon>
					</button>
					</a>
				</div>
			</div>
		</section>
	</section>
	

    <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/avx.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        About Us
                        </h2>
                        <p class="para-line" >
                        At AhlaBhalTalleh, we're passionate about simplifying your travel experience. From booking flights to finding the perfect hotel, we're here to make your journey seamless. With competitive prices and dedicated support, we're committed to helping you explore the world with confidence. Trust us to handle the details, so you can focus on creating unforgettable memories. Start your next adventure with AhlaBhalTalleh today!	
                        </p>
                    </div>

    
                </div>
            </div>
            <br>
        </section>


	<section class="learn_1" id="geo">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="heading">
                    History
					</h2>
					<p class="para-line" >
                    Lebanon has a rich history that dates back thousands of years. It has been inhabited by various civilizations, including the Phoenicians, Romans, and Ottomans, each leaving their mark on the country's culture and heritage. Lebanon has also been influenced by its geographical location, serving as a crossroads between the East and the West
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/Bacchus_temple_in_Baalbek.webp" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>

    <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/421Image.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Cuisine
                        </h2>
                        <p class="para-line" >
                        Lebanese cuisine is renowned for its flavorful dishes and fresh ingredients. It is characterized by the use of olive oil, garlic, herbs, and spices such as cinnamon, nutmeg, and cumin. Some popular Lebanese dishes include tabbouleh, hummus, falafel, and kebabs.
                        </p>
                    </div>

    
                </div>
            </div>
            <br>
        </section>



	<section class="learn_1" id="geo">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="heading">
                    Arts and Music
					</h2>
					<p class="para-line" >
                    Lebanon has a vibrant arts and music scene, with a rich tradition of poetry, literature, and music. The country is known for its traditional music styles such as dabke, a lively folk dance, and its contributions to classical Arabic music. Lebanese artists have also made significant contributions to the world of visual arts.
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/Bassam_Saba.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>
    
            <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/baalbeck-festival-for-shopping-tourism-lebanon-traveler.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Traditions and Festivals
                        </h2>
                        <p class="para-line" >
                        Lebanon celebrates various traditions and festivals throughout the year, reflecting its cultural diversity and heritage. Some of the most prominent festivals include the Baalbeck International Festival, the Tyre Festival, and the Byblos International Festival. These festivals feature music, dance, theater, and other cultural performances.
                        </p>
                    </div>

    
                </div>
            </div>
            <br>
        </section>


	<section class="learn_1" id="geo">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="heading">
                    Landmarks
					</h2>
					<p class="para-line" >
                    Lebanon is home to many iconic landmarks that showcase its rich history and culture. Some of the most famous landmarks include the ancient city of Baalbeck, the Roman ruins at Tyre, the Crusader castle of Byblos, and the stunning natural beauty of the Cedars of God forest.
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/istockphoto-513441442-612x612.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>
    
    <br> <br>
    <p id="exchange"></p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Lira Exchange</h1>
                        <p class="card-text">89,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Gold Price per Gram</h1>
                        <p class="card-text">100</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="../static/mobile-navbar.js" ></script>

</body>
</html>



    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
