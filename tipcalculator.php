<html>

<head>
<meta charset="utf-8">
<title>Tip Calculator</title>
<style>
table { border: solid 1px black;
	 }
</style>
</head>

<body>

<h1>Tip Calculator</h1>

<form action="" method="POST">
<table>
<tr>
	<td>Bill Subtotal: </td>
	<td>
	<input type="text" name="bill" onfocus="clearThis(this);" value="<?php
	if ($_POST) {
		echo $_POST['bill'];
	}
	?>">
	</td>
</tr>
<tr>
	<td>Tip Percentage: </td>
</tr>
<tr>
	<td><input type="radio" name="percent" value="ten">10%</td>
	<td><input type="radio" name="percent" value="fifteen" checked>15%</td>
	<td><input type="radio" name="percent" value="twenty">20%</td>
</tr>
<tr>
	<td><input type="submit"></td>
</tr>
<tr>
	<td>Tip: </td>
	<td><?php
	if ($_POST) {
		echo "$".tip($_POST['bill']);
	}
	else {
		echo "";
	}
	?>
	</td>	
</tr>
<tr>
	<td>Total: </td>
	<td><?php
	if ($_POST) {
		echo "$".total($_POST['bill']);
	}
	else {
		echo "";
	}
	?>
	</td>	
</tr>
</table>
</form>

<?php
if(isset($_POST['submit'])) {
	if (isset($_POST['percent'])) {
		$percent = $_POST['percent'];
	}
}
?>

<?php
function tip ($bill) {
	if ($_POST['percent'] == "ten") {
		return number_format($bill*0.1, 2, '.', '');
	}
	else if ($_POST['percent'] == "fifteen") {
		return number_format($bill*0.15, 2, '.', '');
	}
	else if ($_POST['percent'] == "twenty") {
		return number_format($bill*0.2, 2, '.', '');
	}
}
?>

<?php
function total($bill) {
	return number_format(tip($bill)+$bill, 2, '.', '');
}
?>

<script>
function clearThis(src) {
    src = document.getElementsByName("bill").value="";
}
</script>

</body>
</html>