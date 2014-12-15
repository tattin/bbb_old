<?php
//設置環境によって、下記ROOT_DIRと、libs/conf.phpの各項目を変更する必要がある。
define('ROOT_DIR', '/home/httpd/girls24/public_html/set/');
// PATH_SEPARATOR
if (!defined('PATH_SEPARATOR')) {
  if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
    define('PATH_SEPARATOR', ':');
  } else {
    define('PATH_SEPARATOR', ';');
  }
}

set_include_path(get_include_path().PATH_SEPARATOR.ROOT_DIR.'vendors/PEAR'.PATH_SEPARATOR.ROOT_DIR.'vendors/'.PATH_SEPARATOR.ROOT_DIR.'libs/');

include('conf.php');
include('define.php');
//include('database.php');

// 携帯関連モジュール
require_once 'keitai.php';
require_once 'emoji.php';
require_once 'qdmail.php';

$Carrier = getCarrierUA(isset($_SERVER["HTTP_USER_AGENT"])? $_SERVER["HTTP_USER_AGENT"] : "");
if($Carrier == "PC"){
  ini_set('session.use_cookies' , 'On');
  ini_set('session.use_trans_sid', '0');
  define('IS_MOBILE', false);
} else {
  ini_set('session.use_cookies' , '0');
  ini_set('session.use_trans_sid', '1');
  define('IS_MOBILE', true);
}

//session_cache_limiter('private');
session_start();
error_reporting(E_ALL);
if (error_reporting() > 6143) {
  error_reporting(E_ALL & ~E_DEPRECATED);
}
set_time_limit(0);

ini_set('display_errors','on');

define('HTML_ENCODING', 'utf-8');

if (!defined('HTML_ENCODING')) {
  define('HTML_ENCODING', 'utf-8');
}



// 携帯関連モジュール
$ret = split('/',dirname($_SERVER["PHP_SELF"]));
if($ret[count($ret)-1] == ''){
  unset($ret[count($ret)-1]);
}
if($ret[0] == ''){
  unset($ret[0]);
}

$compile_dir = join('/',$ret);

$minus_dir = preg_replace("/\/$/i", "", preg_replace("/^\//i", "", BASE_URL));
$compile_dir = preg_replace("/^".preg_quote($minus_dir, "/")."/i", "", $compile_dir);
$compile_dir = preg_replace("/\/$/i", "", preg_replace("/^\//i", "", $compile_dir));
 
// 携帯用ページとの切り分け部分、現状不要
//if (!IS_MOBILE){
  define('BASE_TEMPLATE_DIR', ROOT_DIR.'html/templates/');
  define("TEMPLATE_DIR", "./templates/");
  define("CONFIG_DIR", "./templates/config/");
  $compile_dir = ROOT_DIR."libs/templates_c/".$compile_dir;
//}
 /*
}else{
  define('BASE_TEMPLATE_DIR', ROOT_DIR.'html/templates/mobile/');
  define("TEMPLATE_DIR", "./templates/mobile/");
  define("CONFIG_DIR", "./templates/config/mobile/");
  $ret = split('/',dirname($_SERVER["PHP_SELF"]));
  if($ret[count($ret)-1] == ''){
    unset($ret[count($ret)-1]);
  }
  if($ret[0] == ''){
    unset($ret[0]);
  }
  $compile_dir = ROOT_DIR."libs/templates_c/mobile/".$compile_dir;
}
 *
 */

if($compile_dir != "" && !is_dir($compile_dir)){
  mkdir($compile_dir, 0777);
  chmod($compile_dir, 0777);
}

define("COMPILE_DIR" , $compile_dir);

define('PROGRAM_ENCODING', 'UTF-8');
if (!defined('HTML_ENCODING')) {
  define('HTML_ENCODING', 'ERR');
}

switch (HTML_ENCODING){
  case "Shift_JIS":
    define("PHP_ENCODING", "sjis-win");
    break;
  case "utf-8":
    define("PHP_ENCODING", "UTF-8");
    break;
  case "EUC-JP":
    define("PHP_ENCODING", "eucjp-win");
    break;
  default:
    print "Syntax error : Parameter Not Found HTML_ENCODING";
    exit;
}

// mbstring.http_output
if(ini_get('mbstring.http_output') != 'pass'){
  ini_set('mbstring.http_output','pass');
}

// magic_quotes_gpc
if(get_magic_quotes_gpc() == 1){
  foreach($_POST as $key => $val){
    if(is_array($val)){
      foreach($val as $key2 => $val2){
        if(is_array($val2)){
          foreach($val2 as $key3=>$val3){
            $_POST[$key][$key2][$key3] = stripslashes($val3);
          }
        }else{
          $_POST[$key][$key2] = stripslashes($val2);
        }
      }
    }else{
      $_POST[$key] = stripslashes($val);
    }
  }
  foreach($_REQUEST as $key => $val){
    if(is_array($val)){
      foreach($val as $key2 => $val2){
        if(is_array($val2)){
          foreach($val2 as $key3=>$val3){
            $_REQUEST[$key][$key2][$key3] = stripslashes($val3);
          }
        }else{
          $_REQUEST[$key][$key2] = stripslashes($val2);
        }
      }
    }else{
      $_REQUEST[$key] = stripslashes($val);
    }
  }
  foreach($_GET as $key => $val){
    if(is_array($val)){
      foreach($val as $key2 => $val2){
        if(is_array($val2)){
          foreach($val2 as $key3=>$val3){
            $_GET[$key][$key2][$key3] = stripslashes($val3);
          }
        }else{
          $_GET[$key][$key2] = stripslashes($val2);
        }
      }
    }else{
      $_GET[$key] = stripslashes($val);
    }
  }
}

// mbstring.http_input
if(ini_get('mbstring.http_input') != 'pass' && ini_get('mbstring.encoding_translation') == 1){
  $from_encoding = ini_get("mbstring.http_input");
  if($from_encoding == "auto"){
    $from_encoding = ini_get("mbstring.internal_encoding");
  }
  mb_convert_variables(PHP_ENCODING, $from_encoding, $_POST, $_REQUEST, $_GET);
}

// mbstring.internal_encoding
if(ini_get('mbstring.internal_encoding') != PHP_ENCODING){
  ini_set('mbstring.internal_encoding',PHP_ENCODING);
  mb_internal_encoding(PROGRAM_ENCODING);
}

require_once 'Smarty/Smarty.class.php';
//require_once 'FillInForm.class.php';

//require_once 'MDB2.php';
//require_once 'Crypt/Blowfish.php';
//require_once 'Auth.php';

//require_once 'crypt.php';

/**
 * Smartyのインスタンスを返す
 * @return object Smartyインスタンス
 */
function getSmartyInstance(){
  $smarty = new Smarty;
  $smarty->template_dir = TEMPLATE_DIR;
  $smarty->compile_dir  = COMPILE_DIR;
  $smarty->config_dir  = CONFIG_DIR;
  $smarty->left_delimiter = '<!--{';
  $smarty->right_delimiter = '}-->';
  $smarty->register_outputfilter('OutputFilter');
  return $smarty;
}

function OutputFilter($body){
  if (function_exists('OutputFilterEx')){
    return OutputFilterEx($val);
  }
  $carrier = getCarrierUA(isset($_SERVER["HTTP_USER_AGENT"])? $_SERVER["HTTP_USER_AGENT"] : "");
  if($carrier == "DOCOMO"){
    // なんかしら問題でてきたら218行目return $bodyをコメントアウト。しかし、するとmail_edit.htmlのtextareで絵文字がおかしくなる
    return $body;
  }
  global $EmojiMappingTable,$DoCoMoEmoji,$SoftBankEmoji,$AuEmoji;
  if($carrier == "AU"){
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", '<img localsrc="'.$EmojiMappingTable[$key]['AU'].'">' , $body);
    }
    return $body;
  }
  if($carrier == "SOFTBANK"){
    foreach($EmojiMappingTable as $key => $val){
      $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", $SoftBankEmoji[$val['SOFTBANK']]['BIN'], $body);
    }
    foreach($SoftBankEmoji as $key => $val){
      $body = str_replace('&#S'.$SoftBankEmoji[$key]['SJIS'].';', '<img src="'.IMAGE_URL.'softbank/'.$SoftBankEmoji[$key]['SJIS'].'.gif" style="height:0.9em;vertical-align:baseline;">', $body);
    }
    foreach($DoCoMoEmoji as $key => $val){
      $body = str_replace('&#D'.$DoCoMoEmoji[$key]['SJIS'].';', '<img src="'.IMAGE_URL.'docomo/'.$DoCoMoEmoji[$key]['SJIS'].'.gif" style-"height:0.9em;vertical-align:baseline;">', $body);
    }
    return $body;
  }
  // PC表示用全機種絵文字→画像挿入
  foreach($EmojiMappingTable as $key => $val){
    $body = str_replace('&#x'.$DoCoMoEmoji[$key]['UTF16'].";", '<img src="'.IMAGE_URL.'docomo/'.$DoCoMoEmoji[$key]['SJIS'].'.gif" style="height:0.9em;vertical-align:baseline;">' , $body);
  }
  foreach($EmojiMappingTable as $key => $val){
  	$body = str_replace('&#D'.$DoCoMoEmoji[$key]['SJIS'].";", '<img src ="'.IMAGE_URL.'docomo/'.$DoCoMoEmoji[$key]['SJIS'].'.gif" style="height:0.9em;vertical-align:baseline;">' , $body);
  }
  foreach($AuEmoji as $key => $val){
  	$body = str_replace('&#A'.$AuEmoji[$key]['SJIS'].";", '<img src ="'.IMAGE_URL.'au/'.$AuEmoji[$key]['SJIS'].'.gif" style="height:0.9em;vertical-align:baseline;">', $body);
  }
  foreach($SoftBankEmoji as $key => $val){
  	$body = str_replace('&#S'.$SoftBankEmoji[$key]['SJIS'].";", '<img src="'.IMAGE_URL.'softbank/'.$SoftBankEmoji[$key]['SJIS'].'.gif" style="height:0.9em;vertical-align:baseline;">', $body);
  }
  return $body;
}


/**
 * FillInFormによる表示を行う
 * @param object $tmpl Smartyインスタンス
 * @param string $tmpl_name テンプレートファイル名
 * @param array $post POSTパラメータ
 */
function DisplayHtml($tmpl, $tmpl_name, $post){
  $fif = new HTML_FillInForm;
  $html = $tmpl->fetch($tmpl_name);

  $output = $fif->fill(array(
    'scalar' => $html,
    'fdat' => $post
  ));
  print $output;
}

function loginFunction($username = null, $status = null, &$auth = null){
}

/**
 * Authのインスタンスを返す
 * @return object Authインスタンス
 */

function getAuthInstance() {
  if (function_exists('getAuthInstanceEx')){
    return getAuthInstanceEx();
  }
  $options = array(
    "cryptType"=> "auth_crypt",
    "dsn" => DSN,
    "table" => "vw_users",
    "usernamecol" => "login_id",
    "passwordcol" => "password",
    "auto_quote" => true,
    "db_fields" => "*"
  );
  $auth = new Auth("MDB2" ,$options,'loginFunction');
  $auth->start();
  return $auth;
}

// エリア検索時の文字列を返す
function getSearchAreaText($params) {
  $text = "";
  if(!isset($params['region_id']) || $params['region_id'] == "" || $params['region_id'] == -99) {
    return "すべて";
  }elseif(!isset($params['region_id']) || $params['region_id'] == "" || $params['region_id'] == 0) {
    return "全国";
  }
  $regionOptions = getHashArray("mt_region", "id", "name");
  $text .= $regionOptions[$params['region_id']];
  if(!isset($params['pref']) || $params['pref'] == "" || $params['pref'] == -99){
    $text .= ">すべて";
    return $text;
  }elseif($params['pref'] == -98){
    $text .= ">以下の指定なし";
    return $text;
  }elseif(!isset($params['pref']) || $params['pref'] == "" || $params['pref'] == 0) {
    return $text;
  }
  $prefOptions = getHashArray("mt_pref", "id", "name", array('region_id' => $params['region_id']));
  $text .= ">".$prefOptions[$params['pref']];
  if(!isset($params['area_code']) || $params['area_code'] == "" || $params['area_code'] == -99) {
    $text .=">すべて";
    return $text;
  }elseif($params['area_code'] == -98){
    $text .=">以下の指定なし";
    return $text;
  }elseif($params['area_code'] == 0){
    return $text;
  }
  $areaOptions = getHashArray("mt_area", "area_code", "cities_name", array('pref_id' => $params['pref']), " ORDER BY id");
  $text .= ">".$areaOptions[$params['area_code']];

  return $text;
}


/**
 * 認証を行う
 * @return bool 認証結果
 */
function checkAuth($programName = '', $request_uri = '', $namecheck = false) {
  if (function_exists('checkAuthEx')){
    return checkAuthEx($programName);
  }
  $objAuth = getAuthInstance();
  if((!defined('NoLoginPage') || NoLoginPage != 1) && !$objAuth->getAuth()) {
	unset($_SESSION['User']);
	if($request_uri != '') {
	  $_SESSION['return_url'] = $request_url;
	}
    location(SSL_URL.'mypage/login.php');
    exit;
  } else if($objAuth->getAuth()){
    // ユーザー情報をセッションに追加
    $arrUser = array();
    $arrUser['UserID'] = $objAuth->getAuthData('user_id');
	$resUser = getByKeys('vw_users', array('user_id'=>$arrUser['UserID']));
    if(count($resUser) < 1){
      $objAuth->logout();
	  unset($_SESSION['User']);
	  if($request_uri != '') {
	  	$_SESSION['return_url'] = $request_url;
	  }
      location(SSL_URL.'mypage/login.php');
      exit;
	} elseif(defined('NoCheckNamePage') && NoCheckNamePage == 1){

		//NoCheckNamePageが定義されている場合、user_edit.phpには飛ばない

	} elseif($resUser['name1'] == NULL || $resUser['name1'] == '' && $namecheck == true) {
	  if($request_uri != '') {		
	  	$_SESSION['return_url'] = $request_uri;
	  }
	  location(SSL_URL.'mypage/user_edit.php?namecheck=1');
	  exit;
	}
	  // 画像関連
    if(isset($resUser['image_url']) && $resUser['image_url']!='' && file_exists(SAVE_IMAGE_PATH.$resUser['image_url'])){
      list($resUser['width'], $resUser['height']) = getimagesize(SAVE_IMAGE_PATH.$resUser['image_url']);
    }else{
      $resUser['image_url'] = '';
      $resUser['width'] = '';
      $resUser['height'] = '';
    }
    $arrUser['UserImage'] = array('image_url'=>$resUser['image_url'], 'width'=>$resUser['width'], 'height'=>$resUser['height']);
    // 画像関連おわり
    $arrUser['UserID'] = $objAuth->getAuthData('user_id');
	$arrUser['UserHandleName'] = @$resUser['handle_name'];
	$arrUser['Category'] = _getUserCategoriesForList($arrUser["UserID"]);
	$res = _getCitiesName($resUser["postcode1"].$resUser["postcode2"]);
	if($res != ""){
		$arrUser['UserPrefsName'] = $res["prefs_name"];
		$arrUser['UserCitiesName'] = $res["cities_name"];
	}	
	#$arrUser['UserAgent'] = @$resUser['user_agent'];
    $_SESSION['User'] = $arrUser;
/*
    if($programName){
      if((!defined('NoLoginPage') || NoLoginPage != 1) && !checkAuthDetail($programName)) {
        //以下のコメントをコメントインする
        $_SESSION = array();
        header('Location: '.BASE_URL.'login.php');
        exit;
      }
    }
*/
    return true;
  } else {
    $objAuth->logout();
    unset($_SESSION['User']);
    return false;
  }
}

function isLoginSuccess() {
  $objAuth = getAuthInstance();
  $result = 0;
  if($objAuth->getAuth()) {
    $user = $objAuth->getAuthData('user_id');
    //ひきなおし
    $detail = getByKeys('vw_users', array('user_id' =>$user));
    if(isset($detail['image_url']) && $detail['image_url']!='' && file_exists(SAVE_IMAGE_PATH.$detail['image_url'])){
      list($detail['width'], $detail['height']) = getimagesize(SAVE_IMAGE_PATH.$detail['image_url']);
    }else{
      $detail['image_url'] = '';
      $detail['width'] = '';
      $detail['height'] = '';
    }
    $arrUser['UserID'] = $user;
    $arrUser['UserImage'] = array('image_url'=>$detail['image_url'], 'width'=>$detail['width'], 'height'=>$detail['height']);
    $arrUser['UserHandleName'] = $detail['handle_name'];
    #$arrUser['UserAgent'] = $detail['user_agent'];
    $_SESSION['User'] = $arrUser;
    //ひきなおし
    
    $count = getCountByKeys('vw_users', array('user_id'=>$user));
    if($count > 0) {
      $result = 1;
    }
  }
  return $result;
}

function auth_crypt($val){
  if($val == "") {
    return "";
  }
  return sha1($val);
}

/**
 * 画面ごとの権限があるか認証を行う
 * @param object $programName プログラム名(項目マスタ登録名)
 * @return bool 認証結果
 */
function checkAuthDetail($programName) {
  if (function_exists('checkAuthDetailEx')){
    return checkAuthDetailEx($programName);
  }
  if($_SESSION['User']['AuthID'] == 1) {
    return true;
  }
  $menuID = getOne('menus', 'id', array('program_name' =>$programName));
  if($menuID == '') {
    return false;
  }
  $authDetail = getByKeys('auth_details', array('menu_id' => $menuID, 'auth_id' => $_SESSION['User']['AuthID']));
  if(count($authDetail) == 0) {
    return false;
  }
  return true;
}

/**
 * ログアウト
 */
function logout() {
  if (function_exists('logoutEx')){
    return logoutEx();
  }
  $objAuth = getAuthInstance();
  $objAuth->logout();
  unset($_SESSION['User']);
  location(SITE_URL);
  exit;
}

/**
 * ログアウト（ログインページへの遷移は行わず、次のページ遷移時にログインページへ自動的に遷移する）
 */
function semiLogout() {
  $objAuth = getAuthInstance();
  $objAuth->logout();
  unset($_SESSION['User']);
//  header('Location: '.BASE_URL.'login.php');
//  exit;
}

/**
 * リダイレクト時にパラメータをPOSTで渡す
 * @param object $tmpl SmartyInstance
 * @param string $url リダイレクト先URL
 * @param array $param パラメータ
 */
function httpRedirect($tmpl, $url, $param){
  $tmpl->assign("Post",$param);
  $tmpl->assign("Url",$url);
  $tmpl->display("redirect.html");
  exit;
}

/**
 * 時間差をインターバル形式で返す
 * @param timestamp $startDateTime 開始日時
 * @param timestamp $endDateTime 終了日時
 * @return interval 時間差
 */
function getInterval($startDateTime, $endDateTime) {
  $interval = strtotime($endDateTime) - strtotime($startDateTime);
  if($interval > 0) {
    $parkingTime = floor($interval/3600).':'.floor(($interval%3600)/60).':'.floor(($interval%3600)%60);
  } else {
    $parkingTime = '00:00:00';
  }
  return $parkingTime;
}

/**
 * preタグで囲んだ変数の値のダンプと、出力場所を表示する。
 * @param mixed $var 
 */
function pr($var) {
  $e = new Exception();
  $trace = $e->getTrace();

  echo "<pre>\n";
  echo "<b>{$trace[0]['file']}({$trace[0]['line']})</b>\n";
  print_r($var);
  echo "</pre>\n";
}

/**
 * リダイレクトするモバイルページの場合セッションも連れて行く
 * @param mixed $var 
 */
function location($url) {
  if (function_exists('locationEx')){
    return locationEx($url);
  }
  if(IS_MOBILE){
  // モバイル用
    if(strpos($url,'?') == false){
      $url .= "?".session_name()."=".session_id();
    }else{
      $url .= "&".session_name()."=".session_id();
    }
  }
  header('Location: '. $url);
  exit;
  // PC用
  //header('Location: '. $url);
  //exit;
}

/***
 *絵文字抽出用関数
 *@param 変換したい文字列
 *@return 変換後のSJIS文字列
 **/
 function emojiConvert($contents){
// キャリア別絵文字エンコーディング
// &#XSJISで表示
// X:キャリア頭文字英大文字(D,A,S)
// SJIS表記(4B)
  require 'emoji.php';
$carrier = getCarrierUA(isset($_SERVER["HTTP_USER_AGENT"])? $_SERVER["HTTP_USER_AGENT"] : "");
  switch($carrier){
    case "DOCOMO":
  		$docomo_jis = array();
  		// key->UTF-8 val->SJISの配列作成
  		for($i = 1; $i <= 252; $i++){
  			$docomo_jis[$DoCoMoEmoji[$i]['UTF16']] = $DoCoMoEmoji[$i]['SJIS'];
  		}
  		// エンコード
  		mb_substitute_character("long");
  		$contents = mb_convert_encoding($contents,"SJIS","UTF-8");
  		while((mb_ereg('U\+([A-Z0-9]{4})',$contents, $match))){
			$contents = str_replace($match[0], "&#D".$docomo_jis[$match[1]].";", $contents);
  		}
  		return $contents;
  	break;
    case "SOFTBANK":
  		$softbank_jis = array();
  		for($i = 1; $i <= 471; $i++){
  			$softbank_jis[$SoftBankEmoji[$i]['UTF16']] = $SoftBankEmoji[$i]['SJIS'];
  		}
  		mb_substitute_character("long");
  		$contents = mb_convert_encoding($contents,"SJIS","UTF-8");
  		while(mb_ereg('U\+([A-Z0-9]{4})', $contents, $match)){
  			$contents = str_replace($match[0], "&#S".$softbank_jis[$match[1]].";", $contents);
  		}
  		$contents = mb_convert_encoding($contents,"UTF-8","SJIS");
  		return $contents;
  	break;
    case "AU":
  		$au_jis = array();
  		for($i = 1; $i <= 647; $i++){
  			$au_jis[$AuEmoji[$i]['UTF16_2']] = $AuEmoji[$i]['SJIS'];
  		}
  		mb_substitute_character("long");
  		$contents = mb_convert_encoding($contents, "SJIS", "UTF-8");
  		while(mb_ereg('U\+([A-Z0-9]{4})', $contents, $match)){
  			$contents = str_replace($match[0], "&#A".$au_jis[$match[1]].";", $contents);
  		}
  		return $contents;
  	break;
  	default :
  		$contents = mb_convert_encoding($contents, "SJIS", "UTF-8");
  		return $contents;
	break;
  }
}

/* Qdmailを使ったメール送信(絵文字なし)
 * @param array $data : to/from/title/bodyが要素の配列
 * @return bool true/false
 */
function sendMail_withQD($data){
	$subject = null;
	$body = null;
	$to = null;
	$from = null;
	
	// 設定云々
	$mail = new Qdmail();
//	$mail->inlineMode(true);
//	$mail->autoDecoJudge(true);
//	$mail->toSeparate(true);
	$mail->unitedCharset('ISO-2022-JP');
	$mail->qdmail_system_charset = 'ISO-2022-JP';
	$mail -> messageIdRight( 'voice4all.net');
	$mail->lineFeed(QDMAIL_LFC);

	// メール内容
	$subject = $data['title'];
	$body = $data['content_text'];
	$to = $data['to_address'];
	$from = $data['from_address'];
	// コンバート
	$body = mb_convert_encoding($body, "ISO-2022-JP", "UTF-8");
	$subject = mb_convert_encoding($subject, "ISO-2022-JP", "UTF-8");
	$from = mb_convert_encoding($from, "ISO-2022-JP", "UTF-8");
	$to = mb_convert_encoding($to, "ISO-2022-JP", "UTF-8");

	$mail->to($to);
	$mail->subject($subject);
	$mail->text($body);
	$mail->from($from);
	if(isset($data['bcc']) && $data['bcc']!=''){
	  $mail->bcc($data['bcc']);
	}

	$ret = $mail -> send();
	if($ret == ''){
		return true;
	}else{
		return false;
	}
}

//処理時間チェック用
function getmicrotime(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$sec + (float)$usec);
}

//ユーザーの興味のある分野取得
function _getUserCategoriesForList($user_id){
	$returnArray=array();
	$result=getColumnByKeys("category_id", "user_category", array("user_id"=>$user_id));
	if($result) {
		foreach($result as $val){
			$returnArray[]=$val[0];
		}
	}
	return $returnArray;
}

function _getCitiesName($postcode){
	$sql = "SELECT MA.prefs_name, MA.cities_name FROM post_office AS PO LEFT JOIN mt_area AS MA ON PO.code = MA.area_code WHERE PO.new_post_number = ".$postcode;
	$res = getAllBySql($sql);
	if(count($res) > 0) {
		return $res[0];
	} else {
		return "";
	}
}



