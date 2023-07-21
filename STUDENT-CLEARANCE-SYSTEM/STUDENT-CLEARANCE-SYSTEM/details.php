<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "clearance";

$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}

?>

<?php 
	$sql = "select * from demo where id = 1";
	$rs = mysqli_query($conn, $sql);
	//get row
	$fetchRow = mysqli_fetch_assoc($rs);
?> 
lo


<!DOCTYPE html>
<html>
<head>	
<title> Retrieve data from database and display in php form</title>

<style>
	body{
		font-family:verdana;
	}
	.container{width:500px;margin: 0 auto;}
	h3{line-height:20px;font-size:20px;}
	input{display:block;width:350px;height:20px;margin:10px 0;}
	textarea{display:block;width:350px;margin:10px 0;}
	button{background:green; border:1px solid green;width:70px;height:30px;color:#ffffff}
</style>


</head>	
<body>

	
	
	<div class="container">
	<h3>Edit Post</h3>
	<form action="" method="post">
	<input type="text" name="title" value="<?php echo $fetchRow['post_title']?>" required>
	<textarea cols="40" placeholder="Post Content" rows="8" name="post_content" required><?php echo $fetchRow['post_content']?></textarea>
	<button type="submit" name="submit">Submit</button>
	</form>
	</div> 


</body>
</html>