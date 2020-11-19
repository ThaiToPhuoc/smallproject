<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/grid.css">
</head>
<body>
	<?php
		/**
		 * 
		 */
		class ClassName
		{
			private $a;
			function __construct(argument)
			{
				# code...
			}

		}
	 ?>
	<form action="" method="POST">
		<div class="grid-container">
			<div class="grid-item">Nhập mảng:</div>
			<div class="grid-item">
				<input type="text" name="n" value="<?php echo($varname) ?>">
			</div>
			<div class="grid-item">Mảng:</div>
			<div class="grid-item"><textarea name="array" cols="30" rows="10"></textarea></div>

			<div class="grid-item"></div>
			<div class="grid-item">
				<input type="submit" value="COMPUTE" name="submit">
			</div>
		</div>
	</form>
</body>
</html>