<?php

include_once 'database.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>DaysEditor</title>
	<style type="text/css">
	html, body { width: 100%; height: 100%; color: white; padding: 0; margin: 0; }
	table, td, th {
		border: 1px solid black;
	}
	table tr {
		transition: all ease 0,3s;
	}
	table th{
		color: red;
		background-color: green;
	}
	table tr:hover {
		background-color: white;
		color: black;
	}
	div {
		padding: 5px;
		text-align: center;
		font-size: 24px;
	}
	#main {
		min-height: 500px;
		background-color: green;
	}
	</style>
</head>
<body>
<div style="background-color: grey;">header</div>
<div id="main">

<table style="width: 100%;">
<caption>Days of week</caption>
<thead>
	<tr><th>Number</th><th>Name</th></tr>
</thead>
<tbody>
<?php

renderUsers();

?>
<tfoot>
	<tr><th>Number</th><th>Name</th></tr>
</tfoot>
</tbody>
</table>


</div>
<div style="background-color: grey;">footer</div>

</body>
</html>