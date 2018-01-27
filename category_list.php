<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category List</title>
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
        
        <p id="title">Category List</p>
                    <hr align="left" width="100%">
                    

</head>

<body>

<?php
include 'blog.php';
foreach(get_categories() as $category)
{
//echo $category['id'],'<br>';

?>

<p><a href="category.php?id=<?php echo $category ['id']; ?>"><?php echo $category['name'] ;?></a> <a href="delete_category.php?id=<?php echo $category ['id']; ?>"</a>Delete</p>


<?php
}
?>

</body>
</html>