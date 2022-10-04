<?php
	header("Content-Type: application/xlsx");    
	header("Content-Disposition: attachment; filename=evidenca.xlsx");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'konfigurimi.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>ID Studentit</th>
                    <th>Emri</th>
					<th>Mbiemri</th>
					<th>Numri RFID</th>
					<th>Koha e Hyrjes</th>
					<th>Koha e Daljes</th>
				</tr>
			<tbody>
	";
 
	$query = $conn->query("SELECT ev.id_kartes, ev.koha_hyrje, ev.koha_dalje, st.emri, st.mbiemri, st.id_studentit FROM evidenca as ev left join studentet as st ON st.id_kartes=ev.id_kartes") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
					<td>".$fetch['id_studentit']."</td>
					<td>".$fetch['emri']."</td>
					<td>".$fetch['mbiemri']."</td>
                    <td>".$fetch['id_kartes']."</td>
					<td>".$fetch['koha_hyrje']."</td>
					<td>".$fetch['koha_dalje']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>