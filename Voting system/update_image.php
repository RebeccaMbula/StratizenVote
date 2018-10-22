<html>
<head></head>
<?php
// database connetion
$con=mysqli_connect("localhost","root","","school");
$id=$_GET['id'];
$select=mysqli_query($con,"select * from student_profile where id='$id'");
$row=mysqli_fetch_assoc($select);
$old_image=$row['profile'];
?>
</body>
<form action="" method="POST" enctype="multipart/form-data">
<table align="center" style="margin-top:50px">
<tr>
<th>Name</th>
<td>
<input type="text" name="name" value="<?=$row['name']; ?>"></td></tr>
<tr>
<th>Image</th>
<td>

<img src="profile_images/<?php echo $row['profile']; ?>" style="width:80px;height:60px"></br>
<input type="file" name="profile"/>
<br><br>
<input type="submit" value="update" name="update"</td></tr>

</table>
</form>
<?php
if(isset($_POST['update'])){
	
	$name=$_POST['name'];
	if(isset($_FILES['profile']['name']) && ($_FILES['profile']['name']!="")){
		
	$size=$_FILES['profile']['size'];
	$temp=$_FILES['profile']['tmp_name'];
	$type=$_FILES['profile']['type'];
	$profile_name=$_FILES['profile']['name'];
	// 1st Delete Old file from folder
	unlink("images/$old_image");
	//new image upload to folder
	move_uploaded_file($temp,"profile_images/$profile_name");
	}
	else{
		$profile_name=$old_image;
	}
	$update=mysqli_query($con,"update student_profile set name='$name',profile='$profile_name' where id='$id'");
	
	if($update){
		echo "<script>alert('data update successfuly!')</script>";
		echo "<script>window.open('display_images.php','_self')</script>";
	}
	else{
		echo "<script>alert('updation failed!')</script>";
		
		echo "<script>window.open('display_images.php','_self')</script>";
	}
	
	
}
?>
</body>
</html>











