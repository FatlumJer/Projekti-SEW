<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifikoStudent']))
{	
	$id=$_POST['id'];
	
	$emri=$_POST['emri'];
	$mbiemri=$_POST['mbiemri'];
	$id_studentit=$_POST['id_studentit'];
    $id_kartes=$_POST['id_kartes'];	
	
	if(empty($emri) || empty($mbiemri) || empty($id_studentit) || empty($id_kartes)) {	
			
		if(empty($emri)) {
			echo "<font color='red'>Kolona Emri eshte e zbrazet.</font><br/>";
		}
		
		if(empty($mbiemri)) {
			echo "<font color='red'>Kolona Mbiemri eshte e zbrazet.</font><br/>";
		}
		
		if(empty($id_studentit)) {
			echo "<font color='red'>Kolona Id e Studentit eshte e zbrazet.</font><br/>";
		}
        if(empty($id_kartes)) {
			echo "<font color='red'>Kolona Numri RFID eshte e zbrazet.</font><br/>";
		}			
	} else {	
		$result = mysqli_query($conn,"UPDATE studentet SET emri='$emri',mbiemri='$mbiemri',id_studentit='$id_studentit',id_kartes='$id_kartes' WHERE id=$id");
		
		header("Location: index.php");
	}
}
?>
<?php
$id=$_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM studentet WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$emri=$res['emri'];
	$mbiemri=$res['mbiemri'];
	$id_studentit=$res['id_studentit'];
    $id_kartes=$res['id_kartes'];
}
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Hielo by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.html">Hielo <span>by TEMPLATED</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="generic.html">Generic</a></li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</nav>

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/slide01.jpg" alt="" />
					<div class="inner">
						<header>
							<p>A free responsive web site template by <a href="https://templated.co">TEMPLATED</a></p>
							<h2>Hielo</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Lorem ipsum dolor sit amet nullam feugiat</p>
							<h2>Magna etiam</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Sed cursus aliuam veroeros lorem ipsum nullam</p>
							<h2>Tempus dolor</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p>
							<h2>Etiam feugiat</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Ipsum dolor sed magna veroeros lorem ipsum</p>
							<h2>Lorem adipiscing</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->
		<section id="one" class="wrapper style2" style="color: black;">
            <div class="content">
				
				
                <div class="col-6 col-12-medium">



                    <form username="form1" method="post" action="modifikoStudent.php">

                        <h3>Modifiko të dhënat e përdoruesit</h3>


                            Emri
                            <input type="text" name="emri" value='<?php echo $emri;?>' />
                            <br>
                            Mbiemri
                            <input type="text" name="mbiemri" value='<?php echo $mbiemri;?>' />
                            <br>
                            ID e Studentit
                            <input type="text" name="id_studentit" value='<?php echo $id_studentit;?>' />
                            <br >
                            Numri RFID
                            <input type="text" name="id_kartes" value='<?php echo $id_kartes;?>' />
                            <br >
                            <input type="hidden" name="id" value='<?php echo $_GET['id'];?>' />
                            <input type="submit" name="modifikoStudent" value="Modifiko">


                    </form>

                </div>
            </div>
		</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>