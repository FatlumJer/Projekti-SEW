<?php

include_once("konfigurimi.php");

if(isset($_POST['shtoStudent'])) {	
	$emri = $_POST['emri'];
	$mbiemri = ($_POST['mbiemri']);
	$id_studentit = $_POST['id_studentit'];
    $id_kartes = $_POST['id_kartes'];
		

	if(empty($emri) || empty($mbiemri) || empty($id_studentit) || empty($id_kartes)) {			
		if(empty($emri)) {echo "<font color='red'>Emri eshte i zbrazet!</font><br/>";}
		if(empty($mbiemri)) {echo "<font color='red'>Mbiemri eshte i zbrazet!</font><br/>";}
		if(empty($id_studentit)) {echo "<font color='red'>ID e Studentit eshte e zbrazet!</font><br/>";}
        if(empty($id_kartes)) {echo "<font color='red'>Numri RFID eshte i zbrazet!</font><br/>";}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$result = mysqli_query($conn, "INSERT INTO studentet(emri,mbiemri,id_studentit,id_kartes) VALUES('$emri','$mbiemri','$id_studentit','$id_kartes')");
	
	echo "<script>
         setTimeout(function(){
            window.location.href = 'index.php';
         }, 3000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 3 sekonda. <b></p>";
	}
}
?>