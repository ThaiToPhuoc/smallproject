<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh dien tich HCN</title>
    <link rel="stylesheet" href="../../css/grid.css">
</head>
<body>

<?php 
	if(isset($_POST['chieudai']))  
	    $chieudai=trim($_POST['chieudai']); 
	else $chieudai=0;

	if(isset($_POST['chieurong'])) 
	    $chieurong=trim($_POST['chieurong']); 
	else $chieurong=0;

	if(isset($_POST['tinh']))
        if (is_numeric($chieudai) && is_numeric($chieurong))  
	       $dientich=$chieudai * $chieurong;
        else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $dientich="";
            }
	else 
        $dientich=0;
?>


<form action="" method="POST">
    <div class="grid-container">
        <div class="grid-item item1-3 text-center"><h3>Diện tích hình chữ nhật</h3></div>

        <div class="grid-item">
            Chiều dài:
        </div>
        <div class="grid-item">
            <input type="number" name="chieudai" value="<?php echo($chieudai) ?>">
        </div>

        <div class="grid-item">
            Chiều rộng:
        </div>
        <div class="grid-item">
            <input type="number" name="chieurong" value="<?php echo($chieurong) ?>">
        </div>

        <div class="grid-item">
            Diện tích:
        </div>
        <div class="grid-item">
            <input type="number" name="dientich" value="<?php echo($dientich) ?>" disabled>
        </div>

        <div class="grid-item"></div>
        <div class="grid-item">
            <input type="submit" name="tinh">
        </div>
    </div>
</form>
</body>
</html>