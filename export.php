<?php

$connect =mysqli_connect("localhost", "root", "", "haryana_survey2");
$output = '';
if(isset($_POST["export_excel"])){
	$sql = "SELECT * FROM survey ORDER BY id DESC";
	$result = mysqli_query($connect, $sql);
	if(mysqli_num_rows($result) > 0){
		$output .= '
			<table bordered="1">
				<tr>
					<th>Id</th>
					<th>Agent Name</th>
					<th>Customer Name</th>
					<th>Phone</th>
				</tr>
		';
		while($row = mysqli_fetch_array($result)){
			$output .= '
				<tr>
					<th>'.$row["id"].'</th>
					<th>'.$row["agent_name"].'</th>
					<th>'.$row["agent_name"].'</th>
					<th>'.$row["phone_no"].'</th>
				</tr>
			';
		}
		$output .= '</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		echo $output;
	}
}

?>