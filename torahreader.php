<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Torah App</title>
 <div class='some-page-wrapper'>
<style>
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
 <form method="post">
 <label for="cycles">Select a calendar:</label>
 <select name="cycle" id="cycle">
 <option value="Annual">Annual</option>
 <option value="Triennial">Triennial</option>
 </select>
 <label for="year">Select a year in the triennial cycle:</label>
 <select name="year" id="year">
 <option value="One">One</option>
 <option value="Two">Two</option>
 <option value="Three">Three</option>
 </select>
 <label for="parshiyot">Select a parasha:</label>
 <select name="parasha" id="parasha">
 <option value="Bereshit">Bereshit</option>
 </select>
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
 <label for="highlighting">Highlighted trope marks:</label>
 <select name="highlighting" id="highlighting">
 <option value="Yes">Yes</option>
 <option value="No">No</option>
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
 <input type="submit" name="Submit" value="Submit">

 </input>
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
 if ($parasha == 'Bereshit' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.1-5';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.6-8';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.9-13';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.14-19';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.20-23';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.1.24-31';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'One') {
 $verses = 'Genesis.2.1-3';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.2.4-9';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.2.10-19';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.2.20-25';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.3.1-21';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.3.22-24';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.4.1-18';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'Two') {
 $verses = 'Genesis.4.19-26';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.1-5';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.6-8';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.9-14';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.15-20';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.21-24';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.25-31';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'Three') {
 $verses = 'Genesis.5.32-6.8';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '1' && $cycle == 'Annual') {
 $verses = 'Genesis.1.1-2.3';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '2' && $cycle == 'Annual') {
 $verses = 'Genesis.2.4-19';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '3' && $cycle == 'Annual') {
 $verses = 'Genesis.2.20-3.21';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '4' && $cycle == 'Annual') {
 $verses = 'Genesis.3.22-4.18';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '5' && $cycle == 'Annual') {
 $verses = 'Genesis.4.19-22';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '6' && $cycle == 'Annual') {
 $verses = 'Genesis.4.23-5.24';
 }
 elseif ($parasha == 'Bereshit' && $aliyah == '7' && $cycle == 'Annual') {
 $verses = 'Genesis.5.25-6.8';
 }

  curl_setopt($ch, CURLOPT_URL, 'http://www.sefaria.org/api/texts/' . $verses . '?context=0');
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
       //$hebrewString = str_replace("׃", "", $hebrewString);
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
    $text = $doc->createTextNode( $_SESSION['heb'] );
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
	 $audioFile = md5($result) . '.wav';
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
	
	foreach($hebrewLetter as $hebrewChar) {
		//$hebrewChar = "<span style='background-color:#FF00FF'>$hebrewChar</span>";     
		//echo mb_ord($hebrewChar);
		//echo "<br>";
		//echo $hebrewChar;
	//echo "<br>";
	}
	$merkha = ' ֥ ';
		$merkha = trim($merkha);
	if (strpos($hebrewWord, $merkha) != false) {
		$hebrewWord = "<span style='background-color:#FF00FF'>$hebrewWord</span>";
		//echo $hebrewWord;
		//echo '<br>';
		$newHebrewString .= $hebrewWord;
		$newHebrewString .= " ";
	} else {
//echo $hebrewWord;
//echo '<br>';
$newHebrewString .= $hebrewWord;
$newHebrewString .= " ";
}
}
$hebrewString = $newHebrewString;
//echo $newHebrewString;
}
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


