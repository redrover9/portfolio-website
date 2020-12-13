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
 <title>Torah App</title>
 <div class='some-page-wrapper'>
<style>
 body {background-color: powderblue;   font-family: Arial, Helvetica, sans-serif;
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
 <select name="parasha" id="parasha">
 <option value="Bereshit">Bereshit</option>
 <option value="Miketz">Miketz</option>
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
 <input type="submit" name="Submit" value="Submit">
 </input>
 </form>
 <form action="triennial_calendar.php" method="post" target="_blank">
 <label for="calendar">Search Triennial Calendar (Date format: dd-mmm-yyyy):</label>
 <input type="search" id="searchTri" name="search">
 <input type="submit" name="Submit" value="Submit">
 </form>
<br>
 <form action="annual_calendar.php" method="post" target="_blank">
<label for="calendar">Search Annual Calendar (Date format: dd-mmm-yyyy):</label>
  <input type="search" id="searchAn" name="search">
 <input type="submit" name="Submit" value="Submit">
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
    <script src="recordAudio.js"></script>
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
 //$chTri = fopen("triennial_calendar.csv", "r");
 //$chAn = fopen("annual_calendar.csv", "r");
 //$header_row_an = fgetcsv($chAn);
 //$header_row_tri = fgetcsv($chTri);
 
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
 elseif ($parasha == 'Miketz' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.1-4';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.5-7';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.8-14';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.15-24';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.25-38';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Genesis.41.39-52';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'One') {
	   $verses = 'Numbers.7.42-47';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.41.53-57';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.42.1-5';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.42.6-18';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.42.19-28';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.42.29-38';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.43.1-7';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'Two') {
	   $verses = 'Genesis.43.8-15';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '1' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.43.16-18';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '2' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.43.19-25';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '3' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.43.26-29';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '4' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.43.30-34';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '5' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.44.1-6';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '6' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Genesis.44.7-15';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '7' && $cycle == 'Triennial' && $year == 'Three') {
	   $verses = 'Numbers.28.9-15';
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
  elseif ($parasha == 'Miketz' && $aliyah == '1' && $cycle == 'Annual') {
	   $verses = 'Genesis.41.4-14';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '2' && $cycle == 'Annual') {
	   $verses = 'Genesis.41.15-38';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '3' && $cycle == 'Annual') {
	   $verses = 'Genesis.41.39-52';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '4' && $cycle == 'Annual') {
	   $verses = 'Genesis.41.52-42.18';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '5' && $cycle == 'Annual') {
	   $verses = 'Genesis.42.19-43.15';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '6' && $cycle == 'Annual') {
	   $verses = 'Genesis.43.16-43.29';
	    }
  elseif ($parasha == 'Miketz' && $aliyah == '7' && $cycle == 'Annual') {
	   $verses = 'Genesis.43.30-44.17';
	    }

$curlUrl = 'http://www.sefaria.org/api/texts/' . $verses . '?context=0&commentary=' . $commentary;
  curl_setopt($ch, CURLOPT_URL, $curlUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   $data = curl_exec($ch);
    $array = json_decode($data, true);
    $hebrew = $array['he'];
     $english = $array['text'];
	$commentaryText = $array['commentary']['0']['0']['text'];
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
           $etnahta = " ֑";
                $etnahta = trim($etnahta);
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
 echo '<div style="font-size: 15pt">'. $commentaryText . '</div>';
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


