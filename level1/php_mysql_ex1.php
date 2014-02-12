<?php  //this designates PHP code block. 

// Constants definition. You access it by name only. For example DB_SERVER 
define("DB_SERVER", "127.0.0.1:3306");
define("DB_USER", "phptut");
define("DB_PASS", "p");
define("DB_NAME", "phptut");

//We record the begin timestamp in microseconds
$startTime = MicroTime ( true );

//get some diagnostic info
echo memory_get_usage();

//We try to connect to database
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//if not connected, we exit script ( die == exit)
if (!$link) {
    die('Connect Error: ' . mysqli_connect_error());
}

//echo some db info
echo mysqli_get_host_info(link) . "\n";

//create query (just a text)
$query = "SELECT id, name FROM items";

//get the result (it will be associative array)
$result = mysqli_query($link, $query);

//get error message with query

//¨check the result set.. colud be empty 
if (mysqli_num_rows($result) < 1) {
    die('empty table... nothing to print'); 
}

for ($x=0; $x<=count($result); $x++)
{
	$row = mysqli_fetch_array($result)
	echo $row['id'] . ', ' . $row['name'] . "\n"; 
} 

echo memory_get_usage();

//free the memory immediately
mysqli_free_result($result);

echo memory_get_usage();

//close the link explicitely
mysqli_close($link);

//we are finished. get the timestamp now
$endTime = MicroTime ( true );

//print difference end -beginning
echo ' EXEC_TIME ' . Number_Format ( $endTime - $startTime, 50 );

?>