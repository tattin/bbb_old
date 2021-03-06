<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'Crypt/Blowfish.php';
define('CSV_DIR', ROOT_DIR.'csv/');

$data = array();
$data = $_GET;
if(isset($_POST) && count($_POST) > 1){ // PHPSESSIDͺθ`³κΔι
    unset($data);
    $data = $_POST;
}
// AZΫΆp
$get_string  = '';
if(isset($data['mode']) && $data['mode'] == 'save'){
}

// CSVΜeν@ΜXgπζΎ
$arrHead = getHeadList();
$arrBody = getBodyList();
$arrArm = getArmList();
$arrLeg = getLegList();

// ν
$arrAssaultMain    = getAssaultMain();
$arrAssaultSub     = getAssaultSub();
$arrAssaultAssist  = getAssaultAssist();
$arrAssaultSpecial = getAssaultSpecial();
// νIπp
$arrAssaultMainSelect    = getIdValueList($arrAssaultMain);
$arrAssaultSubSelect     = getIdValueList($arrAssaultSub);
$arrAssaultAssistSelect  = getIdValueList($arrAssaultAssist);
$arrAssaultSpecialSelect = getIdValueList($arrAssaultSpecial);
// Φν
$arrHeavyMain    = getHeavyMain();
$arrHeavySub     = getHeavySub();
$arrHeavyAssist  = getHeavyAssist();
$arrHeavySpecial = getHeavySpecial();
// ΦνIπp
$arrHeavyMainSelect    = getIdValueList($arrHeavyMain);
$arrHeavySubSelect     = getIdValueList($arrHeavySub);
$arrHeavyAssistSelect  = getIdValueList($arrHeavyAssist);
$arrHeavySpecialSelect = getIdValueList($arrHeavySpecial);
// »ν
$arrSnipeMain    = getSnipeMain();
$arrSnipeSub     = getSnipeSub();
$arrSnipeAssist  = getSnipeAssist();
$arrSnipeSpecial = getSnipeSpecial();
// »νIπp
$arrSnipeMainSelect    = getIdValueList($arrSnipeMain);
$arrSnipeSubSelect     = getIdValueList($arrSnipeSub);
$arrSnipeAssistSelect  = getIdValueList($arrSnipeAssist);
$arrSnipeSpecialSelect = getIdValueList($arrSnipeSpecial);
// xν
$arrSupportMain    = getSupportMain();
$arrSupportSub     = getSupportSub();
$arrSupportAssist  = getSupportAssist();
$arrSupportSpecial = getSupportSpecial();
// xνIπp
$arrSupportMainSelect    = getIdValueList($arrSupportMain);
$arrSupportSubSelect     = getIdValueList($arrSupportSub);
$arrSupportAssistSelect  = getIdValueList($arrSupportAssist);
$arrSupportSpecialSelect = getIdValueList($arrSupportSpecial);


// ZNgΪπζΎ
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
$tmpl->assign('title', '@ΜV~[gc[ ver1.0');
// POSTl
$tmpl->assign('data', $data);
// @Μ
$tmpl->assign('arrHead', $arrHead);
$tmpl->assign('arrBody', $arrBody);
$tmpl->assign('arrArm',  $arrArm);
$tmpl->assign('arrLeg',  $arrLeg);
// 
$tmpl->assign('arrAssaultMain',    $arrAssaultMain);
$tmpl->assign('arrAssaultSub',     $arrAssaultSub);
$tmpl->assign('arrAssaultAssist',  $arrAssaultAssist);
$tmpl->assign('arrAssaultSpecial', $arrAssaultSpecial);
// Φ
$tmpl->assign('arrHeavyMain',    $arrHeavyMain);
$tmpl->assign('arrHeavySub',     $arrHeavySub);
$tmpl->assign('arrHeavyAssist',  $arrHeavyAssist);
$tmpl->assign('arrHeavySpecial', $arrHeavySpecial);
// »
$tmpl->assign('arrSnipeMain',    $arrSnipeMain);
$tmpl->assign('arrSnipeSub',     $arrSnipeSub);
$tmpl->assign('arrSnipeAssist',  $arrSnipeAssist);
$tmpl->assign('arrSnipeSpecial', $arrSnipeSpecial);
// x
$tmpl->assign('arrSupportMain',    $arrSupportMain);
$tmpl->assign('arrSupportSub',     $arrSupportSub);
$tmpl->assign('arrSupportAssist',  $arrSupportAssist);
$tmpl->assign('arrSupportSpecial', $arrSupportSpecial);

// Iπ
$tmpl->assign('arrAssaultMainSelect',    $arrAssaultMainSelect);
$tmpl->assign('arrAssaultSubSelect',     $arrAssaultSubSelect);
$tmpl->assign('arrAssaultAssistSelect',  $arrAssaultAssistSelect);
$tmpl->assign('arrAssaultSpecialSelect', $arrAssaultSpecialSelect);
// ΦIπ
$tmpl->assign('arrHeavyMainSelect',    $arrHeavyMainSelect);
$tmpl->assign('arrHeavySubSelect',     $arrHeavySubSelect);
$tmpl->assign('arrHeavyAssistSelect',  $arrHeavyAssistSelect);
$tmpl->assign('arrHeavySpecialSelect', $arrHeavySpecialSelect);
// »Iπ
$tmpl->assign('arrSnipeMainSelect',    $arrSnipeMainSelect);
$tmpl->assign('arrSnipeSubSelect',     $arrSnipeSubSelect);
$tmpl->assign('arrSnipeAssistSelect',  $arrSnipeAssistSelect);
$tmpl->assign('arrSnipeSpecialSelect', $arrSnipeSpecialSelect);
// xIπ
$tmpl->assign('arrSupportMainSelect',    $arrSupportMainSelect);
$tmpl->assign('arrSupportSubSelect',     $arrSupportSubSelect);
$tmpl->assign('arrSupportAssistSelect',  $arrSupportAssistSelect);
$tmpl->assign('arrSupportSpecialSelect', $arrSupportSpecialSelect);
// ΟΪP\
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