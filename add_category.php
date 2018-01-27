


<?php
include 'blog.php';
if(isset($_POST['name']))
{
	$name=trim($_POST['name']);
}
if(empty($name))
{
	$error="you must submit a category name.";
}
else if (category_exists($name))
{
	$error="the category allready exits"; 
}
elseif(strlen($name)>20)
{
	$error="the category name only be up to 20 character";
}
if (!isset($error))
{
	add_category($name);
	header ('location:add_post.php');
}
?>

<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Category</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">
	<div id="head">
		<img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
    </div>
    
    <div id="top">
    	
    </div>
    <div id="top_menu">
    	<?php include 'include/menu.php'; ?>
    </div>


<div id="content">
    	<div id="log" style="width:600px;">
        
        <p id="title">Add Category</p>
                    <hr align="left" width="100%">
                    

</head>


<body>

<?php
if(isset($error))
{
	echo "<p> $error </p>\n";
}
?>
<form action="" method="post">
<div>
<label for="name"> Name</label>
<input type="text" name="name" value="">
</div>
<div>
<input type="submit" value="Add Category">
</div>
</form>

</body>
</html>