<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="css/js-image-slider.js" type="text/javascript"></script>
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>
    
    <div id="content" style="height:330px">
 		<div id="sliderFrame">
        <div id="slider">
            <a href="http://www.menucool.com/jquery-slider" target="_blank">
                <img src="images/image-slider-1.jpg" alt="Welcome to CUET" />
            </a>
            <img src="images/image-slider-2.jpg" alt="CUET Auditorium" />
            <img src="images/image-slider-3.jpg" alt="CUET lake" />
            <img src="images/image-slider-4.jpg" alt="Bongobondhu Hall" />
            <img src="images/image-slider-5.jpg" />
        </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
        </div>
    </div>
    </div>
    
    <div id="footer">
    	<?php include ('include/footer.php'); ?>
    </div>
</div>
</body>
</html>