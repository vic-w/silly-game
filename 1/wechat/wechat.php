<?PHP

class WeChat
{
  
    public function get_access_token($AppID, $AppSecret)
    {
        $f = new SaeFetchurl();
        $cmd = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$AppID.'&secret='.$AppSecret;
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