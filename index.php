<table><tbody>
<?php

require_once 'config.php';

# link na bazo
$persConn = mysqli_connect(MYSQL_SERVER, USER, PASSWD, DBNAME);

# naredit query
$q = mysqli_query($persConn, "select * from items");

# prebrati vrstico po vrstico iz rezultata querya
# gre za buffered db reader 

while($row = mysqli_fetch_array($q)){
	
	echo '<tr><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td></tr>';
	
}
?>
</tbody>
</table>