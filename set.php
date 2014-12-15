<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'Crypt/Blowfish.php';
define('CSV_DIR', ROOT_DIR.'csv/');

$data = array();
$data = $_GET;
if(isset($_POST) && count($_POST) > 1){ // PHPSESSIDが定義されてる
    unset($data);
    $data = $_POST;
}
// アセン保存用
$get_string  = '';
if(isset($data['mode']) && $data['mode'] == 'save'){
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
if(isset($data['mode']) && $data['mode'] == 'edit'){
    
}elseif(!isset($data['mode']) || $data['mode'] != 'edit'){
    $at_parts = _getDefaultAtParts();
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

$tmpl->display('set.html');


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
?>