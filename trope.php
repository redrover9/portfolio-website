<!DOCTYPE html>
<html>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="main.550dcf66.css?v=<?php echo time(); ?>">
<title>
Trope Practice
</title>
<h1>
Trope Practice
</h1>
</head>
<body>
<form action="/trope.php" method="post">
<input type="checkbox" id="merkha" name="merkha" value="merkha" style="width:20px; text-align:center; margin:0 auto;">
<label for="merkha" style="text-align:center; margin:0 auto;">Merkha </label>
<input type="checkbox" id="tipeha" name="tipeha" value="tipeha" style="width:20px; text-align:center; margin:0 auto;">
<label for="tipeha" style="text-align:center; margin:0 auto;">Tipeha </label>
<input type="checkbox" id="siluq" name="siluq" value="siluq" style="width:20px; text-align:center; margin:0 auto;">
<label for="siluq" style="text-align:center; margin:0 auto;">Siluq </label>
<br>
<br>
<input type="checkbox" id="names" name="names" value="names" style="width:20px; text-align:center; margin:0 auto;">
<label for="names" style="text-align:center; margin:0 auto;">Include Names</label>
<input type="submit" name="submit" value="Submit">
</form>
<?php
$merkha = $_POST['merkha'];

$tipeha = $_POST['tipeha'];

$siluq = $_POST['siluq'];

$names = $_POST['names'];

if (!empty($names)) {
	$names_array = ["merkha", "tipeha", "siluq"];
}

$tropes = "";
if (!empty($merkha)) {
        $merkha =  "  ֥\n";
        $tropes .= str_repeat($merkha . $names_array[0], 5);
}
if (!empty($tipeha)) {
        $tipeha = "  ֖\n";
        $tropes .= str_repeat($tipeha . $names_array[1], 5);
}
if (!empty($siluq)) {
	$siluq = " ֽ\n";
	$tropes .= str_repeat($siluq . $names_array[2], 5);
}
$tropes_array = explode(" ", $tropes);
shuffle($tropes_array);
foreach ($tropes_array as $trope) {
	echo "<h1 style='text-align: center; font-size: 500%'>$trope</h1>";
	echo "<br>";
	echo "<br>";
	echo "<br>";


}
?>



</body>
</html>
