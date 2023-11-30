<?php 
	include 'dbconnection.php';
	$countryid = $_POST['country_id'];
	$res = '';
	$sql = "SELECT `state_id`, `state`, `country_id` FROM `states` WHERE `country_id` = $countryid";
	//echo $sql; die;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$res .= "<option hidden selected>Select state</option>";
		while($row = $result->fetch_assoc()){
			$res .= "<option value=".$row['state_id'].">".$row['state']."</option>";
		}
	}
	echo json_encode($res);
?>