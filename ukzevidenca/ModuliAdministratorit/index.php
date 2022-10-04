<?php
include_once("konfigurimi.php");

$result = mysqli_query($conn,
"SELECT * FROM studentet ORDER BY id DESC");
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Studentet - UKZ Evidenca</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.php">UKZ<span> Evidenca</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Studentet</a></li>
					<li><a href="evidenca.php">Evidenca</a></li>
				</ul>
			</nav>

		<!-- Banner -->
        <section class="banner full">
				<article>
					<img src="images/back1.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Menaxhimi i Evidences se Studenteve</p>
							<h2>UKZ</h2>
						</header>
					</div>
				</article>
                <article>
					<img src="images/back1.jpg"  alt="" />
					<div class="inner">
						<header>
							<h2>Projekti SEW</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/ukz1.jpg" alt="" />
					<div class="inner">
						
					</div>
				</article>
				<article>
					<img src="images/ukz2.jpg"  alt="" />
					<div class="inner">
					
					</div>
				</article>
			</section>

		<!-- One -->
		<section id="one" class="wrapper style" style="color: black;">
        <h2>Shto Student:</h2>
										<form method="post" action="shtoStudent.php">
											<div class="row gtr-uniform">
											    <div class="col-6 col-12-xsmall">
                                                    <input type="text" name="emri" id="emri" value="" placeholder="Emri" /><br>
                                                </div>
                                                <div class="col-6 col-12-xsmall">  
                                                    <input type="text" name="mbiemri" id="mbiemri" value="" placeholder="Mbiemri" /><br>
                                                </div>
                                                <div class="col-6 col-12-xsmall">
                                                    <input type="text" name="id_studentit" id="id_studentit" value="" placeholder="ID e Studentit" />
												</div>
                                                <div class="col-6 col-12-xsmall">
                                                    <input type="text" name="id_kartes" id="id_kartes" value="" placeholder="Numri RFID" />
												</div><br><br><br><br>
                                                <blockquote>Numri RFID Karteles gjendet ne anen e poshtme te RFID Karteles suaj</blockquote><br><br><br><br>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" value="Shto Student" class="primary special" name="shtoStudent" /></li>
													</ul>
												</div>
                                                <br>
											</div>
										</form>
        </section>
        <section id="one" class="wrapper style2" style="color: black;">
            <div class="content">
					
					


                    <div class="table-wrapper" style="color: black;">
                    <form action="" method="post">  
                    
                    <table>
                    <tr>
                        <h3>Kërko Student</h3>
                    </tr>
                    <tr>
                    <td>
                        Kerko:
                    </td>
                    <td>
                        <input type="text" name="term" placeholder="Student"/>
                    </td>
                    <td> 
                        <input type="submit" value="Kërko" class="primary special" />
                    </td>
                    </tr>
                </table> 
                </div>
                </div>
                </form> 
                    <div class="table-wrapper" style="color: black;">
                <table width='80%' border=0>
                    <div class="table-wrapper">
                    <tr>
                        <td>Emri</td>
                        <td>Mbiemri</td>
                        <td>ID e Studentit</td>
                        <td>Numri RFID</td>
                        <td>Modifiko</td>
                        <td>Fshij</td>
                    </tr> 
                <?php
                if (!empty($_REQUEST['term'])) {
                $term = mysqli_real_escape_string
                ($conn,$_REQUEST['term']);     
                $sql = mysqli_query($conn,
                "SELECT * FROM studentet 
                WHERE emri LIKE '%".$term."%' 
                OR  mbiemri LIKE '%".$term."%'
                OR  id_studentit LIKE '%".$term."%'"); 
                while($row = mysqli_fetch_array($sql)) { 		
                        echo "<tr>";
                        echo "<td>".$row['emri']."</td>";
                        echo "<td>".$row['mbiemri']."</td>";
                        echo "<td>".$row['id_studentit']."</td>";
                        echo "<td>".$row['id_kartes']."</td>";	
                        echo "<td><a href=\"modifikoStudent.php?id=$row[id]\" class='button special' class='button primary'>
                        Modifiko</a></td><td><a href=\"fshijStudent.php?id=$row[id]\" class='button special' class='button primary'>
                        Fshij</a></td></tr>";		
                    }
                }
                ?>
                </div>
                    </table>
                                        </div>
                                </div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://www.facebook.com/universitetikadrizekauniversity" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.uni-gjilan.net/" class="icon fa-chrome"><span class="label">Website</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; UKZ. All rights reserved.<br>
                    Powered by : Fatlum Jerliu, Drinor Ilazi, Rinor Sherifi
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