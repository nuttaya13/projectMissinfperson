<?php 
// DB credentials.
define('DB_HOST','202.29.80.53');
define('DB_USER','6012224002');
define('DB_PASS','13062542');
define('DB_NAME','6012224002');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>