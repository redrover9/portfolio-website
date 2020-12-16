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

</script>
";
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<head>
<title>Torah Reader</title>
<div class='some-page-wrapper'>

<style>
@font-face {
	font-family: stam;
	src: url(ShlomoStam.ttf);
}
body {background-color: powderblue;   font-family: stam, Arial, Helvetica, sans-serif;
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
}

.double-column {
display: flex;
flex-direction: column;
flex-basis: 100%;
flex: 2;
}

.triple-column {
display: flex;
flex-direction: column;
flex-basis: 100%;
flex: 3;
}
.hebrew-column {

}

.english-column {

}
.audio-player {

}
</style>
</div>
</head>
<body>
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
<label for="parshiyot">Select a parasha:</label>
<input type="text" id="parasha" name="parasha" required>
</input> 
<label for="aliyot">Select an aliyah:</label>
<select name="aliyah" id="aliyah">
<option value="1">First Aliyah</option>
<option value="2">Second Aliyah</option>
<option value="3">Third Aliyah</option>
<option value="4">Fourth Aliyah</option>
<option value="5">Fifth Aliyah</option>
<option value="6">Sixth Aliyah</option>
<option value="7">Seventh Aliyah</option>
</select>
<label for="commentary">Include commentary</label>
<select name="commentary" id="commentary">
<option value="0">No</option>
<option value="1">Yes</option>
</select>
<br>
<br>
<label for="highlighting">Highlighted trope marks:</label>
<select name="highlighting" id="highlighting">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
<label for="tropeMark">Enter a trope mark to highlight: </label>
<input type="text" id="tropeMark" name="tropeMark">
<br>
<br>
<label for="speed">Speed:</label>
<select name="speed" id="speed">
<option value="x-slow">Extra Slow</option>
<option value="slow">Slow</option>
<option value="medium">Medium</option>
<option value="fast">Fast</option>	
</select>
<label for="pitch">Pitch:</label>
<select name="pitch" id="pitch">
<option value="-10st">Extra Low</option>
<option value="-5st">Low</option>
<option value="default">Medium</option>
<option value="+5st">High</option>
<option value="+10st">Extra High</option>
</select>
<br>
<br>
<input type="submit" name="Submit" value="Get Torah Reading">
</input> 
</form>
<form action="triennial_calendar.php" method="post" target="_blank">
<label for="searchTri">Search Triennial Calendar (Date format: dd-mmm-yyyy):</label>
<input type="search" id="searchTri" name="searchTri">
<input type="submit" name="Submit" value="Search">
</form>
<br>
<form action="annual_calendar.php" method="post" target="_blank">
<label for="searchAn">Search Annual Calendar (Date format: dd-mmm-yyyy):</label>
<input type="search" id="searchAn" name="searchAn">
<input type="submit" name="Submit" value="Search">
<br>
</input>
</input>
</form>

<button onclick="window.print()">Print this page</button>
<br>
<br>

<div id='gUMArea'>
<div>
Record:
<input type="radio" name="media" value="video" checked id='mediaVideo'>Video
<input type="radio" name="media" value="audio">Audio
</div>
<br>
<br>
<button class="btn btn-default"  id='gUMbtn'>Grant permission to use mic and camera</button>
</div>
<div id='btns'>
<button  class="btn btn-default" id='start'>Start Recording</button>
<button  class="btn btn-default" id='stop'>Stop Recording</button>
</div>
<div>
<ul  class="list-unstyled" id='ul'></ul>
</div>
<script src="recordAudio.js"></script><br>
<br>
<form action="https://zoom.us/meeting/schedule">
<input type="submit" value="Schedule a Zoom meeting"/>
</form>
<?php
$ch = curl_init();
$parasha = $_POST['parasha'];
$aliyah = $_POST['aliyah'];
$cycle = $_POST['cycle'];
$year = $_POST['year'];
$highlighting = $_POST['highlighting'];
$speed = $_POST['speed'];
$pitch = $_POST['pitch'];
$tropeMark = $_POST['tropeMark'];
$commentary = $_POST['commentary'];
if ($cycle == 'Triennial') {
	$chTri = fopen("triennial_calendar.csv", "r");
	$triMatches = [];
	while ($row = fgetcsv($chTri)) {
		         $row = '<div>' . implode(' ', $row) . ' </div>'; 
			 array_push($triMatches, $row);
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
	echo $verses;
}
elseif ($cycle == 'Annual') {
$chAn = fopen("annual_calendar.csv", "r");
$anMatches = [];
while($anRow = fgetcsv($chAn)) {
	 $anRow = '<div>' . implode(' ', $anRow) . ' </div>'; 
	 array_push($anMatches, $anRow);
}
$anMatch = (preg_grep("/.*$parasha\s$aliyah.*/", $anMatches));	 
$anMatch = implode($anMatch);
$anVersesArray = array();
$anRegexVersesMatches = array();
preg_match("/[A-Z][a-z]*\s\d*:\d*\s-\s\d*:\d*/", $anMatch, $anVersesArray);
$anVerseString = implode($anVersesArray);
$verses = str_replace(":", ".", $anVerseString);
$verses = str_replace(" - ", "-", $verses);
$verses = str_replace(" ", ".", $verses);
$anRegexVerses = preg_replace("/\./", "-", $verses, 1);
preg_match_all("/-\d*/", $anRegexVerses, $anRegexVersesMatches);
$firstElement = $anRegexVersesMatches[0][0];
$secondElement= $anRegexVersesMatches[0][1];
preg_match("/\d/", $yaString, $elements);

if ($firstElement == $secondElement) {
	$verses = preg_replace("/-\d*\./", "-", $verses);
}
echo $verses;
}
$commNum = '0';
$curlUrl = 'http://www.sefaria.org/api/texts/' . $verses . '?context=0&commentary=' . $commentary;
curl_setopt($ch, CURLOPT_URL, $curlUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$array = json_decode($data, true);
$hebrew = $array['he'];
$english = $array['text'];
$commentaryText = $array['commentary']['0'][$commNum]['text'];
$commentarySource = $array['commentary']['0'][$commNum]['sourceRef'];
while (empty($commentaryText) && $commNum < 20) {
$commNum += 1;
	$commentaryText = $array['commentary']['0'][$commNum]['text'];
$commentarySource = $array['commentary']['0'][$commNum]['sourceRef'];

}
if ($commentary == 1 && empty($commentaryText)){
$commentaryText = $array['commentary'][$commNum]['text'];
$commentarySource = $array['commentary'][$commNum]['sourceRef'];
while (empty($commentaryText) && $commNum < 40) {
	                $commNum += 1;
			$commentaryText = $array['commentary'][$commNum]['text'];
			 $commentarySource = $array['commentary'][$commNum]['sourceRef'];

	     }}
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
//$hebrewString = str_replace("׃", "", $hebrewString);
$hebrewString = str_replace('b', '', $hebrewString);
$hebrewString = str_replace('r', '', $hebrewString);
$hebrewString = str_replace('<', '', $hebrewString);
$hebrewString = str_replace('>', '', $hebrewString);

$_SESSION['heb'] = $hebrewString;
$_SESSION['eng'] = $englishString;
?>
<?php

	$region = 'eastus';
	$AccessTokenUri = "https://".$region.".api.cognitive.microsoft.com/sts/v1.0/issueToken";
	$apiKey = '0e1e79d9fbdb4e01b851fdafee6f6c0f';

$options = array(
'http' => array(
'header'  => "Ocp-Apim-Subscription-Key: ".$apiKey."\r\n" .
"content-length: 0\r\n",
'method'  => 'POST',
),
);

$context  = stream_context_create($options);

$access_token = file_get_contents($AccessTokenUri, false, $context);

if (!$access_token) {
throw new Exception("Problem with $AccessTokenUri, $php_errormsg");
}
else{

$ttsServiceUri = "https://".$region.".tts.speech.microsoft.com/cognitiveservices/v1";

$doc = new DOMDocument();

$root = $doc->createElement( "speak" );
$root->setAttribute( "version" , "1.0" );
$root->setAttribute( "xml:lang" , "he-IL" );

$voice = $doc->createElement( "voice" );
$voice->setAttribute( "xml:lang" , "he-IL" );
$voice->setAttribute( "xml:gender" , "Male" );
$voice->setAttribute( "name" , "he-IL-Asaf"); 
$prosody = $doc->createElement( "prosody" );
$prosody->setAttribute( "rate", $speed );
$prosody->setAttribute( "pitch", $pitch );
$text = $doc->createTextNode( $hebrewString );
$prosody->appendChild( $text );
$voice->appendChild( $prosody );
$root->appendChild( $voice );
$doc->appendChild( $root );
$data = $doc->saveXML();

$options = array(
'http' => array(
'header'  => "Content-type: application/ssml+xml\r\n" .
"X-Microsoft-OutputFormat: riff-24khz-16bit-mono-pcm\r\n" .
"Authorization: "."Bearer ".$access_token."\r\n" .
"X-Search-AppId: 07D3234E49CE426DAA29772419F436CA\r\n" .
"X-Search-ClientID: 1ECFAE91408841A480F00935DC390960\r\n" .
"User-Agent: TTSPHP\r\n" .
"content-length: ".strlen($data)."\r\n",
'method'  => 'POST',
'content' => $data,
),
);

$context  = stream_context_create($options);

$result = file_get_contents($ttsServiceUri, false, $context);
if (!$result) {
throw new Exception("Problem with $ttsServiceUri, $php_errormsg");
}
else{
	 $torahAudio = glob("*.wav");
	  rename($torahAudio[0], './torah.wav');
	  $status = file_put_contents('./' . 'torah.wav', $result);

}
}
if ($highlighting == "Yes") {
$newHebrewString = "";
$hebrewArray = explode(" ", $hebrewString);
foreach ($hebrewArray as $hebrewWord) {
$hebrewLetter = preg_split('//u', $hebrewWord, -1, PREG_SPLIT_NO_EMPTY);
if ($tropeMark == 'merkha') {
$tropeMark = ' ֥';
$tropeMark = trim($tropeMark);
}
	elseif ($tropeMark == 'etnahta') {
		$tropeMark = ' ֑';
		$tropeMark = trim($tropeMark);
	}
	elseif ($tropeMark == 'segol') {
		$tropeMark = ' ֒';
		$tropeMark = trim($tropeMark);
	}
	elseif ($tropeMark == 'shalshelet') {
		$tropeMark = ' ֓';
		$tropeMark = trim($tropeMark);
	}
	elseif ($tropeMark == 'zakef qatan') {
		$tropeMark = ' ֔';
		$tropeMark = trim($tropeMark);
	}
	elseif ($tropeMark = 'zakef gadol') {
		$tropeMark = ' ֕';
		$tropeMark = trim($tropeMark);
	}
if (strpos($hebrewWord, $tropeMark) != false) {
$hebrewWord = "<span style='background-color:#FF00FF'>$hebrewWord</span>";
//echo $hebrewWord;
//echo '<br>';
$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";
	}
	        else {

//echo $hebrewWord;
//echo '<br>';
$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";

}


$hebrewString = $newHebrewString;
}}
//echo $newHebrewString;
?>  


</body>
</html>
<div class="row">
<div class="column">
<div class="hebrew-column">
<?php
echo '<div style="font-size: 50pt">'. $hebrewString . '</div>';
?>
</div>
</div>
<div class="column">
<div class="english-column">
<?php
echo '<div style="font-size: 35pt">'. $englishString . '</div>';
if (!empty($commentaryText)){
	 echo '<div style="font-size: 15pt">'. $commentarySource . '</div>';
echo '<div style="font-size: 15pt">'. $commentaryText . '</div>';
} elseif (empty($commentaryText) && $commentary == 1) {
	 echo "Commentary not found for selected range.";
}
?>

</div>
</div>
<div class="column">
<div class="audio-player">
<audio controls>
<source src="torah.wav" type="audio/wav">
</audio>
</div>
</div>
</div>
</body>
</html>

