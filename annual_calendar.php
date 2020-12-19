<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
</head>
<?php
//$chTri = fopen("triennial_calendar.csv", "r");
$chAn = fopen("annual_calendar.csv", "r");
$header_row_an = fgetcsv($chAn);
//$header_row_tri = fgetcsv($chTri);
$query = $_POST['searchAn'];
echo $query;
while($row = fgetcsv($chAn)) {
	    if (preg_grep("/$query/", $row)) {
		            echo '<div>' . implode(' | ', $row) . ' </div>';
			        }
}
?>
</html>
