<?php

include_once 'settings.php';

$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

function renderUsers() {

	// odpre fizično povezavo z mysql preko TCPIP
	global $link;

	// navadna string variabla ki vsebuje query
	$sql = "SELECT id, name FROM DaysOfWeek order by name desc limit 10";

	// izvede poizvedbo (query)
	$result = mysqli_query($link, $sql);

	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td> " . $row['id'] . " </td><td> " . $row['name'] . " </td></tr>";
	}

}

function render($sql) {

	global $link;

	// izvede poizvedbo (query)
	$result = mysqli_query($link, $sql);

	while ($row = mysqli_fetch_array($result)) {
		echo "<tr><td> " . $row[0] . " </td><td> " . $row[1] . " </td></tr>";
	}

}