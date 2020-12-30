<?php
$audioFiles = scandir("upload");
foreach ($audioFiles as $audioFile) {
	if (strpos($audioFile, 'mp3') != false ) {
		 
		        echo "<audio controls>";
        echo "<source src='upload/$audioFile' type='audio/mp3'>";
        echo "</audio>";
	echo basename("upload/$audioFile").PHP_EOL;

	}
	elseif (strpos($audioFile, 'ogg') != false ) {

		                        echo "<audio controls>";
        echo "<source src='upload/$audioFile' type='audio/ogg'>";
        echo "</audio>";
	echo basename("upload/$audioFile").PHP_EOL;

}}
