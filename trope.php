<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
<style>
.trope_div {
width: 75px;
border: 10px solid blue;
padding: 10px;
margin-left: auto;
margin-right: auto;
text-align: center;
float: center;
}
.encompassing_div {
width: 1000px;
border: 15px solid blue;
padding: 10px;
margin: auto;
text-align: center;
}
.btn {
text-align: center;
margin: auto;
}
</style>
<title>
Trope Practice
</title>
<h1 style="margin: auto; text-align: center;">
Trope Practice
</h1>
<br>
<br>
</head>
<body>
<form action="/trope.php" method="post" style="margin: auto; text-align: center; font-size: 150%; ">
<input type="checkbox" id="merkha" name="merkha" value="merkha" style="width:20px; text-align:center; margin:0 auto;">
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha </label>
<input type="checkbox" id="tipeha" name="tipeha" value="tipeha" style="width:20px; text-align:center; margin:0 auto;">
<label for="tipeha" style="text-align:center; margin:0 auto;">Tipeha </label>
<input type="checkbox" id="siluq" name="siluq" value="siluq" style="width:20px; text-align:center; margin:0 auto;">
<label for="siluq" style="text-align:center; margin:0 auto;">Siluq </label>
<br>
<br>
<input type="radio" id="names" name="mods" value="names" style="width:20px; text-align:center; margin:0 auto;" required checked>
<label for="names" style="text-align:center; margin:0 auto;">Include Names</label>
<input type="radio" id="words" name="mods" value="words" style="width:20px; text-align:center; margin:0 auto;">
<label for="words" style="text-align:center; margin:0 auto;">Include Words</label>
<br>
<br>
<input type="submit" name="submit" value="Submit">
</form>
<div id="gUMArea">
<h2>Record:</h2>
<input type="radio" name="media" value="video" checked id="mediaVideo" style="font-size: 1505;">Video
<input type="radio" name="media" value="audio" style="font-size: 1505;">Audio

<button class="btn btn-primary"  id="gUMbtn">Grant permission to use mic and camera</button>
</div>
<div id="btns">
<button  class="btn btn-primary" id="start">Start Recording</button>
<button  class="btn btn-primary" id="stop">Stop Recording</button>
</div>
</div>
</div>
<ul  class="list-unstyled" id="ul"></ul>
<script src="recordAudio.js"></script>

</form>

<?php
$merkha = $_POST['merkha'];

$tipeha = $_POST['tipeha'];

$siluq = $_POST['siluq'];

$mods = $_POST['mods'];

$number = 1;

if ($mods == 'names') {
	$names_array = ["merkha", "tipeha", "siluq"];
}
if (empty($merkha) && empty($tipeha) and empty($siluq)) {
	  echo "<h3 style='text-align: center; font-size: 500%'>Please select at least one trope mark!</h3>";

}
$tropes = "";
if (!empty($merkha)) {
        $merkha =  "  ֥";
        $tropes .= str_repeat($merkha . $names_array[0], $number);
}
if (!empty($tipeha)) {
        $tipeha = "  ֖";
        $tropes .= str_repeat($tipeha . $names_array[1], $number);
}
if (!empty($siluq)) {
	$siluq = " ֽ";
	$tropes .= str_repeat($siluq . $names_array[2], $number);
}
$tropes_array = explode(" ", $tropes);
if ($mods == 'names') {
foreach ($tropes_array as $trope) {
	if ($trope != "" && $mods != 'words') {
		$tropeMark = mb_substr($trope, 0, 1);
		$tropeName = mb_substr($trope, 1);
		echo "<div class='encompassing_div'>";
		echo "<h1 style='text-align: center; font-size: 500%'>$tropeName</h1>";
		echo "<div class='trope_div'>";
		echo "<h1 style='text-align: center; font-size: 500%'>$tropeMark</h1>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
	}


}}
if ($mods == 'words') {
	echo "<div class='encompassing_div'>";
}

$ultimatePhrase = "";
$ultimateTimes = 0;
foreach ($tropes_array as $trope) {
	if ($trope != "" && $mods == 'words') {
		$tropeMark = mb_substr($trope, 0, 1);
		//echo "<h1 style='text-align: center; font-size: 500%'>$trope</h1>";
		$books = ["Genesis", "Exodus", "Leviticus", "Numbers", "Deuteronomy"];
		shuffle($books);
		$tropeWordsFile = fopen("/mnt/volume_sfo2_01/Sefaria-Export/json/Tanakh/Torah/$books[0]/taamei_tanakh.json", "r") or die ("Unable to open file!");
		$tropeWords = fread($tropeWordsFile,filesize("/mnt/volume_sfo2_01/Sefaria-Export/json/Tanakh/Torah/$books[0]/taamei_tanakh.json"));
		$tropeWords = (string) $tropeWords;
		$tropeArray = explode(",", $tropeWords);
		shuffle($tropeArray);
			foreach ($tropeArray as $phrase) {
				if (strpos($phrase, $tropeMark) != false) {
					  $quotationMark = '"';
					  $leftBracket = "[";
					  $rightBracket = "]";
					  $textText = "text";
                                          $phrase = str_replace($quotationMark, "", $phrase);
					  $phrase = str_replace($leftBracket, "", $phrase);
					  $phrase = str_replace($rightBracket, "", $phrase);
					  $phrase = str_replace($textText, "", $phrase);
					  $phraseChunks = preg_split("/\s/u", $phrase);
					  foreach ($phraseChunks as $phraseChunk) {
						if (mb_strpos($phraseChunk, $tropeMark) != false && $tropeMark == trim("  ֥")) {
						
							$phraseChunk = "<span style='background-color:#FF00FF'>$phraseChunk</span>";} elseif (mb_strpos($phraseChunk, $tropeMark) != false && $tropeMark == trim("   ֖")) {

                                                        $phraseChunk = "<span style='background-color:#FFFF00'>$phraseChunk</span>";} elseif (mb_strpos($phraseChunk, $tropeMark) != false && $tropeMark == trim(" ֽ")) {

                                                        $phraseChunk = "<span style='background-color:#00FF00'>$phraseChunk</span>";}
						$ultimatePhrase .= $phraseChunk;
						$ultimatePhrase .= " ";
						$ultimatePhrase .= "\n\n";
									

							}

					  $ultimateTimes += 1;
                                          if ($ultimateTimes == 3 ) { echo "<h1 style='text-align: center; font-size: 500%'>$ultimatePhrase</h1>"; }
							break;
$ultimatePhrase = "";
				}
				break;
				
			}	
	}
}



?>



</body>
</html>
