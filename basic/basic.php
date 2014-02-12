<?php


//===============   constants

define("GREETING", "Welcome to LAMP!");
echo GREETING;

//================================  VARIABLES
$myVar = 'abc';
var_dump($myVar); //dump variable
var_dump(array(1,2,3)); //dump array or object
isset($myVar); //does varible point to any value
empty($myVar); //is varible empty ( null )

//=====     working with text

// simple text variable
$someText = 'abc';

// concatening string Option 1 (operator dot .)
$someOtherText = $someText . 'def'; 

// concatening string Option 2 (magic quotes)
$someOtherText2 = "$someText def"; 

echo $someText . ' ' . $someOtherText . ' ' . $someOtherText2 . "\n";

//======  numbers

$first = 10;
$second = 20;
$third = "20";

echo $first + $second + $third . "\n";

$decimal = 10.365;
$isOk=true;

//==========  date

//		    mktime(hour,minute,second,month,day,year,is_dst)

echo date("Y-m-d");
$tomorrow = mktime( 0, 0, 0, date("m"), date("d")+1, date("Y"));
echo "Tomorrow is " . date("Y/m/d", $tomorrow);

//========  ARRAY

$lampArray=array("apache2","mysql","php5");  //index array
print_r($lampArray);

$lampArray[] = "linux";   //add another element
echo 'Items in $lampArray' . count($lampArray);

$multiDimArray=array(  //multi dimensional indexed array
	array("apache2","mod_php"),
	array("mysql-server","mysql-client"),
	array("php5","php5-mysql")
);  
print_r($multiDimArray);

$lampDict=array("first"=>"apache2","second"=>"mysql","third"=>"php5"); //associative array
print_r($lampDict);

$mixedArray=array(  //multi dimensional mixed indexed array
	"server" => array("apache2","mod_php"),
	"database" => array("mysql-server","mysql-client"),
	"programming" => array("php5","php5-mysql")
);  
print_r($mixedArray);
print_r($mixedArray['server']);



//================================  STATEMENTS

$num = 10;
if ( $num > 5 ) {
	echo "$num is greater then 5 ";
}else if ( $num < 5 ){
	echo "$num is smaller then 5 ";
}else{
	echo "$num is eq 5 ";
}

//=====   for loop
$cities = array("lj", "ce", "mb");
$citiesCount = count($cities);
for ( $i=0; $i < $citiesCount; $i++ )
{
	echo $cities[$i];
} 

//foreach loop (asociative arrays)
foreach($lampDict as $lampElt)
{
 	echo $lampElt;
}

// ================    Diagnostics

echo __FILE__ . ' : ' . __METHOD__ . ':' . __LINE__;


?>
