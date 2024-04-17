<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/education.css">
    <title>AurOracle Education</title>
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
                    <li><a href="/">Home</a></li>
                    <li><a href="/booking_hotel.php">Book Hotel</a></li>
                    <li><a href="/booking_flights.php">Book Flight</a></li>

                    <?php
                    session_start();
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
                    <span style="color: #75C846;">Must Vist</span> <br>
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
    


	<section class="learn_1" id="geo">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="heading">
                    Beirut
					</h2>
					<p class="para-line" >
                    The vibrant capital city of Lebanon, known for its eclectic mix of modernity and history. Explore the lively streets, visit historical landmarks like the Mohammad Al-Amin Mosque, and indulge in the diverse culinary scene.
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/beirut.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>

    <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/byblod.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Byblos
                        </h2>
                        <p class="para-line" >
                        One of the oldest continuously inhabited cities in the world, Byblos is rich in history and charm. Explore its ancient ruins, stroll through the picturesque harbor, and visit the Crusader Castle overlooking the Mediterranean Sea.
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
                    Jeita Grotto
					</h2>
					<p class="para-line" >
                    A breathtaking natural wonder located just north of Beirut. Explore the mesmerizing limestone caves filled with stalactites and stalagmites, and take a boat ride through the underground river.
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/grooto.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>
    
            <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/Temple-of-Bacchus-Baalbeck-Lebanon.jpg.webp"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Baalbek
                        </h2>
                        <p class="para-line" >
                        Home to some of the most impressive Roman ruins in the world, including the monumental Temple of Jupiter and the Temple of Bacchus. Marvel at the grandeur of these ancient structures in the picturesque Bekaa Valley.
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
                    Sidon (Saida)
					</h2>
					<p class="para-line" >
                    A coastal city with a rich history dating back thousands of years. Explore its ancient souks, visit the Crusader Sea Castle, and relax on the sandy beaches along the Mediterranean coast.
	
					</p>
				</div>
				<div class="col">
					<img src="../static/img/saida.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>
    

    <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/hl-site-tyre-1.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Tyre (Sour)
                        </h2>
                        <p class="para-line" >
                        Another ancient Phoenician city, Tyre is famous for its well-preserved Roman ruins, including the impressive Roman Hippodrome and the Al Mina archaeological site.
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
                    Qadisha Valley
					</h2>
					<p class="para-line" >
                    Known as the Holy Valley, this UNESCO World Heritage site is home to stunning natural beauty, ancient monasteries carved into the cliffs, and hiking trails offering breathtaking views of the rugged landscape.
					</p>
				</div>
				<div class="col">
					<img src="../static/img/qadisha-kadisha-valley.jpg" alt=" What is a Geomagnetic Storm?" class="learn_1img">
				</div>

			</div>
		</div>
	</section>
    
            <section class="learn_2" style="background-color: #FAF8FF"> 
        <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img src="../static/img/deir.jpg"  class="learn_2img">
                    </div>
                    <div class="col">
                        <h2 class="heading">
                        Deir el Qamar
                        </h2>
                        <p class="para-line" >
                        A charming village nestled in the mountains of Mount Lebanon, known for its traditional Lebanese architecture, historic churches, and cobblestone streets lined with picturesque houses.
                        </p>
                    </div>

    
                </div>
            </div>
            <br>
        </section>



		
        <script src="../static/mobile-navbar.js" ></script>

</body>
</html>



