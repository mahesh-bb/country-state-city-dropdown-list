<?php 
	include 'dbconnection.php';
	$state_id = $_POST['state_id'];
	$res = '';
	$sql = "SELECT * FROM `cities` WHERE `state_id` = $state_id";
	//echo $sql; die;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$res .= "<option hidden selected>Select city</option>";
		while($row = $result->fetch_assoc()){
			$res .= "<option value=".$row['city_id'].">".$row['city']."</option>";
		}
	}
	echo json_encode($res);
?>