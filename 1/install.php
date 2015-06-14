<html><body>
    
	<div class="menu">
        
        <div><h1>Enter the access keys</h1></div>
        <form action="install.php" method="post">
            <div>wechat_AppID:<input type="password" name="wechat_app_id"></div>
            <div>wechat_AppSecret:<input type="password" name="wechat_app_secret"></div>
            <div>wechat_EncodingAESKey:<input type="password" name="wechat_encoding_aes_key"></div>
            <div>server_AccessToken:<input type="password" name="server_access_token"></div>
            <div><input type="submit" value="Install" /></div>
        </form>

    </div>

</body></html>

<?PHP

include_once("database/database.php");
include_once("system.php");

$database = new Database();
$system = new System();

$wechat_app_id = $_POST["wechat_app_id"];
$wechat_app_secret = $_POST["wechat_app_secret"];
$wechat_encoding_aes_key = $_POST["wechat_encoding_aes_key"];
$server_access_token = $_POST["server_access_token"];

$database->create_table_access_keys($wechat_app_id, $wechat_app_secret, $wechat_encoding_aes_key, $server_access_token);

$system->update_wechat_access_token();

?>












