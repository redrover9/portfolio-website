<?php
session_start();
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
}  else {     
	header("location: login.php");
	exit;
}
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
echo "<script language='javascript'>
	localStorage.clear()
</script>";
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
<title>Torah Reader</title>
<div class='some-page-wrapper'>
<style>
<?php include "main.550dcf66.css" ?>
@font-face {
	font-family: stam;
	src: url(StamAshkenazCLM.ttf);
}
@font-face {
	font-family: chumash;
	src url(TaameyAshkenaz.ttf);
}
.some-page-wrapper {
margin: 15px;
}

.row {
display: flex;
flex-direction: row;
flex-wrap: wrap;
width: 100%;
}

.column {
display: flex;
flex-direction: column;
flex-basis: 100%;
flex: 1;
column-width: 350px;
}

.double-column {
display: flex;
flex-direction: column;
flex-basis: 100%;
flex: 2;
column-width: 350px;
}

.triple-column {
display: flex;
flex-direction: column;
flex-basis: 100%;
flex: 3;
column-width:350px;
}
.left-column {
justify-content: right;
}
.box {
  border: 3px solid white;
  padding: 150px;
  margin: 5px;
  justify-content: right;
  align-items: right;
}



.middle-column {
    font-family: stam;

}
.right-column {

}
.btn {
	border: none;
	background-color: white;
	color: gray;
  text-align: center;
display: inline-block;
margin: 0 auto;
width: auto;
float: center;


}
.btn:hover {
background: blue;
}
.btn-gtr {
	        border: none;
        background-color: blue;
        color: white;
  text-align: center;
display: inline-block;
margin: 0 auto;
width: auto;
float: center;

}
.right {
float: right;
}
.a {
text-align: center;
}
.menu {
<?php
if (isset($_POST['parasha'])) {
?>
display: none;
<?php
        }
?>

}
.boxes {
	display: none;
}
.dropbtn {
  background-color: blue;
  color: white;
  padding: 16px;
  font-size: 20px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  padding: 0px;
  left: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 250px;
  box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.2);
  z-index: 1;
  padding: 0px 0px;
  left: 0;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  padding: 0px;
  left: 0;
}


.dropdown-content a:hover {background-color: #ddd;}

.dropdown-content a:hover {left: 0;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #696969;}

input[type="radio"] {
	margin-right: 0;
}
</style>
</div>
</head>
<body>
<div class="menu">
<div class="a">
<h1 style="text-align:center; margin:0 auto; display: flex; justify-content: center; align-items: center;">Torah Reader</h1>
<form action="#" method="post" target="_blank">
<label for="cycles">Select a calendar:</label>
<select name="cycle" id="cycle">
<option value="Annual">Annual</option>
<option value="Triennial">Triennial</option>
</select>
<label for="year">Select a year in the triennial cycle:</label>
<select name="year" id="year">
<option value="One">5780 (2019-2020)</option>
<option value="Two">5781 (2020-2021)</option>
<option value="Three">5782 (2021-2022)</option>
</select>
<div class="dropdown">
<button class="dropbtn" onclick="document.location='#'">Select a parasha:</button>
<div class="dropdown-content">
<div class="dropdown">
<input type="radio" id="Bereshit" name="parasha" value="Bereshit" checked>
<br>
<label for="Bereshit">Bereshit</label>
<br>
<input type="radio" id="Noach" name="parasha" value="Noach">
<br>
<label for="Noach">Noach</label>
<br>
<input type="radio" id="Lech-Lecha" name="parasha" value="Lech-Lecha">
<br>
<label for="Lech-Lecha">Lech-Lecha</label>
<br>
<input type="radio" id="Vayera" name="parasha" value="Vayera">
<br>
<label for="Vayera">Vayera</label>
<br>
<input type="radio" id="Chayei Sara" name="parasha" value="Chayei Sara">
<br>
<label for="Chayei Sara">Chayei Sara</label>
<br>
<input type="radio" id="Toldot" name="parasha" value="Toldot">
<br>
<label for="Toldot">Toldot</label>
<br>
<input type="radio" id="Vayetzei" name="parasha" value="Vayetzei">
<br>
<label for="Vayetzei">Vayetzei</label>
<br>
<input type="radio" id="Vayishlach" name="parasha" value="Vayishlach">
<br>
<label for="Vayishlach">Vayishlach</label>
<br>
<input type="radio" id="Vayeshev" name="parasha" value="Vayeshev">
<br>
<label for="Vayeshev">Vayeshev</label>
<br>
<input type="radio" id="Miketz" name="parasha" value="Miketz">
<br>
<label for="Miketz">Miketz</label>
<br>
<input type="radio" id="Vayigash" name="parasha" value="Vayigash">
<br>
<label for="Vayigash">Vayigash</label>
<br>
<input type="radio" id="Vayechi" name="parasha" value="Vayechi">
<br>
<label for="Vayechi">Vayechi</label>
<br>
<input type="radio" id="Shemot" name="parasha" value="Shemot">
<br>
<label for="Shemot">Shemot</label>
<br>
<input type="radio" id="Vaera" name="parasha" value="Vaera">
<br>
<label for="Vaera">Vaera</label>
<br>
<input type="radio" id="Bo" name="parasha" value="Bo">
<br>
<label for="Bo">Bo</label>
<br>
<input type="radio" id="Beshalach" name="parasha" value="Beshalach">
<br>
<label for="Beshalach">Beshalach</label>
<br>
<input type="radio" id="Yitro" name="parasha" value="Yitro">
<br>
<label for="Yitro">Yitro</label>
<br>
<input type="radio" id="Mishpatim" name="parasha" value="Mishpatim">
<br>
<label for="Mishpatim">Mishpatim</label>
<br>
<input type="radio" id="Terumah" name="parasha" value="Terumah">
<br>
<label for="Terumah">Terumah</label>
<br>
<input type="radio" id="Tetzaveh" name="parasha" value="Tetzaveh">
<br>
<label for="Tetzaveh">Tetzaveh</label>
<br>
<input type="radio" id="KiTisa" name="parasha" value="KiTisa">
<br>
<label for="KiTisa">Ki Tisa</label>
<br>
<input type="radio" id="Vayakhel-Pekudei" name="parasha" value="Vayakhel-Pekudei">
<br>
<label for="Vayikra">Vayikra</label>
<br>
<input type="radio" id="Vayikra" name="parasha" value="Vayikra">
<br>
<label for="Vayikra">Vayikra</label>
<br>
<input type="radio" id="Tzav" name="parasha" value="Tzav">
<br>
<label for="Tzav">Tzav</label>
<br>
<input type="radio" id="Shmini" name="parasha" value="Shmini">
<br>
<label for="Shmini">Shmini</label>
<br>
<input type="radio" id="Tazria-Metzora" name="parasha" value="Tazria-Metzora">
<br>
<label for="Tazria-Metzora">Tazria-Metzora</label>
<br>
<input type="radio" id="AchreiMot-Kedoshim" name="parasha" value="AchreiMot-Kedoshim">
<br>
<label for="AchreiMot-Kedoshim">Achrei Mot-Kedoshim</label>
<br>
<input type="radio" id="Emor" name="parasha" value="Emor">
<br>
<label for="Emor">Emor</label>
<br>
<input type="radio" id="Behar-Bechukotai" name="parasha" value="Behar-Bechukotai">
<br>
<label for="Behar-Bechukotai">Behar-Bechukotai</label>
<br>
<input type="radio" id="Bamidbar" name="parasha" value="Bamidbar">
<br>
<label for="Bamidbar">Bamidbar</label>
<br>
<input type="radio" id="Nasso" name="parasha" value="Nasso">
<br>
<label for="Nasso">Nasso</label>
<br>
<input type="radio" id="Beha'alotcha" name="parasha" value="Beha'alotcha">
<br>
<label for="Beha'alotcha">Beha'alotcha</label>
<br>
<input type="radio" id="Sh'lach" name="parasha" value="Sh'lach">
<br>
<label for="Sh'lach">Sh'lach</label>
<br>
<input type="radio" id="Korach" name="parasha" value="Korach">
<br>
<label for="Korach">Korach</label>
<br>
<input type="radio" id="Chukat" name="parasha" value="Chukat">
<br>
<label for="Balak">Balak</label>
<br>
<input type="radio" id="Pinchas" name="parasha" value="Pinchas">
<br>
<label for="Pinchas">Pinchas</label>
<br>
<input type="radio" id="Matot-Masei" name="parasha" value="Matot-Masei">
<br>
<label for="Matot-Masei">Matot-Masei</label>
<br>
<input type="radio" id="Devarim" name="parasha" value="Devarim">
<br>
<label for="Devarim">Devarim</label>
<br>
<input type="radio" id="Vaetchanan" name="parasha" value="Vaetchanan">
<br>
<label for="Vaetchanan">Vaetchanan</label>
<br>
<input type="radio" id="Eikev" name="parasha" value="Eikev">
<br>
<label for="Eikev">Eikev</label>
<br>
<input type="radio" id="Re'eh" name="parasha" value="Re'eh">
<br>
<label for="Re'eh">Re'eh</label>
<br>
<input type="radio" id="Shoftim" name="parasha" value="Shoftim">
<br>
<label for="Shoftim">Shoftim</label>
<br>
<input type="radio" id="KiTetzei" name="parasha" value="KiTetzei">
<br>
<label for="KiTetzei">Ki Tetzei</label>
<br>
<input type="radio" id="KiTavo" name="parasha" value="KiTavo">
<br>
<label for="KiTavo">Ki Tavo</label>
<br>
<input type="radio" id="Nitzavim" name="parasha" value="Nitzavim">
<br>
<label for="Nitzavim">Nitzavim</label>
<br>
<input type="radio" id="Ha'Azinu" name="parasha" value="Ha'Azinu">
<br>
<label for="Ha'Azinu">Ha'Azinu</label>
<br>

</div>
</div>
</div>
</div>
<div class="a">
<label for="aliyot">Select an aliyah:</label>
<select name="aliyah" id="aliyah">
<option value="1">First Aliyah</option>
<option value="2">Second Aliyah</option>
<option value="3">Third Aliyah</option>
<option value="4">Fourth Aliyah</option>
<option value="5">Fifth Aliyah</option>
<option value="6">Sixth Aliyah</option>
<option value="7">Seventh Aliyah</option>
<option value="H">Haftara</option>
</select>
<label for="highlighting">Highlighted trope marks:</label>
<select name="highlighting" id="highlighting">
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
<div class="dropdown">
<button class="dropbtn"  onclick="document.location='#'">Enter trope mark(s) to highlight: </button>
<div class="dropdown-content">
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="merkha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="merkha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha (Yellow)</label><br> 
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="merkha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="etnahta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Etnahta (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="etnahta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Etnahta (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="etnahta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Etnahta (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="segol" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Segol (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="segol" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Segol (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="segol" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Segol (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="shalshelet" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Shalshelet (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="shalshelet" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Shalshelet (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="shalshelet" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Shalshelet (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="zaqef qatan" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zaqef Qatan (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="zaqef qatan" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zaqef Qatan (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="zaqef qatan" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zaqef Qatan (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="tipeha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tipeha (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="tipeha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tipeha (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="tipeha" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tipeha (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="revia" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Revia(Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="revia" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Revia (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="revia" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Revia (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="zarqa" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zarqa (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="zarqa" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zarqa (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="zarqa" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zarqa (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="pashta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pashta (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="pashta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pastha (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="pashta" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pashta (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="yetiv" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yetiv (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="yetiv" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yetiv (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="yetiv" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yetiv (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="tevir" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tevir (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="tevir" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tevir (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="tevir" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Tevir (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="geresh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="geresh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="geresh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="geresh muqdam" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh Muqdam (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="geresh muqdam" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh Muqdam (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="geresh muqdam" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Geresh Muqdam (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="gershayim" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Gershayim (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="gershayim" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Gershayim (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="gershayim" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Gershayim (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="qarney para" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qarney Para (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="qarney para" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qarney Para (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="qarney para" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qarney Para (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="telisha gedola" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Gedola (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="telisha gedola" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Gedola (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="telisha gedola" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Gedola (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="pazer" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pazer (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="pazer" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pazer (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="pazer" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Pazer (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="atnah hafukh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Atnah Hafukh (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="Atnah Hafukh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Atnah Hafukh (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="atnah hafukh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Atnah Hafukh (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="munah" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Munah (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="munah" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Munah (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="Munah" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Munah (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="mahapakh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Mahapakh (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="mahapakh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Mahapakh (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="mahapakh" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Mahapakh (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="merkha kefula" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha Kefula(Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="merkha kefula" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha Kefula (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="merkha kefula" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha Kefula (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="darga" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Darga (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="darga" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Darga (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="darga" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Darga (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="qadma" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qadma (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="qadma" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qadma (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="qadma" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Qadma (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="telisha qetana" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Qetana (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="telisha qetana" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Qetana (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="telisha qetana" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Telisha Qetana (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="yerah ben yomo" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yerah Ben Yomo (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="yerah ben yomo" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yerah Ben Yomo (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="yerah ben yomo" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Yerah Ben Yomo (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="ole" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Ole (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="ole" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Ole (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="ole" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Ole (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="iluy" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Iluy (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="iluy" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Iluy (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="iluy" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Iluy (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="dehi" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Dehi (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="dehi" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Dehi (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="dehi" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Dehi (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="zinor" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zinor (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="zinor" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zinor (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="zinor" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Zinor (Green)</label><br>
<input type="checkbox" id="tropeMarkOne" name="tropeMarkOne" value="masora circle" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Masora Circle (Pink)</label><br>
<input type="checkbox" id="tropeMarkTwo" name="tropeMarkTwo" value="masora circle" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Masora Circle (Yellow)</label><br>
<input type="checkbox" id="tropeMarkThree" name="tropeMarkThree" value="masora circle" style="width:20px; text-align:center; margin:0 auto;"><br>
<label for="merkha" style="text-align:center; margin:0 auto;">Masora Circle (Green)</label><br>

</div><br>
</div>
</div>
<br>
<br>
<div class="a">
<label for="layout">Select a layout: </label>
<select name="layout" id="layout">
<option value="tikkun">Tikkun with audio and translation</option>
</select>
<label for="pitch">Select a pitch: </label>
<select name="pitch" id="pitch">
<option value="">Default</option>
<option value="high-">High</option>
<option value="medium-high-">Medium High</option>
<option value="medium-low-">Medium Low</option>
<option value="low-">Low</option>
</select>
</div>
<br>
<br>
<input type="submit" name="Submit" class="btn-gtr btn-primary" background-color="blue" value="Get Torah Reading" style="text-align:center; margin:0 auto; display: flex; justify-content: center; align-items: center; font-size: 200%">
</input> 
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="a">
<button class="btn" onclick="document.location='calendar.html'">View Caledar</button>
</div>
</div>
</div>
<div class="a">
<button class="btn" onclick="window.print()">Print or Export This Page</button>
<form action="https://zoom.us/meeting/schedule">
<input class="btn" type="submit" value="Schedule a Zoom meeting"/>
</form>
<div id="gUMArea">
Record:
<input type="radio" name="media" value="video" checked id="mediaVideo">Video
<input type="radio" name="media" value="audio">Audio
<button class="btn btn-primary"  id="gUMbtn">Grant permission to use mic and camera</button>
</div>
<div id="btns">
<button  class="btn btn-primary" id="start">Start Recording</button>
<button  class="btn btn-primary" id="stop">Stop Recording</button>
<button class="btn btn-primary" onclick="document.location='user_uploaded_audio.php'">Listen to User Uploaded Audio</button>
</div>
</div>
</div>
<ul  class="list-unstyled" id="ul"></ul>
<script src="recordAudio.js"></script>
<div class="a" style="text-align:center; margin:0 auto; display: flex; justify-content: center; align-items: center;">
<form action="upload.php" method="post" enctype="multipart/form-data" style="text-align:center; margin:0 auto; display: flex; justify-content: center; align-items: center;">
Select an audio or video file to upload (please use a descriptive file name): 
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit" class="btn" background-color="blue"  style="text-align:center; display: flex; justify-content: center;">
</form>
</div>
<?php
$ch = curl_init();
$parasha = $_POST['parasha'];
$aliyah = $_POST['aliyah'];
$cycle = $_POST['cycle'];
$year = $_POST['year'];
$highlighting = $_POST['highlighting'];
$layout = $_POST['layout'];
$speed = $_POST['speed'];
$pitch = $_POST['pitch'];
$tropeMarkOne = $_POST['tropeMarkOne'];
$tropeMarkTwo = $_POST['tropeMarkTwo'];
$tropeMarkThree = $_POST['tropeMarkThree'];
if ($cycle == 'Triennial') {
	$chTri = fopen("triennial_calendar.csv", "r");
	$triMatches = [];
	while ($triRow = fgetcsv($chTri)) {
		         $triRow = '<div>' . implode(' ', $triRow) . ' </div>'; 
			 array_push($triMatches, $triRow);
	}
	$triMatch =  (preg_grep("/$year.*$parasha\s$aliyah.*/", $triMatches)); 
	$triMatch = implode($triMatch);
	$triVersesArray = array();
	preg_match("/[A-Z][a-z]*\s\d*:\d*\s-\s\d*:\d*/", $triMatch, $triVersesArray);
	$triVerseString = implode($triVersesArray);
	$verses = str_replace(":", ".", $triVerseString);
	$verses = str_replace(" - ", "-", $verses);
	$verses = str_replace(" ", ".", $verses);
	$triRegexVerses = preg_replace("/\./", "-", $verses, 1);
	preg_match_all("/-\d*/", $regexVerses, $triRegexVersesMatches);
	$firstElement = $triRegexVersesMatches[0][0];
	$secondElement = $triRegexVersesMatches[0][1];
	if ($firstElement == $secondElement) {
		        $verses = preg_replace("/-\d*\./", "-", $verses);
}
        if (preg_match("/^Samuel\./", $verses) && preg_match("/Korach/", $verses) || preg_match("/Re'eh/", $verses) || preg_match("/Rosh Hashana/", $verses) || preg_match("/Bereshit/", $verses) || preg_match("/Terumah/", $verses)){
$verses =               preg_replace("/Samuel/", "I_Samuel", $verses);
        } else {
$verses =               preg_replace("/Samuel/", "II_Samuel", $verses);

	}

	        if (preg_match("/Sukkot/", $parasha) || preg_match("/Shmini Atzeret/", $parasha) || preg_match("/Chayei Sara/", $parasha) || preg_match("/Miketz/", $parasha) || preg_match("/Vayechi/", $parasha)) {
                $verses = preg_replace("/Kings/", "I_Kings", $verses);
        } else {
                $verses  = preg_replace("/Kings/", "II_Kings", $verses);


        }}


elseif ($cycle == 'Annual') {
        $chAn = fopen("annual_calendar.csv", "r");
        $anMatches = [];
        while ($anRow = fgetcsv($chAn)) {
                         $anRow = '<div>' . implode(' ', $anRow) . ' </div>';
                         array_push($anMatches, $anRow);
        }
        $anMatch =  (preg_grep("/.*$parasha\s$aliyah.*/", $anMatches));
        $anMatch = implode($anMatch);
        $anVersesArray = array();
        preg_match("/[A-Z][a-z]*\s\d*:\d*\s-\s\d*:\d*/", $anMatch, $anVersesArray);
        $anVerseString = implode($anVersesArray);
        $verses = str_replace(":", ".", $anVerseString);
        $verses = str_replace(" - ", "-", $verses);
        $verses = str_replace(" ", ".", $verses);
        $anRegexVerses = preg_replace("/\./", "-", $verses, 1);
        preg_match_all("/-\d*/", $anRegexVerses, $anRegexVersesMatches);
        $firstElement = $anRegexVersesMatches[0][0];
        $secondElement = $anRegexVersesMatches[0][1];
        if ($firstElement == $secondElement) {
                        $verses = preg_replace("/-\d*\./", "-", $verses);
}
	if (preg_match("/^Samuel\./", $verses) && preg_match("/Korach/", $parasha) || preg_match("/Re'eh/", $parasha) || preg_match("/Rosh Hashana/", $parasha) || preg_match("/Bereshit/", $parasha) || preg_match("/Terumah/", $parasha)){
$verses = 		preg_replace("/Samuel/", "I_Samuel", $verses);
	} else {
$verses = 		preg_replace("/Samuel/", "II_Samuel", $verses);

	}
        if (preg_match("/Sukkot/", $parasha) || preg_match("/Shmini Atzeret/", $parasha) || preg_match("/Chayei Sara/", $parasha) || preg_match("/Miketz/", $parasha) || preg_match("/Vayechi/", $parasha)) {
                $verses = preg_replace("/Kings/", "I_Kings", $verses);
        } else {
                $verses  = preg_replace("/Kings/", "II_Kings", $verses);


	}}
$curlUrl = 'http://www.sefaria.org/api/texts/' . $verses . '?context=0&commentary=0';
curl_setopt($ch, CURLOPT_URL, $curlUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$array = json_decode($data, true);
$hebrew = $array['he'];
$english = $array['text'];
function subArraysToString($ar, $sep = "<br> <br>") {
	      $str = '';
	       foreach ($ar as $val) {
		        $str .= implode($sep, $val);
			 $str .= $sep;
			 }
	       $str = rtrim($str, $sep);
	       return $str;
	        }
$hebrewString = subArraysToString($hebrew);
$englishString = subArraysToString($english);
$pattern = "/-\d+$/i";

if (preg_match($pattern, $verses)) {
	        $hebrewString = implode("<br> <br>", $hebrew);
		 $englishString = implode("<br> <br>", $english);
		 }
$hebrewString = str_replace('b', '', $hebrewString);
$hebrewString = str_replace('r', '', $hebrewString);
$hebrewString = str_replace('<', '', $hebrewString);
$hebrewString = str_replace('>', '', $hebrewString);

$_SESSION['heb'] = $hebrewString;
$_SESSION['eng'] = $englishString;
?>
<?php
if ($highlighting == "Yes") {
	$newHebrewString = "";
	$newEnglishString = "";
$hebrewArray = explode(" ", $hebrewString);
$englishArray = explode(" ", $englishString);
if ($tropeMarkOne == 'merkha') {
	$tropeMarkOne = ' ֥';
	$tropeMarkOne = trim($tropeMarkOne);
}
        elseif ($tropeMarkOne == 'etnahta') {
		                $tropeMarkOne = ' ֑';
				                $tropeMarkOne = trim($tropeMarkOne);
				        }
        elseif ($tropeMarkOne == 'segol') {
		                $tropeMarkOne = ' ֒';
				                $tropeMarkOne = trim($tropeMarkOne);
				        }
        elseif ($tropeMarkOne == 'shalshelet') {
		                $tropeMarkOne = ' ֓';
				                $tropeMarkOne = trim($tropeMarkOne);
				        }
        elseif ($tropeMarkOne == 'zakef qatan') {
		                $tropeMarkOne = ' ֔';
				                $tropeMarkOne = trim($tropeMarkOne);
				        }
	elseif ($tropeMarkOne == 'zakef qatan') {
                                $tropeMarkOne = ' ֔';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'tipeha') {
                                $tropeMarkOne = ' ֖';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'revia') {
                                $tropeMarkOne = ' ֗';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'zarqa') {
                                $tropeMarkOne = ' ֘';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'pashta') {
                                $tropeMarkOne = ' ֙';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'yetiv') {
                                $tropeMarkOne = ' ֚';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'tevir') {
                                $tropeMarkOne = ' ֛';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'geresh') {
                                $tropeMarkOne = ' ֜';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'muqdam') {
                                $tropeMarkOne = ' ֝';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'gershayim') {
                                $tropeMarkOne = ' ֞';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'qarney para') {
                                $tropeMarkOne = ' ֟';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'telisha gedola') {
                                $tropeMarkOne = ' ֠';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'pazer') {
                                $tropeMarkOne = ' ֡';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'atnah hafukh') {
                                $tropeMarkOne = ' ֢';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'munah') {
                                $tropeMarkOne = ' ֣';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'mahapakh') {
                                $tropeMarkOne = ' ֤';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'merkha kefula') {
                                $tropeMarkOne = ' ֦';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'darga') {
                                $tropeMarkOne = ' ֧';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'qadma') {
                                $tropeMarkOne = ' ֨';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'telisha qetana') {
                                $tropeMarkOne = ' ֩';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'yerah ben yomo') {
                                $tropeMarkOne = ' ֪';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'ole') {
                                $tropeMarkOne = ' ֫';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'iluy') {
                                $tropeMarkOne = ' ֬';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'dehi') {
                                $tropeMarkOne = ' ֭';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'zinor') {
                                $tropeMarkOne = ' ֮';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
elseif ($tropeMarkOne == 'masora circle') {
                                $tropeMarkOne = ' ֯';
                                                $tropeMarkOne = trim($tropeMarkOne);
                                        }
	else { 
		$tropeMarkOne = "";
	}
								        
if ($tropeMarkTwo == 'merkha') {
	$tropeMarkTwo = ' ֥';
	$tropeMarkTwo = trim($tropeMarkTwo);
}
        elseif ($tropeMarkTwo == 'etnahta') {
		                $tropeMarkTwo = ' ֑';
				                $tropeMarkTwo = trim($tropeMarkTwo);
				        }
        elseif ($tropeMarkTwo == 'segol') {
		                $tropeMarkTwo = ' ֒';
				                $tropeMarkTwo = trim($tropeMarkTwo);
				        }
        elseif ($tropeMarkTwo == 'shalshelet') {
		                $tropeMarkTwo = ' ֓';
				                $tropeMarkTwo = trim($tropeMarkTwo);
				        }
        elseif ($tropeMarkTwo == 'zakef qatan') {
		                $tropeMarkTwo = ' ֔';
				                $tropeMarkTwo = trim($tropeMarkTwo);
				        }
elseif ($tropeMarkTwo == 'tipeha') {
                                $tropeMarkTwo = ' ֖';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'revia') {
                                $tropeMarkTwo = ' ֗';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'zarqa') {
                                $tropeMarkTwo = ' ֘';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'pashta') {
                                $tropeMarkTwo = ' ֙';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'yetiv') {
                                $tropeMarkTwo = ' ֚';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'tevir') {
                                $tropeMarkTwo = ' ֛';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'geresh') {
                                $tropeMarkTwo = ' ֜';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'muqdam') {
                                $tropeMarkTwo = ' ֝';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'gershayim') {
                                $tropeMarkTwo = ' ֞';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'qarney para') {
                                $tropeMarkTwo = ' ֟';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'telisha gedola') {
                                $tropeMarkTwo = ' ֠';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'pazer') {
                                $tropeMarkTwo = ' ֡';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'atnah hafukh') {
                                $tropeMarkTwo = ' ֢';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }

elseif ($tropeMarkTwo == 'munah') {
                                $tropeMarkTwo = ' ֣';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'mahapakh') {
                                $tropeMarkTwo = ' ֤';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'merkha kefula') {
                                $tropeMarkTwo = ' ֦';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'darga') {
                                $tropeMarkTwo = ' ֧';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'qadma') {
                                $tropeMarkTwo = ' ֨';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'telisha qetana') {
                                $tropeMarkTwo = ' ֩';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'yerah ben yomo') {
                                $tropeMarkTwo = ' ֪';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'ole') {
                                $tropeMarkTwo = ' ֫';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'iluy') {
                                $tropeMarkTwo = ' ֬';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'dehi') {
                                $tropeMarkTwo = ' ֭';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'zinor') {
                                $tropeMarkTwo = ' ֮';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
                                        }
elseif ($tropeMarkTwo == 'masora circle') {
                                $tropeMarkTwo = ' ֯';
                                                $tropeMarkTwo = trim($tropeMarkTwo);
}
	else { 
		$tropeMarkTwo = "";
	}

if ($tropeMarkThree == 'merkha') {
	$tropeMarkThree = ' ֥';
	$tropeMarkThree = trim($tropeMarkThree);
}
        elseif ($tropeMarkThree == 'etnahta') {
		                $tropeMarkThree = ' ֑';
				                $tropeMarkThree = trim($tropeMarkThree);
				        }
        elseif ($tropeMarkThree == 'segol') {
		                $tropeMarkThree = ' ֒';
				                $tropeMarkThree = trim($tropeMarkThree);
				        }
        elseif ($tropeMarkThree == 'shalshelet') {
		                $tropeMarkThree = ' ֓';
				                $tropeMarkThree = trim($tropeMarkThree);
				        }
        elseif ($tropeMarkThree == 'zakef qatan') {
		                $tropeMarkThree = ' ֔';
				                $tropeMarkThree = trim($tropeMarkThree);
				        }
elseif ($tropeMarkThree == 'tipeha') {
                                $tropeMarkThree = ' ֖';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'revia') {
                                $tropeMarkThree = ' ֗';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'zarqa') {
                                $tropeMarkThree = ' ֘';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'pashta') {
                                $tropeMarkThree = ' ֙';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'yetiv') {
                                $tropeMarkThree = ' ֚';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'tevir') {
                                $tropeMarkThree = ' ֛';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'geresh') {
                                $tropeMarkThree = ' ֜';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'muqdam') {
                                $tropeMarkThree = ' ֝';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'gershayim') {
                                $tropeMarkThree = ' ֞';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'qarney para') {
                                $tropeMarkThree = ' ֟';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'telisha gedola') {
                                $tropeMarkThree = ' ֠';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'pazer') {
                                $tropeMarkThree = ' ֡';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'atnah hafukh') {
                                $tropeMarkThree = ' ֢';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'munah') {
                                $tropeMarkThree = ' ֣';
}
elseif ($tropeMarkThree == 'mahapakh') {
                                $tropeMarkThree = ' ֤';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'merkha kefula') {
                                $tropeMarkThree = ' ֦';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'darga') {
                                $tropeMarkThree = ' ֧';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'qadma') {
                                $tropeMarkThree = ' ֨';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'telisha qetana') {
                                $tropeMarkThree = ' ֩';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'yerah ben yomo') {
                                $tropeMarkThree = ' ֪';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'ole') {
                                $tropeMarkThree = ' ֫';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'iluy') {
                                $tropeMarkThree = ' ֬';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'dehi') {
                                $tropeMarkThree = ' ֭';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'zinor') {
                                $tropeMarkThree = ' ֮';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                        }
elseif ($tropeMarkThree == 'masora circle') {
                                $tropeMarkThree = ' ֯';
                                                $tropeMarkThree = trim($tropeMarkThree);
                                                                                                                                                                                               
}

	else { 
		$tropeMarkThree = "";
	}

foreach ($hebrewArray as $hebrewWord) {
$hebrewLetter = preg_split('//u', $hebrewWord, -1, PREG_SPLIT_NO_EMPTY);
	
        if (strpos($hebrewWord, $tropeMarkOne) !=  false) {
		$hebrewWord = "<span style='background-color:#FF00FF'>$hebrewWord</span>";
$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $tropeMarkTwo) !=  false) {
		                $hebrewWord = "<span style='background-color:#FCF803'>$hebrewWord</span>";
				$newHebrewString .= $hebrewWord;
				$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $tropeMarkThree) !=  false) {
	                $hebrewWord = "<span style='background-color:#41FC03'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
			        }
	        else {

$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";

		}
}
$hebrewString = $newHebrewString;
}

?>  

<div class="row">
<div class="column">
<div class="middle-column" style="text-align: right;">
<?php
if ($layout == 'tikkun'){
echo '<div style="font-size: 35pt">'. $hebrewString . '</div>';
} else {
echo '<div style="font-size: 25pt">'. $englishString . '</div>';
}
?>

</div>
</div>
<div class="column">
<div class="left-column" style="text-align: right;">
<?php
echo '<div style="font-size: 35pt">'. $hebrewString . '</div>';
?>
</div>
</div>

<div class="column">
<div class="right-column" style="text-align: right;">
<?php

if ($layout == 'stam'){
	        $parasha = str_replace(' ', '', $parasha);
echo "<source src='audio/$pitch$parasha-$aliyah.mp3' type='audio/mp3'>";
echo "</audio>";
} elseif ($layout == 'tikkun'){
	echo "<audio id=parashaAudio controls>";
	$parasha = str_replace(' ', '', $parasha);
	echo "<source src='audio/$pitch$parasha-$aliyah.mp3' type='audio/mp3'>";
	echo "</audio>";
	echo '<div style="font-size: 23pt">'. $englishString . '</div>';
}
?>
</audio>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

