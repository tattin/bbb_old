<?php

$MobileDomain=array(
  "DOCOMO"   => array('@docomo.ne.jp'),
  "SOFTBANK" => array('@softbank.ne.jp',
                      '@i.softbank.jp',
                      '@disney.ne.jp',
                      '@d.vodafone.ne.jp',
                      '@h.vodafone.ne.jp',
                      '@t.vodafone.ne.jp',
                      '@c.vodafone.ne.jp',
                      '@r.vodafone.ne.jp',
                      '@k.vodafone.ne.jp',
                      '@n.vodafone.ne.jp',
                      '@s.vodafone.ne.jp',
                      '@q.vodafone.ne.jp',
                      '@jp-d.ne.jp',
                      '@jp-h.ne.jp',
                      '@jp-t.ne.jp',
                      '@jp-k.ne.jp',
                      '@jp-r.ne.jp',
                      '@jp-s.ne.jp',
                      '@jp-n.ne.jp',
                      '@jp-q.ne.jp',
                      '@jp-c.ne.jp '),
  "AU"       => array('@ezweb.ne.jp',
                      '.ezweb.ne.jp'));

function getCarrier($mail){
  $ret = strpos($mail,'@');
  if($ret == false){
    return getCarrierUA($mail);
  }
  global $MobileDomain;
  foreach($MobileDomain as $carrier => $domain){
    foreach($domain as $val){
      if(preg_match('/'.preg_quote($val)."$/i", $mail)){
        return $carrier;
      }
    }
  }
  return 'PC';
}
function getKantanID(){
  $carrier = getCarrierUA($_SERVER["HTTP_USER_AGENT"]);
  $res = array();
switch($carrier){
  case "DOCOMO":
    if(isset($_SERVER['HTTP_X_DCMGUID']) && strlen($_SERVER['HTTP_X_DCMGUID']) > 0){
      $res['HTTP_X_DCMGUID'] = $_SERVER['HTTP_X_DCMGUID'];
    }
    if(preg_match("/^.+ser([0-9a-zA-Z]+).*$/", $_SERVER["HTTP_USER_AGENT"], $match)){
      $res['DOCOMO_UA_UID'] = $match[1];
    }
    break;
  case "AU":
    if(isset($_SERVER['HTTP_X_UP_SUBNO']) && strlen($_SERVER['HTTP_X_UP_SUBNO']) > 0){
      $res['HTTP_X_UP_SUBNO'] = $_SERVER['HTTP_X_UP_SUBNO'];
    }
    break;
  case "SOFTBANK":
    if(isset($_SERVER['HTTP_X_JPHONE_UID']) && strlen($_SERVER['HTTP_X_JPHONE_UID']) > 0){
      $res['HTTP_X_JPHONE_UID'] = $_SERVER['HTTP_X_JPHONE_UID'];
    }
    if(preg_match("/^.+\/SN([0-9a-zA-Z]+).*$/", $_SERVER["HTTP_USER_AGENT"], $match)){
      $res['SOFTBANK_UA_UID'] = $match[1];
    }
    break;
  }
  return $res;
}


function getCarrierUA($user_agant){
  if(strpos($user_agant,"DoCoMo/") === 0){
    return "DOCOMO";
  }
  if(strpos($user_agant,"UP.Browser/") === 0){
    return "AU";
  }
  if(strpos($user_agant,"KDDI/") === 0){
    return "AU";
  }
  if(strpos($user_agant,"KDDI") ===0){
    return "AU";
  }
  if(strpos($user_agant,"J-PHONE/") === 0){
    return "SOFTBANK";
  }
  if(strpos($user_agant,"Vodafone/") === 0){
    return "SOFTBANK";
  }
  if(strpos($user_agant,"SoftBank/") === 0){
    return "SOFTBANK";
  }
  return "PC";
}


function replaceEmoji($body,$carrier,$mode='HTML'){
  global $EmojiMappingTable,$DoCoMoEmoji,$SoftBankEmoji,$AuEmoji;
  $emoji = $DoCoMoEmoji;
  if($carrier == "SOFTBANK"){
    $emoji = $SoftBankEmoji;
  }else if($carrier == "AU"){
    $emoji = $AuEmoji;
  }else if($carrier == "DOCOMO"){
    $emoji = $DoCoMoEmoji;
  }else if($mode == "TEXT"){
    $carrier = "TEXT";
    $emoji = $DoCoMoEmoji;
  }else{
    $carrier = "PC";
    $emoji = $DoCoMoEmoji;
  }


  if($carrier == "TEXT"){
    //$body = mb_convert_encoding($body,'UTF-8','jis');
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", '〓', $body);
    }
    //$body = mb_convert_encoding($body,'jis','UTF-8');
  }else if($carrier == "PC"){
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", '<img src="cid:'. $emoji[$key]['SJIS']. '.gif">', $body);
    }
  }else if($carrier == "DOCOMO"){
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#D'.$emoji[$key]['SJIS'].";", pack("n",hexdec('0x'.$emoji[$key]['SJIS'])) , $body);
    }
  }else if($carrier == "SOFTBANK"){
    foreach($emoji as $key => $val){
      $body = str_replace('&#S'.$emoji[$key]['SJIS'].";", pack("n",hexdec('0x'.$emoji[$key]['SJIS'])) , $body);
    }
  }else if($carrier == "AU"){
    foreach($emoji as $key => $val){
      $body = str_replace('&#A'.$val['SJIS'].";", pack("n",hexdec('0x'.$val['SJIS_2'])), $body);
    }
  }else{
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#x'.$DoCoMoEmoji[$key]['SJIS'].";", pack("n",hexdec('0x'.$emoji[$val[$carrier]]['SJIS'])) , $body);
    }
  }
  return $body;
}


function htmltokeitai($body,$mode = "html",$enc = 'UTF-8'){
$script = <<< EOF
EOF;

  global $EmojiMappingTable,$DoCoMoEmoji;
  foreach($EmojiMappingTable as $key => $val){
    $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", '<img src="'.IMAGE_URL.'docomo/'.$DoCoMoEmoji[$key]['SJIS'].'.gif" style="height:1em;vertical-align:text-top;">' , $body);
  }
  $body = preg_replace_callback('/src="cid:([^"]*)"/i',replaceImageCallback,$body);
  
  $search = array('/<blink>/i',          // 点滅１
                  '/<\/blink>/i',          // 点滅１
                  '/size="2"/i',
                  '/size="3"/i',
                  '/size="4"/i'
                  );

  $replace = array('<span class="blink">',
                   '</span>',
                   '/style="font-size:80%;"/i',
                   '/style="font-size:100%;"/i',
                   '/style="font-size:120%;"/i',
                    );
  $body = preg_replace($search, $replace, $body);
  if($mode == "text"){
    $body = preg_replace("/(\r\n|\n|\r)/", "<br>", $body);
  }

  $body = addwbr($body,$enc);
  return '<tt style="font-size:100%;}">'.$body."</tt>".$script;
}
function getImageFileList($body){
  preg_match_all('/src="cid:([^"]*)"/i',$body,$match);
  $list = array();
  foreach($match[1] as $val){
    $list[$val] = $val;
  }
  $ret = array();
  foreach($list as $val){
    if(ereg("^F",$val)){
      $ret[] = "docomo/".$val;
    }else{
      $ret[] = $val;
    }
  }
  return $ret;
}

function replaceImageCallback($str){
  list($width, $height, $type, $attr) = getimagesize(IMAGE_SAVE_DIR.'mail/'.$str[1]);
  if($width > 210){
    return 'src="'.IMAGE_SAVE_URL.'mail/'.$str[1].'" width="100%"';
  }
  return 'src="'.IMAGE_SAVE_URL.'mail/'.$str[1].'"';
}


function addwbr($subject, $sEnc='UTF-8') {
  $res = "";
  $len = mb_strlen($subject, $sEnc);
  $mode = 0;
  for($i = 0;$i < $len;$i++){
    $chr = mb_substr($subject, $i, 1, $sEnc);
    if($chr == "\r" || $chr == "\n"){
      $res .= " ";
      continue;
    }
    if($chr == '<'){
      $mode = 1;
    }
    if($mode == 0){ //  && mb_strwidth($chr) == 1
      $res .= $chr.'<wbr>';
    }else{
        $res .= $chr;
    }
    if($chr == '>'){
      $mode = 0;
    }
  }
  return $res;
}

function makeEzEmoji($code) {
  $emoji = '';
  for ($i = 0; $i < strlen($code); $i += 2) {
    $emoji .= sprintf('%c', hexdec(substr($code, $i, 2)));
  }
  return $emoji;
}
