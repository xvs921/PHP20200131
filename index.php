<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<html>
<body onload="list()"style="background-color: #FFD2AD">


	<div style="padding: 2%; margin-left:40%">
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