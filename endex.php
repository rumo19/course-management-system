<?php
include 'include/autho.php';
include 'blog.php';
$posts= (isset($_GET['id'])) ? get_posts($_GET['id']) : get_posts();
//$posts=get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));
//$posts=get_posts();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Discussion Forum</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css">
</head>
<body background="images/bodytile.gif" bgcolor="#000000"> 

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
    	<div id="logd" style="width:600px;">
        
        <p id="title">Discussion Forum</p>
                    <hr align="left" width="100%">
                    

</head>

<body>
<a href="add_post.php" title="Add Post">Add post</a>
<a href="mypost.php" title="index">My Post</a> 
<?php
$t=$_SESSION['S_typ'];
if($t=='t')
{
echo '<a href="add_category.php" title="Add category">Add category</a>';
}
?>

 <a href="catlist.php" title="category list">Category list</a>


<?php
foreach ($posts as $post)
{
	if(category_exists('name', $post['name']))
	{
		$post['name']='Uncategorised';
	}
	?>
    <h2> <a href="endex.php?id= <?php echo $post['post_id']; ?>"><?php echo 'Title: '. $post['title']; ?> </a></h2>
    
    <div> <h3><?php echo 'Question: '. nl2br($post['contents']); ?> </h3> </div>
    <p>Posted on <?php echo date ('d-m-y h:i:s', strtotime($post['date_posted'])); ?> in <a href="category.php? id= <?php echo $post ['category_id']; ?>"> <?php echo $post['name']; ?> </a></p>
    
    
     <a href="comment.php?id= <?php echo $post['post_id']; ?>"> see the post detail</a>
    
    
    <?php
}
?>
</body> 
</html>