<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grid.css">
	<title>Document</title>
</head>
<body>
	<?php 
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		else
			$name = "";

		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		else
			$email = "";

		if (isset($_POST['gender'])) {
			$gender=$_POST['gender'];
		}

		if (isset($_POST['age'])) {
			$age = $_POST['age'];
		}

		if (isset($_POST['comments'])) {
			$comments = trim($_POST['comments']);
		}
		else
			$comments = "";
	 ?>

	<form action="" method="POST">
		<fieldset>
			<legend>Enter your information in the form below</legend>
			<div class="grid-container">
				<div class="grid-item"><label for="name">Name: </label></div>
				<div class="grid-item"><input name="name" type="text" value="<?php echo($name) ?>"></div>
				
				<div class="grid-item"><label for="email">Email Address: </label></div>
				<div class="grid-item"><input name="email" type="text" value="<?php echo($email) ?>"></div>
				
				<div class="grid-item"><label for="gender">Gender: </label></div>
				<div class="grid-item"><input name="gender" type="radio" value="M"
					<?php if($gender=='M') echo "checked=\"checked\"";?>
					/> Male
					<input name="gender" type="radio" value="F"
					<?php if($gender=='F') echo "checked=\"checked\"";?>
					/> Female
				</div>
				
				<div class="grid-item"><label for="age">Age: </label></div>
				<div class="grid-item">
					<select name="age" id="">
						<option value="18-30"
						<?php if($age == "18-30") echo "selected=\"selected\""; ?>
						>Between 18 and 30</option>
						<option value="30-60"
						<?php if($age == "30-60") echo "selected=\"selected\""; ?>
						>Between 30 and 60</option>
					</select>
				</div>
				
				<div class="grid-item"><label for="comments">Comments: </label></div>
				<div class="grid-item">
					<textarea name="comments" id=""><?php echo($comments) ?></textarea>
				</div>
			</div>
		</fieldset>

		<input name="btn" type="submit" value="Submit My Information">
	</form>

	<?php 
	if (isset($_POST['btn'])) {
		echo "Welcome to this page<br>";
		echo "Your innformation:<br>";
		echo "Name: ".$name."<br>";
		echo "Email: ".$email."<br>";
		echo "Gender: ".$gender=="M"?"Male":"Female"."<br>";
		echo "Age: ".$age."<br>";
		echo "Comments: ".$comments."<br>";
	}
	 ?>
</body>
</html>