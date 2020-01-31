  
<?php
    include("classes.php");
	$update = new Adatbazis();
	$update->update($_GET["input_id"],$_GET["input_ar"],$_GET["input_termek"],$_GET["input_marka"],$_GET["input_gyartasiIdo"]); ?>	