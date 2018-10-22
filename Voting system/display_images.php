<html>
<head>
  <meta charset="utf-8">
  
  
  <title>Vote</title>
  <link rel="stylesheet" type="text/css" href="vote.css">
  <link href="https://fonts.googleapis.com/css? family=Quicksand:500" rel="stylesheet">
  <script src="C:/Users/User/Desktop/Projects/web dev/jquery-3.3.1.js">
  </script>
  <script type="text/javascript">
      $(window).on('scroll',function()
      {  
        if($(window).scrollTop())
        {
          $('nav').addClass('black');

        }
        else
        {
          $('nav').removeClass('black');
        }

      })
  </script>
  
</head>
<body>
  <div class="wrapper">
    <nav>
      
      <ul>
        <li><a href="">Home</a></li>
             <li><a href="" class="active" href="#">Log in</a></li>
              .
              <li><a href="" class="active" href="#">Sign up</a></li>
              </ul>
          </nav>
          <section class="sec1"></section>
          <section class="content">
           
           <div class ="container">
            
            

<table class="" align=""  style="width:400px;height:500px;margin-top:40px;">
<caption style="color:red;font-size:32px">Admin page</caption>
<tr>
<th>Name</th>
<th>Profile Image</th>
<th>Action</th>
</tr>
<?php
// database connetion
$con=mysqli_connect("localhost","root","","school");

$select=mysqli_query($con,"select * from student_profile");
while($row=mysqli_fetch_array($select)){
?>

<tr>
<td><?php echo $row['name'];?></td>
<td>
<img src="profile_images/<?php echo $row['profile']; ?>" style="width:80px;height:60px"></td>
<td><a href="update_image.php?id=<?php echo $row['id']; ?>">Update</a></td>
<td><a href="update_image.php?id=<?php echo $row['id']; ?>">Insert new candidate</a></td>


</tr>
<?php } ?>
</table>
</body>
</html>
