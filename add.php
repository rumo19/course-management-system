<?php include 'include/autho.php'; ?>

<!doctype html>
<html">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Add Student</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/menu.css" rel="stylesheet" type="text/css">
    </head>
    
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
            include 'include/connect.php';
            $name=$_POST['name'];
            $roll2=$_POST['roll'];
            $roll=(int)$_POST['roll'];
			$section=$_POST['section'];
			$batch=$_POST['batch'];
            
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $pass=$_POST['pass'];
            $rpass=$_POST['rpass'];
            $err = array(0,0,0,0,0,0,0);
            $e=0;
            
            
            $sql="SELECT id FROM info WHERE id='$roll'";
            $result=mysql_query($sql);
            
            $i=mysql_num_rows($result);
    
            if ($name=='')
			{
                $err[1]=1;
                $e=1;
            }
            if (!is_int($roll) || $roll<1 || strlen($roll)!=7)
            {
                $err[2]=1;
                $e=1;
            }
                
            
            if ($i!=0)
			{
                $err[2]=1;
                $e=1;
            }
            
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email==''){
                $err[3]=1;
                $e=1;
            }
            
            $sql="SELECT email FROM info WHERE email='$email'";
            $result=mysql_query($sql);
            $i=mysql_num_rows($result);
            
            if ($i!=0){
                $err[3]=1;
                $e=1;
            }
            
            if ($phone=='')
			{
                $err[4]=1;
                $e=1;
            }
            if ($pass=='')
			{
                $err[5]=1;
                $e=1;
            }
            
            if ($rpass==''){
                $err[6]=1;
                $e=1;
            }
            
            if (strlen($pass)<5 && strlen($pass)>0){
                $err[5]=1;
                $e=1;
            }
            
            if (strcmp($pass,$rpass)!=0 && strlen($rpass)>0){
                $err[6]=1;
                $e=1;
            }
            
            if ($e=='0'){
                $sql="INSERT INTO info VALUES('$roll','$name','$batch','$section','s',CURDATE(),CURTIME(),'$email','$phone',AES_ENCRYPT('$pass', '123'));";
                $ttt=mysql_query($sql);
                move_uploaded_file($_FILES["file"]["tmp_name"],"images/pp/" . $roll.'.jpg');
				//header("location: index.php");
            }
            
        }
    ?>
    
    <body>
        <div id="main">
            <div id="head">
                <img src="images/top.jpg" alt="" height="200" width=100% style="border-radius: 15px 15px 0 0">
            </div>
            
            <div id="top_menu">
                <?php include 'include/menu.php'; ?>
            </div>
            
            <div id="content">
                <div id="log">
                <?php
				if(isset($ttt))
				{
					echo "$name is added!!";
					$name="";
					$email="";
					$roll="";
					$roll2="";
					$pass="";
					$rpass="";
					$phone="";
					
					
					
					}
				 ?>
                    <p id="title">Add Student</p>
                    <hr align="left" width="100%">
                    
                    <form method="post" action="add.php" name="add_s" enctype="multipart/form-data">
                        <table id="tbl">
                            <tr>
                                <td>Name:</td>
                                
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST')
									{
									
                                        if ($err[1]==1)
										{
                                            echo '<td><input type="text" name="name" id="txt2" /></td>';
                                        }
                                        else
										{
                                            echo '<td><input type="text" name="name" value="'.$name.'" id="txt" /></td>';
                                        }
                                    
									}
                                    else
									{
                                        echo '<td><input type="text" name="name" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                  
                            </tr>
                            
                            <tr>
                                <td>ID:</td>
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if ($err[2]==1)
										{
                                            echo '<td><input type="text" name="roll"  value="'.$roll2.'"id="txt2" /></td>';
                                        }
                                        else{
                                            echo '<td><input type="text" name="roll" value="'.$roll.'"id="txt" /></td>';
                                        }
                                    }
                                    else{
                                        echo '<td><input type="text" name="roll" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                            </tr>
                             <tr>
                                <td>Batch:</td>
                                
                                <?php
                                    
                                        echo '<td><input type="text" name="batch" value="" id="txt" /></td>';
                                    
                                        
                                ?>
                  
                            </tr>
                            
                            
                             <tr>
                                <td>Section:</td>
                                
                                <?php
                                    
                                        echo '<td><input type="text" name="section" value="" id="txt" /></td>';
                                    
                                        
                                ?>
                  
                            </tr>
                            
                            
                            <tr>
                                <td>Email:</td>
                                
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if ($err[3]==1){
                                            echo '<td><input type="text" name="email" value="'.$email.'" id="txt2" /></td>';
                                        }
                                        else{
                                            echo '<td><input type="text" name="email" value="'.$email.'" id="txt" /></td>';
                                        }
                                    }
                                    else{
                                        echo '<td><input type="text" name="email" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                            </tr>
                            
                             <tr>
                                <td>Image:</td>
                                
                                <td><input type="file" name="file" value="" id="txt" /></td>
                                        
                            </tr>
                            
                            <tr>
                                <td>Phone:</td>
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if ($err[4]==1){
                                            echo '<td><input type="text" name="phone" value="'.$phone.'" id="txt2" /></td>';
                                        }
                                        else{
                                            echo '<td><input type="text" name="phone" value="'.$phone.'" id="txt" /></td>';
                                        }
                                    }
                                    else{
                                        echo '<td><input type="text" name="phone" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                            </tr>
                            
                            <tr>
                                <td>Password:</td>
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if ($err[5]==1){
                                            echo '<td><input type="password" name="pass" value="'.$pass.'" id="txt2" /></td>';
                                        }
                                        else{
                                            echo '<td><input type="password" name="pass" value="'.$pass.'" id="txt" /></td>';
                                        }
                                    }
                                    else{
                                        echo '<td><input type="password" name="pass" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td style="font-size:14px;">Minimum 5 charecter</td>
                            </tr>
                            
                            <tr>
                                <td>Re-type:</td>
                                 <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                        if ($err[6]==1){
                                            echo '<td><input type="password" name="rpass" id="txt2" /></td>';
                                        }
                                        else{
                                            echo '<td><input type="password" name="rpass" value="'.$rpass.'" id="txt" /></td>';
                                        }
                                    }
                                    else{
                                        echo '<td><input type="password" name="rpass" value="" id="txt" /></td>';
                                    }
                                        
                                ?>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="padding-left:200px;"><a href="#" onclick="document.add_s.submit()"class="myButton">Add</a></td>
                            </tr>
                        </table>
                    </form>
                 </div>
                 
        
            </div>
            <div id="footer">
                <?php include ('include/footer.php'); ?>
            </div>
        </div>
    </body>
</html>