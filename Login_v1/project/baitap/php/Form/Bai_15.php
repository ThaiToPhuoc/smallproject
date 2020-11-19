<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<form action="config.php" method="POST">
		<fieldset class="grid-container grid-1-2 wider">
			<legend>Enter your information</legend>
			<div class="grid-item">
				<h4>Name:</h4>
			</div>
			<div class="grid-item">
				<input type="text" name="name">
			</div>

			<div class="grid-item">
				<h4>Address:</h4>
			</div>
			<div class="grid-item">
				<input type="text" name="address">
			</div>

			<div class="grid-item">
				<h4>Phone number:</h4>
			</div>
			<div class="grid-item">
				<input type="number" name="phone">
			</div>

			<div class="grid-item">
				<h4>Sex:</h4>
			</div>
			<div class="grid-item">
				<input type="radio" name="gender" value="m" checked="checked"> Male
				<input type="radio" name="gender" value="f"> Female
			</div>

			<div class="grid-item">
				<h4>Nationality:</h4>
			</div>
			<div class="grid-item">
				<select name="nationality">
					<option value="Việt Nam">Việt Nam</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="America">America</option>
				</select>
			</div>

			<div class="grid-item">
				<h4>Studied subject:</h4>
			</div>
			<div class="grid-item">
				<label><input type="checkbox" name="subject[]" value="php">PHP & MySQL</label>
				<label><input type="checkbox" name="subject[]" value="c#">C#</label>
				<label><input type="checkbox" name="subject[]" value="xml">XML</label>
				<label><input type="checkbox" name="subject[]" value="python">Python</label>
			</div>

			<div class="grid-item">
				<h4>Description:</h4>
			</div>
			<div class="grid-item">
				<textarea name="description" id="" rows="5"></textarea>
			</div>

			<div class="grid-item">
			</div>
			<div class="grid-item">
				<input type="submit" name="submit" value="Send">
				<input type="submit" name="cancel" value="Cancel">
			</div>
		</fieldset>
	</form>
</body>
</html>