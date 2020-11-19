<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/grid.css">
</head>
<body>
	<?php
		function getError($error){
			return "<font class=\"error\">".$error."</font>";
		}

		if (isset($_POST['cancel'])) {
			header("Location: Bai_7.php", TRUE, 301);
			exit();
		}

		$gender = $_POST['gender'];

		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		else
			$name = '';

		if (isset($_POST['address'])) {
			$address = $_POST['address'];
		}
		else
			$address = '';

		if (isset($_POST['phone'])) {
			$phone = $_POST['phone'];
		}
		else
			$phone = '';

		if (isset($_POST['nationality'])) {
			$nationality = $_POST['nationality'];
		}
		else
			$nationality = '';

		if (isset($_POST['subject'])) {
			$subject = implode(', ', $_POST['subject']);
			$subject = substr($subject, 0, strlen($subject));
		}
		else
			$subject = '';

		if (isset($_POST['description'])) {
			$description = $_POST['description'];
		}
		else
			$description = '';
	 ?>

	 <div class="form">
	 	<div class="">
	 		<p><b>Your informations: </b></p><br>
			Name: <?php echo !empty($name)?$name:getError("Empty!"); ?><br>
			Gender: <?php echo strcmp("m", $gender)==0?"Male":"Female"; ?><br>
			Address: <?php echo !empty($address)?$address:getError("Empty!"); ?><br>
			Contact: <?php echo !empty($phone)?$phone:getError("Empty!"); ?><br>
			Nationality: <?php echo !empty($nationality)?$nationality:getError("Empty!"); ?><br>
			Subjects: <?php echo !empty($subject)?$subject:getError("Empty!"); ?><br>
			Description: <?php echo !empty($description)?$description:getError("Empty!"); ?>	
			<hr>
			<a href="javascript:window.history.back(-1);">Previous page</a>
	 	</div>
	 </div>

</body>
</html>