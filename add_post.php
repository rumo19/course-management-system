
<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ask Question</title>
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
        
        <p id="title">Ask Question</p>
                    <hr align="left" width="100%">
                    

</head>

<body>

<?php 
include 'blog.php';

$uid=$_SESSION['S_id'];
$uname=$_SESSION['S_name'] ;
if(isset($_POST['title'], $_POST['contents'], $_POST['category']))
{
	$errors=array();
	$title= trim($_POST['title']);
	$contents= trim($_POST['contents']);

if(empty($title))
{
	$errors[]="please enter title";
}
else if(strlen($title)>250)
{
	$errors[]="input up to 250 characters";
}
if(empty($contents))
{
	$errors[]="please enter contents";
}
if(category_exists($_POST['category'] ))
{
	
$errors[]="that category does not exists";	
}

if(empty($errors))
{
	add_post($title,$contents, $_POST['category'],$uid,$uname);
	$id=mysql_insert_id();
	header ("location: endex.php?id=$id");
	die();
}
}
 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome=1">
<title>Add Post</title>
</head>
<body>

<?php
if(isset($errors) && !empty($errors))
{
	echo '<ul><li>', implode('</li><li>',$errors),'</li></ul>';
	
	
}
?>
<form action="" method="post">
<div>
<lebel for="title">Title </label>
<input type="text" name="title" value="<?php if(isset($_POST["title"])) echo $_POST["title"]; ?>">
</div>
<div>
  <p>Contents</p>
  <p> 
    <textarea name="contents"rows="15" cols="50"><?php if(isset($_POST["contents"])) echo $_POST["contents"]; ?></textarea>
  </p>
</div>
<div>
<label for="category">Category</label>
<select name="category">
<?php
foreach(get_categories() as $category)
{
?>
<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
<?php
}
?>
</select>
</div>
<div>
<input type="submit" value="Ask Question">
</div>
</form>

</body>
</html>