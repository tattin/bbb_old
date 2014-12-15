<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'Crypt/Blowfish.php';
require_once 'getSpec.php';
define('CSV_DIR', ROOT_DIR.'csv/');

$tmplName = ""; // テンプレート
$data = array();
$data = $_GET;
if(isset($_POST) && count($_POST) > 1){ // PHPSESSIDが定義されてる
    unset($data);
    $data = $_POST;
}

// CSVの各種機体リストを取得
$arrHead = getHeadList();
$arrBody = getBodyList();
$arrArm = getArmList();
$arrLeg = getLegList();

// 麻武器
$arrAssaultMain    = getAssaultMain();
$arrAssaultSub     = getAssaultSub();
$arrAssaultAssist  = getAssaultAssist();
$arrAssaultSpecial = getAssaultSpecial();
// 麻武器選択用
$arrAssaultMainSelect    = getIdValueList($arrAssaultMain);
$arrAssaultSubSelect     = getIdValueList($arrAssaultSub);
$arrAssaultAssistSelect  = getIdValueList($arrAssaultAssist);
$arrAssaultSpecialSelect = getIdValueList($arrAssaultSpecial);
// 蛇武器
$arrHeavyMain    = getHeavyMain();
$arrHeavySub     = getHeavySub();
$arrHeavyAssist  = getHeavyAssist();
$arrHeavySpecial = getHeavySpecial();
// 蛇武器選択用
$arrHeavyMainSelect    = getIdValueList($arrHeavyMain);
$arrHeavySubSelect     = getIdValueList($arrHeavySub);
$arrHeavyAssistSelect  = getIdValueList($arrHeavyAssist);
$arrHeavySpecialSelect = getIdValueList($arrHeavySpecial);
// 砂武器
$arrSnipeMain    = getSnipeMain();
$arrSnipeSub     = getSnipeSub();
$arrSnipeAssist  = getSnipeAssist();
$arrSnipeSpecial = getSnipeSpecial();
// 砂武器選択用
$arrSnipeMainSelect    = getIdValueList($arrSnipeMain);
$arrSnipeSubSelect     = getIdValueList($arrSnipeSub);
$arrSnipeAssistSelect  = getIdValueList($arrSnipeAssist);
$arrSnipeSpecialSelect = getIdValueList($arrSnipeSpecial);
// 支武器
$arrSupportMain    = getSupportMain();
$arrSupportSub     = getSupportSub();
$arrSupportAssist  = getSupportAssist();
$arrSupportSpecial = getSupportSpecial();
// 支武器選択用
$arrSupportMainSelect    = getIdValueList($arrSupportMain);
$arrSupportSubSelect     = getIdValueList($arrSupportSub);
$arrSupportAssistSelect  = getIdValueList($arrSupportAssist);
$arrSupportSpecialSelect = getIdValueList($arrSupportSpecial);


// セレクト項目を取得
$arrHeadSelect = getHeadSelectList();
$arrBodySelect = getBodySelectList();
$arrArmSelect  = getArmSelectList();
$arrLegSelect  = getLegSelectList();

$at_parts = 0;
if(!isset($data['mode'])){
	if(isset($data['submit_res']) && $data['submit_res'] == '再表示'){
		$data['mode'] = 'chip';
	}elseif(isset($data['submit_res']) && $data['submit_res'] == 'チップ選択へ'){
		$data['mode'] = 'edit1';
	}else{
	}
}
switch(isset($data['mode']) ? $data['mode'] : ''){
    case 'edit1':           // 機体選択→チップ選択
        $data = _rmNotInputVal($data);
        $tmplName = 'set_chip.html';
        break;
    case 'chip':
        $data        = _rmNotInputVal($data);
        $data        = getAllSpec($data);
        $data        = _getSpecColor($data);
        $data        = _getBonus($data);
        $data['url'] = _getUrl($data['url']);
        $tmplName = 'set_spec.html';
        break;
    default :               // 初期画面
        $tmplName = 'set_mobile.html';
        break;
}

/***** SMARTY *****/
$tmpl = getSmartyInstance();
$tmpl->assign('title', '機体シミュレートツール ver1.0');
// POST値
$tmpl->assign('data', $data);
// 機体
$tmpl->assign('arrHead', $arrHead);
$tmpl->assign('arrBody', $arrBody);
$tmpl->assign('arrArm',  $arrArm);
$tmpl->assign('arrLeg',  $arrLeg);
// 麻
$tmpl->assign('arrAssaultMain',    $arrAssaultMain);
$tmpl->assign('arrAssaultSub',     $arrAssaultSub);
$tmpl->assign('arrAssaultAssist',  $arrAssaultAssist);
$tmpl->assign('arrAssaultSpecial', $arrAssaultSpecial);
// 蛇
$tmpl->assign('arrHeavyMain',    $arrHeavyMain);
$tmpl->assign('arrHeavySub',     $arrHeavySub);
$tmpl->assign('arrHeavyAssist',  $arrHeavyAssist);
$tmpl->assign('arrHeavySpecial', $arrHeavySpecial);
// 砂
$tmpl->assign('arrSnipeMain',    $arrSnipeMain);
$tmpl->assign('arrSnipeSub',     $arrSnipeSub);
$tmpl->assign('arrSnipeAssist',  $arrSnipeAssist);
$tmpl->assign('arrSnipeSpecial', $arrSnipeSpecial);
// 支
$tmpl->assign('arrSupportMain',    $arrSupportMain);
$tmpl->assign('arrSupportSub',     $arrSupportSub);
$tmpl->assign('arrSupportAssist',  $arrSupportAssist);
$tmpl->assign('arrSupportSpecial', $arrSupportSpecial);

// 麻選択
$tmpl->assign('arrAssaultMainSelect',    $arrAssaultMainSelect);
$tmpl->assign('arrAssaultSubSelect',     $arrAssaultSubSelect);
$tmpl->assign('arrAssaultAssistSelect',  $arrAssaultAssistSelect);
$tmpl->assign('arrAssaultSpecialSelect', $arrAssaultSpecialSelect);
// 蛇選択
$tmpl->assign('arrHeavyMainSelect',    $arrHeavyMainSelect);
$tmpl->assign('arrHeavySubSelect',     $arrHeavySubSelect);
$tmpl->assign('arrHeavyAssistSelect',  $arrHeavyAssistSelect);
$tmpl->assign('arrHeavySpecialSelect', $arrHeavySpecialSelect);
// 砂選択
$tmpl->assign('arrSnipeMainSelect',    $arrSnipeMainSelect);
$tmpl->assign('arrSnipeSubSelect',     $arrSnipeSubSelect);
$tmpl->assign('arrSnipeAssistSelect',  $arrSnipeAssistSelect);
$tmpl->assign('arrSnipeSpecialSelect', $arrSnipeSpecialSelect);
// 支選択
$tmpl->assign('arrSupportMainSelect',    $arrSupportMainSelect);
$tmpl->assign('arrSupportSubSelect',     $arrSupportSubSelect);
$tmpl->assign('arrSupportAssistSelect',  $arrSupportAssistSelect);
$tmpl->assign('arrSupportSpecialSelect', $arrSupportSpecialSelect);
// 積載猶予
$tmpl->assign('at_parts', $at_parts);

$tmpl->assign('arrHeadSelect', $arrHeadSelect);
$tmpl->assign('arrBodySelect', $arrBodySelect);
$tmpl->assign('arrArmSelect' , $arrArmSelect);
$tmpl->assign('arrLegSelect' , $arrLegSelect);

$tmpl->display($tmplName);

function _getBonus($data){
	if(isset($data['bonus']) && $data['bonus'] != ''){
		switch($data['bonus']){
			case 'Cougar':
				$data['bonus'] = '重量耐性(150)';
				break;
			case 'HeavyGuard':
				$data['bonus'] = '装甲(3)';
				break;
			case 'Shrike':
				$data['bonus'] = '歩行';
				break;
			case 'Zebra':
				$data['bonus'] = '索敵';
				break;
			case 'Enforcer':
				$data['bonus'] = 'ブースト';
				break;
			case 'Kefar':
				$data['bonus'] = '反動吸収';
				break;
			case 'Edge':
				$data['bonus'] = 'リロード';
				break;
			case 'Yakusya':
				$data['bonus'] = 'ダッシュ';
				break;
			case 'Saber':
				$data['bonus'] = 'エリア移動';
				break;
			case 'Discas':
				$data['bonus'] = 'SP供給';
				break;
			case 'Nereid':
				$data['bonus'] = '射撃補正';
				break;
			case 'Jinga':
				$data['bonus'] = 'ロックオン';
				break;
			case 'Roji':
				$data['bonus'] = '装甲(5)';
				break;
			case 'Buz':
				$data['bonus'] = '高速移動';
				break;
			case 'Randbalk':
				$data['bonus'] = '重量耐性(150)';
				break;
			default:
				
				break;
		}
	}
	return $data;
}
function _getSpecColor($data){
    foreach($data as $key => $val){
        if(preg_match('/^([head|body|arm|leg]*[0-9]+)_rank$/', $key, $match)){
            $color = '';
            switch($val){
                case 'E-':
                    $color = '#DDDDDD';
                    break;
                case 'E':
                    $color = '#CCCCCC';
                    break;
                case 'E+':
                    $color = '#BBBBBB';
                    break;
                case 'D-':
                    $color = '#EEEEFF';
                    break;
                case 'D':
                    $color = '#DDDDFF';
                    break;
                case 'D+':
                    $color = '#CCCCFF';
                    break;
                case 'C-':
                    $color = '#DDFFDD';
                    break;
                case 'C':
                    $color = '#CCFFCC';
                    break;
                case 'C+':
                    $color = '#BBFFBB';
                    break;
                case 'B-':
                    $color = '#FFEECC';
                    break;
                case 'B':
                    $color = '#FFDDBB';
                    break;
                case 'B+':
                    $color = '#FFCCAA';
                    break;
                case 'A-':
                    $color = '#FFDDDD';
                    break;
                case 'A':
                    $color = '#FFCCCC';
                    break;
                case 'A+':
                    $color = '#FFBBBB';
                    break;
            }
            $data[$match[1].'_color'] = $color;
        }
    }
    return $data;
}
// 値の入っていない要素を削除
function _rmNotInputVal($array){
    $arrTemp = array();
    foreach($array as $key => $val){
        if($val != '' && $key != 'mode'){
            $arrTemp[$key] = $val;
        }
    }
    return $arrTemp;
}
function _getDefaultAtParts(){
    global $arrHead;
    global $arrBody;
    global $arrArm;
    global $arrLeg;
    $head_w = $arrHead[1][1];
    $body_w = $arrBody[1][1];
    $arm_w  = $arrArm[1][1];
    $limit  = $arrLeg[1][1];
    $limit = $limit - ($head_w + $body_w + $arm_w);
    return $limit;
}

// アセン保存用URL
function _getUrl($url){
    $url = str_replace('set.php', 'set_mobile.php', $url);
    $return = file_get_contents("http://tinyurl.com/api-create.php?url=http://".$url);
    return $return;
}
?>