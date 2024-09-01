<?php
include('config.php');

// Fetch doctor records
$sqlDoctors = "SELECT id, name, specialty, photo_url FROM doctors";
$resultDoctors = $conn->query($sqlDoctors);

// Fetch news records
$sqlNews = "SELECT id, photo_url, news FROM news";
$resultNews = $conn->query($sqlNews);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Workshop Matana University"/>
    <meta name="description" content="Web Developer Matana University">

    <link rel="stylesheet" href="style.css">
	<!-- END Offline -->

	<!-- Online -->
    <!-- Css -->
    <link rel="icon" type="image/x-icon" href="https://bit.ly/matana-logo-vertical">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap"
        rel="stylesheet"
    />
	<!-- END Online-->
    <title>Matana Workshop</title>
</head>
<body>
    <header>
        <nav class="navbar">
			<div class="logo">
				<a href="index.html">
					<img src="https://bit.ly/matana-logo-horizontal" class="navLogo" alt="">
				</a>
			</div>
			<div class="navLinks">
				<a href="index.html" style="margin-right: 25px;">Home</a>
			</div>
		</nav>
        <section class="headContent">
            <div class="headLeft headCenter">
                <div class="headTitle">
                    <h6 class="hc-small">World Class Hospital</h6>
                    <h1 class="hc-hero">
                        Matana Hospital<br />Top Indonesian<br /> Facilities
                    </h1>
                    <p>
                        Gain convinience for your health facilities and improve your health with our super services
                    </p>
                </div>
            </div>
            <div class="headRight">
                <img
                    src="/assets/img/header/header.png"
                    class="headImg"
                    alt=""
                />
            </div>
        </section>
    </header>

    <main>
		<section>
			<div class="cardWrapper">
			<?php
            if ($resultNews->num_rows > 0) {
                while($row = $resultNews->fetch_assoc()) {
                    echo "<div class='cardBody'>";
					echo "<div class='cardImg'>";
                    echo "<img src='" . $row['photo_url'] . "' alt='' class='imgNews'/>";
					echo "</div>";
					echo "<div class='cardText'>";
                    echo "<p>" . substr($row['news'], 0, 100) . "</p>";
					echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div>No news found</div>";
            }
            ?>
				<!-- <div class="cardBody">
					<div class="cardImg">
						<img src="/assets/img/news/news-1.png" alt="">
					</div>
					<div class="cardText">
						<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque vel sed laborum esse aperiam soluta laboriosam tempora deserunt eveniet, hic corrupti quod, et, eius maxime id illo quas excepturi quasi.</p>
					</div>
				</div>
				<div class="cardBody">
					<div class="cardImg">
						<img src="/assets/img/news/news-2.png" alt="">
					</div>
					<div class="cardText">
						<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque vel sed laborum esse aperiam soluta laboriosam tempora deserunt eveniet, hic corrupti quod, et, eius maxime id illo quas excepturi quasi.</p>
					</div>
				</div> -->
			</div>
		</section>
        <section class="ourDoctors">
            <h1 class="doctorTitle">Top Doctors</h1>
			<ul class="listDoctor">
				<!-- read doctor data -->
				<?php
                	if ($resultDoctors->num_rows > 0) {
                    	while($row = $resultDoctors->fetch_assoc()) {
                        	echo "<li class='cardPhoto'>";
                        	echo "<img src='" . $row['photo_url'] . "' alt='' class='rounded-circle imgDoctor'/>";
                        	echo "<h6 class='doctorName'>" . $row['name'] . "</h6>";
                        	echo "<p class='miniText'>" . $row['specialty'] . "</p>";
                        	echo "</li>";
                    	}
                	} else {
                    	echo "";
                	}
                	$conn->close();
                ?>
				<!-- <li class="cardPhoto">
					<img
						src="https://bit.ly/matana-workshop-programmer-1"
						alt=""
						class="rounded-circle imgDoctor"
					/>
					<h6 class="doctorName">Jose Ryu</h6>
					<p class="miniText">
						Dentist
					</p>
				</li>
				<li class="cardPhoto">
					<img
						src="https://bit.ly/matana-workshop-programmer-2"
						alt=""
						class="rounded-circle imgDoctor"
					/>
					<h6 class="doctorName">Sabrina Yose</h6>
					<p class="miniText">
						Pediatric
					</p>
				</li>
				<li class="cardPhoto">
					<img
						src="https://bit.ly/matana-workshop-programmer-2"
						alt=""
						class="rounded-circle imgDoctor"
					/>
					<h6 class="doctorName">Veronica Yose</h6>
					<p class="miniText">
						Neurologist 
					</p>
				</li>
				<li class="cardPhoto">
					<img
						src="https://bit.ly/matana-workshop-programmer-3"
						alt=""
						class="rounded-circle imgDoctor"
					/>
					<h6 class="doctorName">Nico Abel Laia</h6>
					<p class="miniText">
						Internist
					</p>
				</li> -->
			</ul>
        </section>
		<section class="slider-carousel">
			<div class="carousel">
				<div class="carousel-item">
				  <img src="/assets/img/carousel/carousel-1.png" alt="">
				</div>
				<div class="carousel-item">
					<img src="/assets/img/carousel/carousel-2.png" alt="">
				</div>
				<div class="carousel-item">
					<img src="/assets/img/carousel/carousel-3.png" alt="">
				</div>
			  </div>
		  </section>
    </main>

    <footer class="footer">
        <h6 class="thinText">Made with ❤ by Matanian</h6>
    </footer>

	<script>
		window.onload = function(){
		var slides = document.getElementsByClassName('carousel-item'),
			addActive = function(slide) {slide.classList.add('active')},
			removeActive = function(slide) {slide.classList.remove('active')};
		addActive(slides[0]);
		
		setInterval(function (){
			for (var i = 0; i < slides.length; i++){
			if (i + 1 == slides.length) {
				addActive(slides[0]);
				slides[0].style.zIndex = 100;
				setTimeout(removeActive, 350, slides[i]); //Doesn't be worked in IE-9
				break;
			}
			if (slides[i].classList.contains('active')) { 
				slides[i].removeAttribute('style');
				setTimeout(removeActive, 350, slides[i]); //Doesn't be worked in IE-9
				addActive(slides[i + 1]);
				break;
			}
			} 
		}, 4000);
		}
		
	</script>
</body>
</html>