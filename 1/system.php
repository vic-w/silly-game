<?PHP

include_once("database/database.php");
include_once("wechat/wechat.php");

	
class System
{
    function update_wechat_access_token()
    {
        $wechat = new WeChat();
    	$database = new Database();
        
        $wechat_app_id = $database->get_wechat_app_id();
        $wechat_app_secret = $database->get_wechat_app_secret();
        
        $token_json_result = $wechat->get_access_token($wechat_app_id, $wechat_app_secret);
        $token = $token_json_result->{'access_token'};
        $expire = $token_json_result->{'expires_in'};
        $database->update_wechat_access_token($token, $expire+time());
    }
}

?>