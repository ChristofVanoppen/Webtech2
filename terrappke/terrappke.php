<?php 
//1 - check of post
if(!empty($_POST))
{
	//2-file openen
	$file = fopen("niewsbrief.txt", "a+");
	//3-email wegschrijven naar file
	fwrite($file, $_POST['email'] . "\n");
	//4-file closen
	fclose($file);
}

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
    <script src="js/jquery.spritely-0.6.js" type="text/javascript"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#far-clouds').pan({fps: 30, speed: 0.7, dir: 'left', depth: 30});
                $('#near-clouds').pan({fps: 30, speed: 1, dir: 'left', depth: 70});
                
                window.actions = {
                   
                    walkingClouds: function(){
                        $('#far-clouds').spSpeed(3);
                        $('#near-clouds').spSpeed(5);
                    }
                   
                };
            });    
    </script>
</head>
<style>
.container  {

	padding-top:359px;
	position:relative;
	width:100%;
}
.stage {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    min-width: 900px;
    height: 100%;
    overflow: hidden;
    z-index: 100;
}
.far-clouds {
	background: transparent url(img/far-clouds.png) 305px 102px repeat-x;
}
.near-clouds {
	background: transparent url(img/near-clouds.png) 305px 162px repeat-x;
}
.mainContent{
	position: absolute;
	top: 0;
	left: 0;
	z-index: 101;    
}
h1{
	color:white;
}
#span1{
	color:#d35400;
}
.span2{
	text-decoration: underline;
}
p{
	color:white;
}
#weer{
font-size:55px;
color:white;
}
#icon{
width:110px;
height:110px;
float:left;
margin-left: 30%;
}
img{
width:100px;
height:100px;
}
#knop{
	background-color:transparent;
	border-radius: 10px;
	border-color: white;
	color:white;
}
#aanbeveling{
	font-size: 1.5em;
}

</style>
<body onLoad="getLocation()">
	<div class="container">
    <div id="far-clouds" class="far-clouds stage"></div>
    <div id="near-clouds" class="near-clouds stage"></div>
    <div class="mainContent">

	<div class="row">
		<div class="col-md-6">
			<h1>Een passie voor het web & apps?</br>
			Kom dan mee een terr<span id="span1">app</span>ke doen!</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div id="icon"><img id="foto" src=""/></div>
			<div id="weer"></div>
		</div>
	</div>

		<div class="row">
		<div class="col-md-5">
			<h1 id="aanbeveling">Het weer is wisselvallig!</br>
				We raden het niet aan om buiten een terrasje te doen.</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
			<p>
				Ga je binnenkort verder studeren en wil jij net als ons niets liever doen
				dan knappe websites,mobile apps en webapplicaties bouwen?
				Dan ben jij een perfecte kanidaat voor onze opleiding <span class="span2">Interactive Multimedia Design</span>
			</p>
			<p>
				Kom mee een terraske doen aan onze <span class="span2">Creativity Gym</span> en neem meteen een kijkje
				in onze opleiding aan de Thomas More hogeschool in Mechelen.
			</p>
			<p>
				Laat je email adres achter en we mailen de exacte datum, locatie en tijdstip
				naar je door.
			</p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8">
			<form action="" method="post">
			<input type="text" name="email" placeholder="je@email.com" />
			<input type="submit" id="knop" name="btnLogin" value="Inschrijven" />
			</form>
		</div>
	</div>
	
    </div>
</div>

	

		<script>
var y=document.getElementById("weer");
var f=document.getElementById("foto");
var a=document.getElementById("aanbeveling");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  }
function showPosition(position)
  {
		  $.ajax({
		  url: "https://api.forecast.io/forecast/292552a573666b64e7b46da425cf4634/" + position.coords.latitude + "," + position.coords.longitude,
		  dataType: "jsonp",
		  success: function (data) {
		 
		  y.innerHTML=Math.round((data.currently.temperature - 32)/1.8) + " <strong>&degC</strong>";

		  var temp = data.currently.icon;
		  console.log(data);
		  if(temp == "partly-cloudy-night" || temp == "partly-cloudy-day" ){
			f.src = "http://s4.postimg.org/3pngku0kd/cloudy.png";
			document.body.style.background="#6699FF";

			  } 
			  else
			  { 
			  f.src = "http://s7.postimg.org/hs8b3butn/Sunny_icon.png";
			  document.body.style.background="orange";
			  a.innerHTML ="Het is mooi weer! </br> Het is het ideale moment om een terrasje te gaan doen!";
			  }
		}});


}
	</script>
</body>
</html>