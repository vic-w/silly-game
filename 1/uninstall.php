<?PHP

include_once("database/database.php");

$database = new Database();
$database->delete_table_access_keys();

?>
