<?php
        session_start();
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
}  else {
        header("location: login.php");
        exit;
}
?>
<?php
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
    <meta name="keywords" content="WebRTC getUserMedia MediaRecorder API">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
<title>Torah Reader</title>
<div class='page-wrapper'>
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
.page-wrapper {
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
}
.box {
  border: 3px solid white;
  padding: 150px;
  margin: 5px;
  justify-content: right;
  align-items: right;
}
.middle-column {
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
background: crimson;
}
.btn-gtr {
	        border: none;
        background-color: crimson;
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
text-align: left;
}
.b {
}
.rtl {
direction: rtl;
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
  background-color: crimson;
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
<script>
'use strict'

let log = console.log.bind(console),
  id = val => document.getElementById(val),
  ul = id('ul'),
  gUMbtn = id('gUMbtn'),
  start = id('start'),
  stop = id('stop'),
  stream,
  recorder,
  counter=1,
  chunks,
  media;


gUMbtn.onclick = e => {
  let mv = id('mediaVideo'),
      mediaOptions = {
        video: {
          tag: 'video',
          type: 'video/webm',
          ext: '.webm',
          gUM: {video: true, audio: true}
        },
        audio: {
          tag: 'audio',
          type: 'audio/mp3',
          ext: '.mp3',
          gUM: {audio: true}
        }
      };
  media = mv.checked ? mediaOptions.video : mediaOptions.audio;
  navigator.mediaDevices.getUserMedia(media.gUM).then(_stream => {
    stream = _stream;
    id('gUMArea').style.display = 'none';
    id('btns').style.display = 'inherit';
    start.removeAttribute('disabled');
    recorder = new MediaRecorder(stream);
    recorder.ondataavailable = e => {
      chunks.push(e.data);
      if(recorder.state == 'inactive')  makeLink();
    };
    log('got media successfully');
  }).catch(log);
}

start.onclick = e => {
  start.disabled = true;
  stop.removeAttribute('disabled');
  chunks=[];
  recorder.start();
}


stop.onclick = e => {
  stop.disabled = true;
  recorder.stop();
  start.removeAttribute('disabled');
}



function makeLink(){
  let blob = new Blob(chunks, {type: media.type })
    , url = URL.createObjectURL(blob)
    , li = document.createElement('li')
    , mt = document.createElement(media.tag)
    , hf = document.createElement('a')
  ;
  mt.controls = true;
  mt.src = url;
  hf.href = url;
  hf.download = `CantorRecording${counter++}${media.ext}`;
  hf.innerHTML = `Download ${hf.download}`;
  li.appendChild(mt);
  li.appendChild(hf);
  ul.appendChild(li);


  const formData = new FormData();
  formData.append('_token',  $('meta[name="csrf-token"]').attr('content'));
  formData.append('video', blob);
  fetch('/save', {
    method: 'POST',
    body: formData
  })
  .then(response => {
      console.log(response);
  })
  .catch(error => {});
}
</script>
<script>
var y = document.getElementById("b");
y.style.display = "none";
</script>
<script>
function displayFunc() {
  var x = document.getElementById("b");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
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
$sofPasuk = $_POST['sofPasuk'];
$zakefKaton = $_POST['zakefKaton'];
$tevir = $_POST['tevir'];
$geresh = $_POST['geresh'];
$telishaGedola = $_POST['telishaGedola'];
$pazer = $_POST['pazer'];
$karnePara = $_POST['karnePara'];
$etnachta = $_POST['etnachta'];
$revia = $_POST['revia'];
$segol = $_POST['segol'];
$gershayim = $_POST['gershayim'];
$zakefGadol = $_POST['zakefGadol'];
$shalshelet = $_POST['shalshelet'];
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
$ref = $array['ref'];
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
$hebrewString = str_replace('(פ)', '', $hebrewString);
$hebrewString = str_replace('(ס)', '', $hebrewString);
$_SESSION['heb'] = $hebrewString;
$_SESSION['eng'] = $englishString;
?>
<?php
echo "<div id=rtl class=rtl >";
echo "<h3> $ref </h3>";
	$newHebrewString = "";
	$newEnglishString = "";
	$hebrewArray = explode(" ", $hebrewString);
	foreach ($hebrewArray as $indvWord) {
	//$wordCounter += 1;
	//echo "<audio preload='none' id=$wordCounter src=Bereshit-1-$wordCounter.mp3></audio>";
	//echo "<button onclick=document.getElementById($wordCounter).play() type=button>$indvWord</button>";
	//echo "<script>";
	//echo "</script>";
	//echo "<audio preload='none' id='indvAudio$wordCounter'>";
	//echo "<source src=$wordCounter.mp3 type='audio/mpeg'> ";
	//echo "</audio>";
	//echo "<script>";
	//echo "var x = document.getElementById('indvAudio$wordCounter');";
	//echo "function aud() {";
	//echo "x.play();";
	//echo "}";
	//echo "</script>";
	//echo "<button onclick=aud() type=button>$indvWord</button>";
}
echo "</div>";
?>
<script>
var jsHebrewArray = [<?php json_encode($hebrewArray);?>];
</script>
<?php
$englishArray = explode(" ", $englishString);
$sofPasukChar = ' ׃';
$sofPasukChar = trim($sofPasukChar);
$zakefKatonChar = ' ֔';
$zakefKatonChar = trim($zakefKatonChar);
$tevirChar = ' ֛';
$tevirChar = trim($tevirChar);
$gereshChar = ' ֜';
$gereshChar = trim($gereshChar);
$telishaGedolaChar = ' ֠';
$telishaGedolaChar = trim($telishaGedolaChar);
$pazerChar = ' ֡';
$pazerChar = trim($pazerChar);
$karneParaChar = ' ֟';
$karneParaChar = trim($karneParaChar);
$etnachtaChar = ' ֑';
$etnachtaChar = trim($etnachtaChar);
$reviaChar = ' ֗';
$reviaChar = trim($reviaChar);
$segolChar = ' ֒';
$segolChar = trim($segolChar);
$gershayimChar = ' ֞';
$gershayimChar = trim($gershayimChar);
$zakefGadolChar = ' ֕';
$zakefGadolChar = trim($zakefGadolChar);
$shalsheletChar = ' ֓';
$shalsheletChar = trim($shalsheletChar);
foreach ($hebrewArray as $hebrewWord) {
$hebrewLetter = preg_split('//u', $hebrewWord, -1, PREG_SPLIT_NO_EMPTY);
        if (strpos($hebrewWord, $sofPasukChar) !=  false) {
		$hebrewWord = "<span style='background-color:$sofPasuk'>$hebrewWord</span>";
$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";
$newHebrewString .= "<br>";
$newHebrewString .= "<br>";
	} elseif (strpos($hebrewWord, $zakefKatonChar) !=  false) {
		                $hebrewWord = "<span style='background-color:$zakefKaton'>$hebrewWord</span>";
				$newHebrewString .= $hebrewWord;
				$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $tevirChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$tevir'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $gereshChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$geresh'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $telishaGedolaChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$telishaGedola'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $pazerChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$pazer'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $karneParaChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$karnePara'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $etnachtaChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$etnachta'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $reviaChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$revia'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $segolChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$segol'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $gershayimChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$gershayim'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $zakefGadolChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$zakefGadol'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} elseif (strpos($hebrewWord, $shalsheletChar) !=  false) {
	                $hebrewWord = "<span style='background-color:$shalshelet'>$hebrewWord</span>";
			$newHebrewString .= $hebrewWord;
			$newHebrewString .= " ";
	} else {

$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";

		}
}
$hebrewString = $newHebrewString;
?>  
<div style="border-style: solid; border-color: crimson; display: inline-block;">
<h2>User Audio</h2>
<button class="btn btn-primary" onclick="window.open('user_uploaded_audio.php', '_blank')">Listen to User Uploaded Audio</button>
<button  class="btn btn-primary" onclick="window.open('recordAudio.php', '_blank')">Record Audio</button>
<form action="upload.php" method="post" enctype="multipart/form-data" target="_blank">
Select an audio or video file to upload (please use a descriptive file name):
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" target="_blank" name="submit" class="btn" background-color="crimson"  >
</div>
</form>
<div style="border-style: solid; border-color: crimson; display: inline-block;">
<h2>Calendars</h2>
<button class="btn" onclick="window.open('calendar.html', '_blank')">View Torah Readings Calendar</button>
<button class="btn" onclick="window.open('lessons-calendar.html', '_blank')">View Lessons Calendar</button>
</div>
<div style="border-style: solid; border-color: crimson; display: inline-block;">
<h2>Printing</h2>
<button class="btn" onclick="window.print()">Print or Export This Page</button>
</div>
<div style="border-style: solid; border-color: crimson; display: inline-block;">
<h2>Zoom</h2>
<form action="https://zoom.us/meeting/schedule" target="_blank">
<input class="btn" type="submit" target="_blank" value="Schedule a Zoom meeting"/>
</form>
</div>

<div class="row">
<div class="column">
<div class="left-column" style="text-align: right;">
<?php
if ($layout == 'tikkun') {

echo '<div style="font-size: 25pt; font-family: stam;">'. $hebrewString . '</div>';
} else {
	echo '<div style="font-family: stam; font-size: 25pt">' . $hebrewString . '</div>';
}
?>

</div>
</div>
<div class="column">
<div class="left-column" style="text-align: right;">
<?php
if ($layout == 'tikkun') {
echo '<div style="font-size: 25pt">'. $hebrewString . '</div>';
} else {
echo '';
}	
?>
</div>
</div>

<div class="column">
<div class="right-column" style="text-align: right;">
<?php

if ($layout == 'stam'){
		echo "<audio id=parashaAudio controls>";
	        $parasha = str_replace(' ', '', $parasha);
		echo "<source src='audio/$pitch$parasha-$aliyah.mp3' type='audio/mp3'>";
echo "</audio>";
} elseif ($layout == 'tikkun' && $cycle == 'Annual'){
	echo "<audio id=parashaAudio controls>";
	$parasha = str_replace(' ', '', $parasha);
	echo "<source src='audio/$pitch$parasha-$aliyah.mp3' type='audio/mp3'>";
	echo "</audio>";
}
	echo '<div style="font-size: 20pt">'. $englishString . '</div>';
?>
</audio>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://www.sefaria.org/linker.js"></script>
	<script>
	    sefaria.link();
	</script>
</body>
</html>

