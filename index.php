<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/estilo.css" />
	<link rel="stylesheet" href="css/todo/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/todo/default/default.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	<style>
		body {
			
			font-family: Source, Tahoma, sans-serif;
			color: #fff;
			font-size: 14px;
			text-shadow: 1px 1px 0px #000;
		}
	</style>
	<title>Automotora BIOS</title>
</head>

<body id="home">
	<div id="wrapper">

		<!--__--__--__--__--__--  L O G O  &   N A V    B A R --__--___--__--__--__-->
		<header>
			<div id="logo">
				<h1>Automotora <span id="iisrt"><span id="ii">IIIIIIIII</span> <span id="srt">JYB</span></span></h1>
				<div id="tagline">
					<h2>Trabajo final Bios 2022!</h2>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="index.php" id="homenav">Home</a></li>

					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
		</header>

		<!--__--__--__--__--  T H E    S L I D E R --__--__--__--___--__--__--__-->
		<div class="slider-wrapper theme-default">
			<div id="slider" class="nivoSlider">
				<img src="images/slide5.jpg" alt="" />
				<img src="images/slide6.jpg" alt="" />
				<img src="images/slide3.jpg" alt="" />
				<img src="images/slide4.jpg" alt="" />
				<img src="images/slide7.jpg" alt="" />
			</div>
		</div>
		<script type="text/javascript">
			$(window).load(function() {
				$('#slider').nivoSlider({
					pauseTime: 6000,
				});
			});
		</script>

		<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
		<section>
			<div id="line">
				<div class="dline"></div>
				<h1> Services</h1>
				<div class="dline"></div>
			</div>
			<div id="ourserv">
				<article>
					<h1></h1>
					<img src="images/1a.jpg" alt="" />
					<p>Nissa Versa  U$S 24.000</p>
					<a href="" class="rm">Ver Mas</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/2b.jpg" alt="" />
					<p>Duster Oroch U$S 39.500 </p>
					<a href="" class="rm">Ver Mas</a>
				</article>
				<article class="lastarticle">
					<h1></h1>
					<img src="images/3c.jpg" alt="" />
					<p>Duster Oroch U$S 19.500</p>
					<a href="" class="rm">Ver Mas</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/11.png" alt="" />
					<p>Citroen Ds3 Sport THP U$S 17.990</p>
					<a href="" class="rm">Ver Mas</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/12.png" alt="" />
					<p>Suzuki Celerio 1.0 Extra Full U$S 14.990</p>
					<a href="" class="rm">Ver Mas</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/13.png" alt="" />
					<p>Ford Ecosport 1.6 Extra Full U$S 16.990</p>
					<a href="" class="rm">Ver Mas</a>
				</article>
			</div>

		<!--__--__--__--__--
			<div id="sline">
				<div class="sdline"></div>
				<h1>Services</h1>
				<div class="sdline"></div>
			</div>
			<div id="latestp">
				<article>
					<h1></h1>
					<img src="images/1s.jpg" alt="" />
					<p></p>
					<a href="" class="rm">Read More</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/2s.jpg" alt="" />
					<p></p>
					<a href="" class="rm">Read More</a>
				</article>
				<article>
					<h1></h1>
					<img src="images/3s.jpg" alt="" />
					<p></p>
					<a href="" class="rm">Read More</a>
				</article>
				<article class="lastarticle">
					<h1></h1>
					<img src="images/4s.jpg" alt="" />
					<p></p>
					<a href="" class="rm">Read More</a>
				</article>
			</div>
		</section>
		--__--__--__--___--__--__-->
		<!--__--__--__--__--  T H E    F O O T E R --__--__--__--___--__--__--__-->
		<footer>
			<p>Copyright &copy 2022 , Design From Jose Y Bruno. All Rights Reserved.</p>
		</footer>
	</div>
</body>

</html>