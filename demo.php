<?php

ob_start();
error_reporting(0);
define('API_KEY','5321570820:AAGH_bPTSIY9L17xhcqM26l-XR-m126GTEk');
//-----------------------------------------------------------------------------------------
function bot($method,$data){
  
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, count($data));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
 }
//-----------------------------------------------------------------------------------------
$archive = -1001798868109;
$archive2 = -1001798868109;
$cave = -1001684854179;
$logch = -1001722960033;
$gpsup = -1001658046005;
$channel = -1001524493806;
$channel2 = -1001678665442;
$token = API_KEY;
//-----------------------------------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$new = $message->channel_post->message_id;
$from_id = $message->from->id;
$message_id = $message->message_id;
$username = $message->from->username;
$text = $message->text;
$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id="$from_id),true);
$status = $statjson['result']['status'];
$statjson2 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel2&user_id="$from_id),true);
$status2 = $statjson2['result']['status'];
$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$gpsup&user_id="$from_id),true);
$isdev = $statjson3['result']['status'];

function SendMessage($chat_id, $text){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDownV2']);
}
 function Copy($from,$chat,$msg)
{
bot('CopyMessage',[
'chat_id'=>$chat,
'from_chat_id'=>$from,
'message_id'=>$msg
]);
}
function Save($from,$msg)
{
bot('CopyMessage',[
'chat_id'=>$archive,
'from_chat_id'=>$from,
'message_id'=>$msg
]);
}
if(strpos($text , "/start") !== false){
  if($status == "left" or $status2 == "left"){
    SendMessage($from_id, "⭕️برای استفاده از دروید ابتدا باید در چنل ربلیون و آرشیو ربلیون عضو باشید:
💫@StarWars_Rebellion
💫@StarWarsArchive");
  }else{
$text = str_replace(['/start '],'',$text);
Copy($archive, $from_id, $text);
Copy($archive, $cave, $text);
}
}
if($username == "Teyshfjribot" && $chat_id != $archive2){
SendMessage($logch, "دریافت جدید√
----------
ایدی عددی: $chat_id
----------
در تاریخ: $date
----------");
}
if($isdev != "left" && strpos($text , "/start") == false){
  Save($from_id,$message_id);
}
if($username == "Teyshfjribot" && $chat_id == $archive2){
  SendMessage($logch, "فایل جدید ذخیره شد√
  لینک دسترسی به فایل:
    t.me/Teyshfjribot?start=$new");
}
?>