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
                               <label for="parshiyot">Select a parasha:</label>
                                       <select name="parasha" id="parasha">
                                                               <option value="Bereshit">Bereshit</option>
                                                                               <option value="Noach">Noach</option>
                                                                                               <option value="Lech Lecha">Lech Lecha</option>
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

                                                   <input type="submit" name="Submit" value="Submit">

						 </input>
	  </select>
               </form>
               <?php
               $ch = curl_init();
               $parasha = $_POST['parasha'];
               $aliyah = $_POST['aliyah'];
               if ($parasha == 'Bereshit' && $aliyah == '1') {
                               $verses = 'Genesis.1.1-2.3';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '2') {
                               $verses = 'Genesis.2.4-19';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '3') {
                               $verses = 'Genesis.2.20-3.21';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '4') {
                               $verses = 'Genesis.3.22-4.18';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '5') {
                               $verses = 'Genesis.4.19-22';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '6') {
                               $verses = 'Genesis.4.23-5.24';
               }
               elseif ($parasha == 'Bereshit' && $aliyah == '7') {
                               $verses = 'Genesis.5.25-6.8';
               }
               elseif ($parasha == 'Noach' && $aliyah == '1') {
                               $verses = 'Genesis.6.9-22';
               }
               elseif ($parasha == 'Noach' && $aliyah == '2') {
                               $verses = 'Genesis.7.1-16';
               }
               elseif ($parasha == 'Noach' && $aliyah == '3') {
                               $verses = 'Genesis.7.17-8.14';
               }
               elseif ($parasha == 'Noach' && $aliyah == '4') {
                               $verses = 'Genesis.8.15-9.7';
               }
               elseif ($parasha == 'Noach' && $aliyah == '5') {
                               $verses = 'Genesis.9.8-17';
               }
               elseif ($parasha == 'Noach' && $aliyah == '6') {
                               $verses = 'Genesis.9.18-10.32';
               }
               elseif ($parasha == 'Noach' && $aliyah == '7') {
                               $verses = 'Genesis.11.1-32';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '1') {
                               $verses = 'Genesis.12.1-13';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '2') {
                               $verses = 'Genesis.12.14-13.4';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '3') {
                               $verses = 'Genesis.13.5-18';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '4') {
                               $verses = 'Genesis.14.1-20';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '5') {
                               $verses = 'Genesis.14.21-15.6';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '6') {
                               $verses = 'Genesis.15.7-17.6';
               }
               elseif ($parasha == 'Lech Lecha' && $aliyah == '7') {
                               $verses = 'Genesis.17.7-27';
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
               $_SESSION['heb'] = $hebrewString;
   $_SESSION['eng'] = $englishString;
?>
<?php
	          $region = 'eastus';
	          $AccessTokenUri = "https://".$region.".api.cognitive.microsoft.com/sts/v1.0/issueToken";
		     $apiKey = 'fb5158e7a2b24abab5a6fa73ae9287e2';

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
																							                                                             $text = $doc->createTextNode( $_SESSION['heb'] );
																							                                                          $prosody = $doc->createElement( "prosody" );
																							                                                           $prosody->setAttribute( "rate", "-30.00%" );
																							                                                           $text->appendChild( $prosody );
																														                                                              $voice->appendChild( $text );
																														                                                                    $root->appendChild( $voice );
																														                                                                    $doc->appendChild( $root );
																																						                                                                             $data = $doc->saveXML();

																																						                                                                             $options = array(
																																																                                                                                                    'http' => array(
																																																													                                                                                                                                   'header'  => "Content-type: application/ssml+xml\r\n" .
																																																																													                                                                                                                                                                  "X-Microsoft-OutputFormat: audio-16khz-128kbitrate-mono-mp3\r\n" .
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
?>
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

