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
width: 500px;
border: 15px solid blue;
padding: 10px;
margin: auto;
text-align: center;
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
<form action="/trope.php" method="post" style="margin: auto; text-align: center;">
<input type="checkbox" id="merkha" name="merkha" value="merkha" style="width:20px; text-align:center; margin:0 auto;">
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha </label>
<input type="checkbox" id="tipeha" name="tipeha" value="tipeha" style="width:20px; text-align:center; margin:0 auto;">
<label for="tipeha" style="text-align:center; margin:0 auto;">Tipeha </label>
<input type="checkbox" id="siluq" name="siluq" value="siluq" style="width:20px; text-align:center; margin:0 auto;">
<label for="siluq" style="text-align:center; margin:0 auto;">Siluq </label>
<br>
<br>
<input type="radio" id="names" name="mods" value="names" style="width:20px; text-align:center; margin:0 auto;">
<label for="names" style="text-align:center; margin:0 auto;">Include Names</label>
<input type="radio" id="words" name="mods" value="words" style="width:20px; text-align:center; margin:0 auto;">
<label for="words" style="text-align:center; margin:0 auto;">Include Words</label>
<br>
<br>
<input type="submit" name="submit" value="Submit">
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
shuffle($tropes_array);
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
foreach ($tropes_array as $trope) {
	if ($trope != "" && $mods == 'words') {
		$tropeMark = mb_substr($trope, 0, 1);
		$books = ["Genesis", "Exodus", "Leviticus", "Numbers", "Deuteronomy"];
		shuffle($books);
		$tropeWordsFile = fopen("/var/www/html/Sefaria-Export/json/Tanakh/Torah/$books[0]/Hebrew/taamei_tanakh.json", "r") or die ("Unable to open file!");
		$tropeWords = fread($tropeWordsFile,filesize("/var/www/html/Sefaria-Export/json/Tanakh/Torah/$books[0]/Hebrew/taamei_tanakh.json"));
		$tropeWords = (string) $tropeWords;
		$tropeArray = explode(",", $tropeWords);
					$tropesDisplayed = 0;
			foreach ($tropeArray as $phrase) {
				$phraseArray = explode(" ", $phrase);
				foreach ($phraseArray as $phraseString ) {
					if (strpos($phraseString, $tropeMark) != false && $tropesDisplayed <= $number) {
					  echo "<div class='encompassing_div'>";
					  $quotationMark = '"';
					  $phraseString = str_replace($quotationMark, "", $phraseString);
					  echo "<h1 style='text-align: center; font-size: 500%'>$phraseString</h1>";
					  echo "</div>";
					                                  echo "<br>";
                                echo "<br>";
                                echo "<br>";
                                echo "<br>";
                                $tropesDisplayed += 2;

					}
				}
			}	
	}
}


?>



</body>
</html>
