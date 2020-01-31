<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="ajax.js"></script>
	<!---<link rel="stylesheet" href="style.css">-->
</head>
<html>
<body onload="list()">
	<div style="border: 1px solid black; padding: 2%; margin: 2%">
		<h1>Felvétel űrlap</h1>
		<input type="number" id="input_ar" placeholder="Ár"><br /><br />
		<input type="text" id="input_tipus" placeholder="Típus"><br /><br />
		<input type="text" id="input_marka" placeholder="Márka"><br /><br />
		<input type="date" id="input_gyartasiIdo" placeholder="Gyártási idő"><br /><br />
		<button onclick="insert()">Felvétel</button>
	</div>
	<div id="muvelet"></div>
	<h2>Felhasználók</h2>
	<button type="button" onclick="list()">Frissítés</button>
	<div id="tartalom"></div>
</body>
</html>