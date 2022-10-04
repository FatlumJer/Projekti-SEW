<?php
include_once("konfigurimi.php");

$result = mysqli_query($conn,
"SELECT * FROM evidenca ORDER BY id DESC");
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Evidenca - UKZ Evidenca</title>
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
        <section id="one" class="wrapper style2" style="color: black;">
            <div class="content">
					
					


                    <div class="table-wrapper" style="color: black;">
                    <form action="" method="post">  
                    
                    <table>
                    <tr>
                        <h3>Lista e evidences</h3>
                    </tr>
                    <tr>
                    <td>
                        Kerko:
                    </td>
                    <td>
                        <input type="text" name="term" placeholder="Student" value="%"/>
                    </td>
                    <td> 
                        <input type="submit" value="Kërko" class="primary special" />
						
					</td>
                    </tr>
                </table> 
                </div>
                </div>
                </form> 
				<form action="export_data.php">
                    <div class="table-wrapper" style="color: black;">
                <table width='80%' border=0>
                    <div class="table-wrapper">
                    <tr>
						<td>ID Studentit</td>
						<td>Emri</td>
						<td>Mbiemri</td>
						<td>Numri RFID</td>
                        <td>Koha e Hyrjes</td>
                        <td>Koha e Daljes</td>
                    </tr> 
                <?php
                if (!empty($_REQUEST['term'])) {
                $term = mysqli_real_escape_string
                ($conn,$_REQUEST['term']);     
                $sql = mysqli_query($conn,
                "SELECT ev.id_kartes, ev.koha_hyrje, ev.koha_dalje, st.emri, st.mbiemri, st.id_studentit FROM evidenca as ev left join studentet as st ON st.id_kartes=ev.id_kartes 
                WHERE ev.id_kartes LIKE '%".$term."%' OR st.id_studentit LIKE '%".$term."%' OR st.mbiemri LIKE '%".$term."%'  OR st.emri LIKE '%".$term."%' "); 
                while($row = mysqli_fetch_array($sql)) { 		
                        echo "<tr>";
						echo "<td>".$row['id_studentit']."</td>";
						echo "<td>".$row['emri']."</td>";
						echo "<td>".$row['mbiemri']."</td>";
						echo "<td>".$row['id_kartes']."</td>";
                        echo "<td>".$row['koha_hyrje']."</td>";
                        echo "<td>".$row['koha_dalje']."</td>";		
                    }
                }
                ?>
				
                </div>
                    </table>
					<input type="submit" name="export" value="RUAJ NE EXCEL" class="primary special"/>
</form>
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