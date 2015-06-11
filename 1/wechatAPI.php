<?PHP

$wechat = new Wechat();
$token = $wechat->GetAccessToken();
print_r($token);

class WeChat
{
	public $AppID = '';
	public $AppSecret = '';
  
    public function GetAccessToken()
    {
        $f = new SaeFetchurl();
        $cmd = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->AppID.'&secret='.$this->AppSecret;
        $content = $f->fetch($cmd);
        if (!empty($content))
        {
            $J=json_decode($content); 
            return $J;
        }
        else
        {
            return null;
        }
    }
}

?>