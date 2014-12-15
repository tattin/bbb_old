<?php

require_once 'bootstrap.php';
$tmpl_name = 'insert_sql.html';

$arrList = array();
$arrErr  = array();
$data    = array();
// modeわたったときだけ
switch(isset($_POST['mode']) ? $_POST['mode'] : ''){
	case 'check':
	    $data = $_POST;
		if(!_hasError($arrErr, $_POST)){
			$arrList = sqlParse($_POST, $arrErr);
		}
		break;
}

$tmpl = getSmartyInstance();
$tmpl->assign('arrList', $arrList);
$tmpl->assign('arrErr',  $arrErr);
$tmpl->assign('data',    $data);
$tmpl->display($tmpl_name);

// エラーチェック
// エラーがあればTRUE
function _hasError(&$arrErr, $arrParams){
	$result = false;
	if(!isset($arrParams['sql']) || strlen(str_replace(array(' ', '　'), array('', ''), ($arrParams['sql']))) == 0){
		$arrErr['sql'] = '<br />SQL文を正しく入力してください';
		$result = true;
	}
	return $result;
}


function sqlParse($arrParams, &$arrErr){
    $sql = $arrParams['sql'];
    
    $arrQuote   = array("'", "\"", "`");    // クォート文字配列
    $arrBracket = array("in" => "(", "out" => ")");          // カッコ文字配列
    
    $strStr      = "";         // 文字列格納用変数
    $strQuote    = "";         // クォート文字格納用変数
    $in_quote    = false;      // " ' ` の中状態
    $in_bracket  = false;      // ()    の中状態
    $arrStr      = array();    // 文字列格納用変数
    $cnt         = 0;          // 文字列格納用変数のKey
    $bracket_cnt = 0;          // 何回目のカッコか
    for($i = 0; $i < strlen($sql); $i++){
        $strCurrent = $sql[$i];
        /********* 判定ここから *********/
        if(!$in_quote && in_array($strCurrent, $arrQuote) && $in_bracket){
            // クォート外でクォートが初めてでてきたときクォート中に入る
            $in_quote = true;
            $strQuote = $strCurrent;
            continue;
        }
        if($in_quote && $strCurrent == $strQuote){
            // クォート外判定
            $in_quote = false;
            $strQuote = "";
            continue;
        }
        if(!$in_bracket && $strCurrent == $arrBracket['in'] && !$in_quote){
            // クォート外でSカッコ出現時、カッコ内に入る
            $in_bracket = true;
            $bracket_cnt++;
            continue;
        }
        if($in_bracket && $strCurrent == $arrBracket['out']){
            // カッコ内でEカッコ出現時、カッコ外に出る
            $in_bracket = false;
            $cnt++;
            continue;
        }
        
        $strStr .= $strCurrent;
        /********* 判定ここまで *********/
        if(!$in_bracket && !$in_quote){
            continue;
        }

        if($in_bracket && !$in_quote && $strCurrent == ','){
        // カッコ内かつクォート外で','がでてきたとき
            $strCurrent = "";
            $cnt++;
        }
        if(!$in_quote && strlen(trim($strCurrent)) == 0){
        // 空文字ならスルー
            continue;
        }
        if(!isset($arrStr[$bracket_cnt]) || !is_array($arrStr[$bracket_cnt])){
        // はじめてでた場合、初期化
            $arrStr[$bracket_cnt] = array();
            $cnt = 0;
        }
        if(!isset($arrStr[$bracket_cnt][$cnt]) || $arrStr[$bracket_cnt][$cnt] == null){
        // はじめてでた場合、初期化
            $arrStr[$bracket_cnt][$cnt] = "";
        }
        
        $arrStr[$bracket_cnt][$cnt] .= $strCurrent;
    }
    if(count($arrStr) != 2){
        return array();
    }else{
        $arrCol = $arrStr[1];
        $arrVal = $arrStr[2];
        $arrRet = array();
        foreach($arrCol as $key => $val){
            if(isset($arrRet[$val])){
                $arrErr['sql'] = '<br />※ colに同じ値が含まれています。';
            }
            $arrRet[$val] = $arrVal[$key];
        }
        return $arrRet;
    }
    
}

?>