

<?php 
include 'blog.php';

$post=get_posts($_GET['id']);
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
	edit_post($_GET['id'],$title,$contents, $_POST['category']);
	
	header ("location: endex.php?id={$post[0]['post_id']}");
	die();
}
}
 ?>

<?php include 'include/autho.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Post</title>
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
        
        <p id="title">Edit Post</p>
                    <hr align="left" width="100%">
                    

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
<input type="text" name="title" value="<?php echo $post[0]['title']; ?> ">
</div>
<div>
  <p>Contents</p>
  <p> 
    <textarea name="contents"rows="15" cols="50"><?php echo $post[0]['contents']; ?></textarea>
  </p>
</div>
<div>
<label for="category">Category</label>
<select name="category">
<?php
foreach(get_categories() as $category)
{
	$selected=($category['name']==$post[0]['name'])? 'selected' : "";
?>
<option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['name']; ?></option>
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