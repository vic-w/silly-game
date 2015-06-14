<?php

include_once("system.php");

$system = new System();
$wechat = $system->new_wechat_obj();
$wechat->valid();
$type = $wechat->getRev()->getRevType();

switch($type) 
{
case Wechat::MSGTYPE_TEXT:
    $wechat->text("感谢您关注我们的微信公众号，精彩内容紧张开发中")->reply();
    exit;
    break;
case Wechat::MSGTYPE_EVENT:
    break;
case Wechat::MSGTYPE_IMAGE:
    break;
default:
    $wechat->text("help info")->reply();
}


?>