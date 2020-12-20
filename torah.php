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
.left-column {
<?php
if ($layout == 'tikkun'){
echo "font-family: chumash;";
} elseif ($layout == 'stam') {
        echo "font-family: stam;";
}?>
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
margin-right: 20px;
width: auto;
float: left;

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
margin-right: 20px;
width: auto;
float: left;

}
.right {
float: right;
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
<input class="form-control" placeholder="Bereshit" type="text" id="parasha" name="parasha" cols="5" width="30px" required>
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
<option value="maf">Maftir Aliyah</option>
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
<option value="No">No</option>
<option value="Yes">Yes</option>
</select>
<label for="tropeMark">Enter trope mark(s) to highlight: </label>
<p>Pink</p>
<input class="form-control" placeholder="merkha" type="text" id="tropeMarkOne" name="tropeMarkOne" cols="5">
<p>Yellow</p>
<input class="form-control" placeholder="merkha" type="text" id="tropeMarkThree" name="tropeMarkTwo" cols="5">
<p>Green</p>
<input class="form-control" placeholder="merkha" type="text" id="tropeMarkThree" name="tropeMarkThree" cols="5">
</input>
<div class="right">
<h1>Torah Reader</h1>
<h3>Trope Trainer Replacement</h3>
</div>
<br>
<br>
<label for="layout">Select a layout: </label>
<select name="layout" id="layout">
<option value="tikkun">Tikkun with audio and translation</option>
<option value="stam">STaM with audio and translation</option>
</select>
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
<input type="submit" name="Submit" class="btn-gtr btn-primary" background-color="blue" value="Get Torah Reading">
</input> 
</form>
<form action="triennial_calendar.php" method="post" target="_blank">
<label for="searchTri">Search Triennial Calendar (Date format: dd-mmm-yyyy):</label>
<input type="search" class="form-control" placeholder="01-Jan-2020" id="searchTri" name="searchTri" >
<input type="submit" name="Submit" value="Search" class="btn btn-primary">
</form>
<br>
<form action="annual_calendar.php" method="post" target="_blank">
<label for="searchAn">Search Annual Calendar (Date format: dd-mmm-yyyy):</label>
<input type="search" id="searchAn" name="searchAn" class="form-control" placeholder="01-Jan-2020" max-width="100px" cols="10">
<input type="submit" name="Submit" value="Search" class="btn btn-primary">
<br>
</input>
</input>
</form>
<button class="btn" onclick="window.print()">Print this page</button>
<form action="https://zoom.us/meeting/schedule">
<input class="btn" type="submit" value="Schedule a Zoom meeting"/>
</form>
<div id='gUMArea'>
Record:
<input type="radio" name="media" value="video" checked id='mediaVideo'>Video
<input type="radio" name="media" value="audio">Audio

<button class="btn btn-primary"  id='gUMbtn'>Grant permission to use mic and camera</button>
</div>
<div id='btns'>
<button  class="btn btn-primary" id='start'>Start Recording</button>
<button  class="btn btn-primary" id='stop'>Stop Recording</button>
</div>
<ul  class="list-unstyled" id='ul'></ul>
<script src="recordAudio.js"></script>

</form>

<?php
$ch = curl_init();
$parasha = $_POST['parasha'];
//$parasha = preg_replace("\s", ".", $parasha);
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
        elseif ($tropeMarkOne = 'zakef gadol') {
		                $tropeMarkOne = ' ֕';
				                $tropeMarkOne = trim($tropeMarkOne);
				        }
	else { 
		$tropeMarkOne = "";
	}
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
        elseif ($tropeMarkTwo = 'zakef gadol') {
		                $tropeMarkTwo = ' ֕';
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
        elseif ($tropeMarkThree = 'zakef gadol') {
		                $tropeMarkThree = ' ֕';
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

$hebrewString = $newHebrewString;
}





//echo $newHebrewString;
?>  


</body>
</html>
<div class="row">
<div class="column">
<div class="middle-column">
<?php
if ($layout == 'tikkun'){
echo '<div style="font-size: 40pt">'. $hebrewString . '</div>';
} else {
echo '<div style="font-size: 25pt">'. $englishString . '</div>';
}
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
<div class="left-column">
<?php
echo '<div style="font-size: 40pt">'. $hebrewString . '</div>';
?>
</div>
</div>

<div class="column">
<div class="right-column">
<?php
if ($layout == 'stam'){
echo "<audio controls>";
echo "<source src='audio/$parasha-$aliyah.mp3' type='audio/mp3'>";
echo "</audio>";
} elseif ($layout == 'tikkun'){
	echo "<audio controls>";
	echo "<source src='audio/$parasha-$aliyah.mp3' type='audio/mp3'>";
	echo "</audio>";
	echo '<div style="font-size: 25pt">'. $englishString . '</div>';
}
?>
</audio>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>

