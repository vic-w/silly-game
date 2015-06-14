<?PHP

include_once("database/database.php");
include_once("wechat/wechat.class.php");

	
class System
{
    public function new_wechat_obj()
    {
        $database = new Database();
        $wechat_app_id = $database->get_wechat_app_id();
        $wechat_app_secret = $database->get_wechat_app_secret();
        $wechat_encoding_aes_key = $database->get_wechat_encoding_aes_key();
        $server_access_token = $database->get_server_access_token();
        
        $options = array(
            'token'=>$server_access_token, //填写你设定的key
            'encodingaeskey'=>$wechat_encoding_aes_key, //填写加密用的EncodingAESKey
            'appid'=>$wechat_app_id, //填写高级调用功能的app id, 请在微信开发模式后台查询
            'appsecret'=>$wechat_app_secret //填写高级调用功能的密钥
    	);
        
 		$weObj = new Wechat($options);
        return $weObj;
    }
    
    public function update_wechat_access_token()
    {   
 		$wechat = $this->new_wechat_obj(); 
        $token = $wechat->checkAuth();
        $database = new Database();
        $database->update_wechat_access_token($token, time());
    }
    
    
}

?>