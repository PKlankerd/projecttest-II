<?php
Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "ansell";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
$db = new dbObj();
$connString =  $db->getConnstring();
 
$sql_query = "SELECT * FROM dipping_lot";
$resultset = mysqli_query($connString, $sql_query) or die("database error:". mysqli_error($conn));
$dipping_lot = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$dipping_lot[] = $rows;
}
?>