<?php
//check if error flag is in URL
$errMsg = '';
if (isset($_GET['errId'])){
	$errId = urldecode($_GET["errId"]);
	if (!empty($errId)){
		switch ($errId) {
		    case 1:
		        $errMsg = 'Napačno geslo';
		        break;
		    case 2:
		        $errMsg = 'Napačno ime';
		        break;
		    case 3:
		        $errMsg = "Seja je potekla. Prijavite se ponovno.";
		        break;
		     default:
       			$errMsg = "Neznana napaka";    
       			break;
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Prijava</title>
		<link rel="stylesheet" href="mojstil.css" type="text/css" />
	</head>
	<body>
		<?php if ( !empty($errMsg) ): ?>
			<div class="error"><?php echo $errMsg ?></div>
		<?php endif ?>
		<div id="login">
			<form action="dologin.php" method="post">
				<div class="row">
				    <label class="col" for="ime">Ime</label>
				    <input class="col" id="ime" name="txtName" type="text" />
				</div>
				<div class="row">
					<label class="col" for="geslo">Geslo</label>
					<input class="col" id="geslo" name="txtPassword" type="password" />
				</div>
				<div class="row">
					<input id="register" name="btnLogin" type="submit" value="Prijava" />
				</div>
			</form>
		<div>
	</body>
</html>
