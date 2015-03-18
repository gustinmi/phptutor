<!DOCTYPE html> <html> <head> <title>Prva stran</title> </head> <body>
<?php

// polja
$dneviTeden = array("Pon", "Tor", "Sre");
$velikost = count($dneviTeden);

$barva = "red";

$vrstaHtml = "<div style=\"background-color: %s \"> %s </div>";

// pozicija; pogojZa izstop; kako ga povečujemo
for ($i = 0; $i < $velikost; $i = $i + 1) {
	echo sprintf($vrstaHtml, $barva, $dneviTeden[$i]);
}

?>
</body>
</html>