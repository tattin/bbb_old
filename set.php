<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'Crypt/Blowfish.php';
define('CSV_DIR', ROOT_DIR.'csv/');

$data = array();
$data = $_GET;
if(isset($_POST) && count($_POST) > 1){ // PHPSESSID����`����Ă�
    unset($data);
    $data = $_POST;
}
// �A�Z���ۑ��p
$get_string  = '';
if(isset($data['mode']) && $data['mode'] == 'save'){
}

// CSV�̊e��@�̃��X�g���擾
$arrHead = getHeadList();
$arrBody = getBodyList();
$arrArm = getArmList();
$arrLeg = getLegList();

// ������
$arrAssaultMain    = getAssaultMain();
$arrAssaultSub     = getAssaultSub();
$arrAssaultAssist  = getAssaultAssist();
$arrAssaultSpecial = getAssaultSpecial();
// ������I��p
$arrAssaultMainSelect    = getIdValueList($arrAssaultMain);
$arrAssaultSubSelect     = getIdValueList($arrAssaultSub);
$arrAssaultAssistSelect  = getIdValueList($arrAssaultAssist);
$arrAssaultSpecialSelect = getIdValueList($arrAssaultSpecial);
// �֕���
$arrHeavyMain    = getHeavyMain();
$arrHeavySub     = getHeavySub();
$arrHeavyAssist  = getHeavyAssist();
$arrHeavySpecial = getHeavySpecial();
// �֕���I��p
$arrHeavyMainSelect    = getIdValueList($arrHeavyMain);
$arrHeavySubSelect     = getIdValueList($arrHeavySub);
$arrHeavyAssistSelect  = getIdValueList($arrHeavyAssist);
$arrHeavySpecialSelect = getIdValueList($arrHeavySpecial);
// ������
$arrSnipeMain    = getSnipeMain();
$arrSnipeSub     = getSnipeSub();
$arrSnipeAssist  = getSnipeAssist();
$arrSnipeSpecial = getSnipeSpecial();
// ������I��p
$arrSnipeMainSelect    = getIdValueList($arrSnipeMain);
$arrSnipeSubSelect     = getIdValueList($arrSnipeSub);
$arrSnipeAssistSelect  = getIdValueList($arrSnipeAssist);
$arrSnipeSpecialSelect = getIdValueList($arrSnipeSpecial);
// �x����
$arrSupportMain    = getSupportMain();
$arrSupportSub     = getSupportSub();
$arrSupportAssist  = getSupportAssist();
$arrSupportSpecial = getSupportSpecial();
// �x����I��p
$arrSupportMainSelect    = getIdValueList($arrSupportMain);
$arrSupportSubSelect     = getIdValueList($arrSupportSub);
$arrSupportAssistSelect  = getIdValueList($arrSupportAssist);
$arrSupportSpecialSelect = getIdValueList($arrSupportSpecial);


// �Z���N�g���ڂ��擾
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
$tmpl->assign('title', '�@�̃V�~�����[�g�c�[�� ver1.0');
// POST�l
$tmpl->assign('data', $data);
// �@��
$tmpl->assign('arrHead', $arrHead);
$tmpl->assign('arrBody', $arrBody);
$tmpl->assign('arrArm',  $arrArm);
$tmpl->assign('arrLeg',  $arrLeg);
// ��
$tmpl->assign('arrAssaultMain',    $arrAssaultMain);
$tmpl->assign('arrAssaultSub',     $arrAssaultSub);
$tmpl->assign('arrAssaultAssist',  $arrAssaultAssist);
$tmpl->assign('arrAssaultSpecial', $arrAssaultSpecial);
// ��
$tmpl->assign('arrHeavyMain',    $arrHeavyMain);
$tmpl->assign('arrHeavySub',     $arrHeavySub);
$tmpl->assign('arrHeavyAssist',  $arrHeavyAssist);
$tmpl->assign('arrHeavySpecial', $arrHeavySpecial);
// ��
$tmpl->assign('arrSnipeMain',    $arrSnipeMain);
$tmpl->assign('arrSnipeSub',     $arrSnipeSub);
$tmpl->assign('arrSnipeAssist',  $arrSnipeAssist);
$tmpl->assign('arrSnipeSpecial', $arrSnipeSpecial);
// �x
$tmpl->assign('arrSupportMain',    $arrSupportMain);
$tmpl->assign('arrSupportSub',     $arrSupportSub);
$tmpl->assign('arrSupportAssist',  $arrSupportAssist);
$tmpl->assign('arrSupportSpecial', $arrSupportSpecial);

// ���I��
$tmpl->assign('arrAssaultMainSelect',    $arrAssaultMainSelect);
$tmpl->assign('arrAssaultSubSelect',     $arrAssaultSubSelect);
$tmpl->assign('arrAssaultAssistSelect',  $arrAssaultAssistSelect);
$tmpl->assign('arrAssaultSpecialSelect', $arrAssaultSpecialSelect);
// �֑I��
$tmpl->assign('arrHeavyMainSelect',    $arrHeavyMainSelect);
$tmpl->assign('arrHeavySubSelect',     $arrHeavySubSelect);
$tmpl->assign('arrHeavyAssistSelect',  $arrHeavyAssistSelect);
$tmpl->assign('arrHeavySpecialSelect', $arrHeavySpecialSelect);
// ���I��
$tmpl->assign('arrSnipeMainSelect',    $arrSnipeMainSelect);
$tmpl->assign('arrSnipeSubSelect',     $arrSnipeSubSelect);
$tmpl->assign('arrSnipeAssistSelect',  $arrSnipeAssistSelect);
$tmpl->assign('arrSnipeSpecialSelect', $arrSnipeSpecialSelect);
// �x�I��
$tmpl->assign('arrSupportMainSelect',    $arrSupportMainSelect);
$tmpl->assign('arrSupportSubSelect',     $arrSupportSubSelect);
$tmpl->assign('arrSupportAssistSelect',  $arrSupportAssistSelect);
$tmpl->assign('arrSupportSpecialSelect', $arrSupportSpecialSelect);
// �ύڗP�\
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