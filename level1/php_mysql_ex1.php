<?php  //this designates PHP code block. 

require('const.sql.php');

//We record the begin timestamp in microseconds
$startTime = MicroTime ( true );

//get some diagnostic info
echo "Memory used: " . memory_get_usage() ."\n";

//We try to connect to database
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//if not connected, we exit script ( die == exit)
if (!$link) {
    die('Connect Error: ' . mysqli_connect_error());
}

//echo some db info
echo "Connected to: " . mysqli_get_host_info($link) . "\n";

//create query (just a text)
$query = "SELECT id, name FROM items";

//get the result (it will be associative array)
$result = mysqli_query($link, $query);



//get error message with query

//¨check the result set.. colud be empty 
if (mysqli_num_rows($result) < 1) {
    die('empty table... nothing to print'); 
}

 $rowCount = mysqli_num_rows($result);

for ( $x=0; $x < rowCount; $x++)
{
	$row = mysqli_fetch_array($result);
	echo $row['id'] . ', ' . $row['name'] . "\n"; 
} 

echo "Memory used: " . memory_get_usage() . "\n";

//free the memory immediately
mysqli_free_result($result);

echo "Memory used: " . memory_get_usage() ."\n";

//close the link explicitely
mysqli_close($link);

//we are finished. get the timestamp now
$endTime = MicroTime ( true );

//print difference end -beginning
echo ' EXEC_TIME ' . ($endTime - $startTime) . "\n";

?>
