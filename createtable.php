<?php
//creates poll table in mysql

$dbhost = '162.243.98.130';
$dbuser = 'root';
$dbpass = 'password';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br />';
$sql = CREATE TABLE results (
   `Project1` varchar(20),
   `Project2` varchar(20),
   `Project3` varchar(20),
   `Project4` varchar(20)
);
mysql_select_db( 'results' );
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not create table: ' . mysql_error());
}
echo "Table created successfully\n";
mysql_close($conn);

?>