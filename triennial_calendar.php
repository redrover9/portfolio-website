<!DOCTYPE html>
<html>
<style>
 body {background-color: powderblue;   font-family: Arial, Helvetica, sans-serif;
}
</style>
<?php
$chTri = fopen("triennial_calendar.csv", "r");
//$chAn = fopen("annual_calendar.csv", "r");
//$header_row_an = fgetcsv($chAn);
$header_row_tri = fgetcsv($chTri);
$query = $_POST['searchTri'];
echo $query;
while($row = fgetcsv($chTri)) {
            if (preg_grep("/$query/", $row)) {
                            echo '<div>' . implode(' | ', $row) . ' </div>';
                                }
}
?>
</html>

