﻿<!DOCTYPE html>
<html>
<head>
  <title>StratizenVote</title>
  <style>
  .mySlides {display:none;}
  </style>

</head>

<body>

Vote before time runs out
<img src="images/vikship.gif" />
<marquee scrollamount="10"
direction="left"
behavior="scroll">
Vote before time runs out
<img src="images/vikship.gif" />
</marquee>
		

<h2 class="w3-center">President</h2>

<div class="w3-content w3-display-container">
 
<a href="manifesto.html">  <img class="mySlides" src="media/images/14.jpg" style="width:20%">  <a>
<button type="button">VOTE</button>
  <img class="mySlides" src="media/images/13.jpg" style="width:20%">
  <img class="mySlides" src="media/images/12.jpg" style="width:20%">
  <img class="mySlides" src="media/images/11.jpg" style="width:20%">



  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<button type="button">I'M DONE VOTING</button>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</body>
</html>