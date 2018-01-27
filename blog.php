<?php
include 'include/connect.php';
function add_post($title,$contents,$category,$uid,$uname)
{
	 $title=mysql_real_escape_string($title);
	  $contents=mysql_real_escape_string($contents);
	   $category=(int)$category;
	   mysql_query("INSERT into posts set cat_id='$category',userid='$uid',username='$uname', title='$title', contents='$contents', date_posted=NOW()");
	   
	}
	function edit_post($id, $title,$contents,$category)
	{
		$id=(int)$id;
		$title=mysql_real_escape_string($title);
	  $contents=mysql_real_escape_string($contents);
	   $category=(int)$category;
	   mysql_query("UPDATE posts set cat_id='$category', title='$title', contents='$contents' WHERE id='$id'");
	   
		}
		function add_category($name)
		{
			 $name=mysql_real_escape_string($name);
			 mysql_query("INSERT into category set name='$name'");
			}
			function delete($id)
			{
				//$id=(int) $id;
				//$name=mysql_real_escape_string($name);
				
				mysql_query("delete from category where id='$id'");
				
				}
				function deletep($id)
			{
				//$id=(int) $id;
				//$name=mysql_real_escape_string($name);
				
				mysql_query("delete from posts where id='$id'");
				
				}
				function get_posts($id=null, $cat_id=null)
				{
					$posts= array();
					$query="SELECT posts.id AS post_id, category.id AS category_id, title, contents, date_posted, category.name
FROM posts
INNER JOIN category ON category.id = posts.cat_id ";
if(isset($id))
{
	$id=(int) $id;
	
	$query .= "WHERE posts.id='$id'";
}

if(isset($cat_id))
{
	$cat_id=(int) $cat_id;
	
	$query .= "WHERE cat_id='$cat_id'";
}
$query .="ORDER BY posts.id DESC";  

$query= mysql_query($query);
while($row=mysql_fetch_assoc($query))
{
	$posts[]=$row;
}
return $posts;
					
}

				
function get_postss($id=null, $cat_id=null)
				{
					include 'include/autho.php';
					$uid=$_SESSION['S_id'];
					$posts= array();
					$query="SELECT posts.id AS post_id, category.id AS category_id, title, contents, date_posted, category.name
FROM posts
INNER JOIN category ON category.id = posts.cat_id ";
if(isset($id))
{
	$id=(int) $id;
	
	$query .= "WHERE posts.id='$id'";
}

if(isset($cat_id))
{
	$cat_id=(int) $cat_id;
	
	$query .= "WHERE cat_id='$cat_id'";
}
if(isset($uid))
{
$query .= "WHERE userid='$uid'";
}
else
echo 'you have no posts';
$query .="ORDER BY posts.id DESC";  

$query= mysql_query($query);
while($row=mysql_fetch_assoc($query))
{
	$posts[]=$row;
}
return $posts;
					
}

					function get_categories($id=null)
					{
						$categories=array();
						 $query=mysql_query("select id,name from category");
						 while($row=mysql_fetch_assoc($query))
						 {
							 $categories[]=$row;
							 }
							 return $categories;
						 }
						 function category_exists($field)
						 {
							 $field=mysql_real_escape_string($field);
							 // $value=mysql_real_escape_string($value);
							 $query=mysql_query("SELECT COUNT(1) FROM category where name= '$field'");
							 return(mysql_result($query, 0)=="0")?false:true;
							 }