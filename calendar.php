<?php
$ch = fopen("calendar.csv", "r");
$header_row = fgetcsv($ch);
$query = $_POST['search'];
echo $query;
while($row = fgetcsv($ch)) {
	    if (preg_grep("/$query/", $row)) {
		            echo '<div>' . implode(' | ', $row) . ' </div>';
			        }
}
?>
