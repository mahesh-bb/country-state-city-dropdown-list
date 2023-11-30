<?php include 'dbconnection.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post">
		<?php 
			$sql =  "SELECT * FROM `countries`"; 
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {

		?>
		<select name="country" id="country">
			<option hidden selected>Select country</option>
		<?php while($row = $result->fetch_assoc()) { 
			?>
			<option value="<?php echo $row["country_id"]; ?>"><?php echo $row["country"]; ?></option>
		<?php }?>
		</select>
	<?php } ?>

		<select name="state" id="state" style="display: none;"></select>

		<select name="city" id="city" style="display: none;"></select>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function() {
			$("#country").change(function(){
				var country_id = $(this).val();
				$.ajax({
					url: 'stateajax.php',
					type: 'post',
					data: {country_id:country_id},
					dataType:'json',
					success: function(response){
						$('#state').show();
						$('#state').html(response);
					}
				});
			});

			$("#state").change(function(){
				var state_id = $(this).val();
				
				$.ajax({
					url: 'cityajax.php',
					type: 'post',
					data: {state_id:state_id},
					dataType:'json',
					success: function(response){
						$('#city').show();
						$('#city').html(response);
					}
				});
			});
		});
	</script>
</body>
</html>