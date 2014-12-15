<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';
require_once 'Crypt/Blowfish.php';
require_once 'getSpec.php';
define('CSV_DIR', ROOT_DIR.'csv/');

$tmplName = ""; // �e���v���[�g
$data = array();
$data = $_GET;
if(isset($_POST) && count($_POST) > 1){ // PHPSESSID����`����Ă�
    unset($data);
    $data = $_POST;
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
if(!isset($data['mode'])){
	if(isset($data['submit_res']) && $data['submit_res'] == '�ĕ\��'){
		$data['mode'] = 'chip';
	}elseif(isset($data['submit_res']) && $data['submit_res'] == '�`�b�v�I����'){
		$data['mode'] = 'edit1';
	}else{
	}
}
switch(isset($data['mode']) ? $data['mode'] : ''){
    case 'edit1':           // �@�̑I�����`�b�v�I��
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
    default :               // �������
        $tmplName = 'set_mobile.html';
        break;
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

$tmpl->display($tmplName);

function _getBonus($data){
	if(isset($data['bonus']) && $data['bonus'] != ''){
		switch($data['bonus']){
			case 'Cougar':
				$data['bonus'] = '�d�ʑϐ�(150)';
				break;
			case 'HeavyGuard':
				$data['bonus'] = '���b(3)';
				break;
			case 'Shrike':
				$data['bonus'] = '���s';
				break;
			case 'Zebra':
				$data['bonus'] = '���G';
				break;
			case 'Enforcer':
				$data['bonus'] = '�u�[�X�g';
				break;
			case 'Kefar':
				$data['bonus'] = '�����z��';
				break;
			case 'Edge':
				$data['bonus'] = '�����[�h';
				break;
			case 'Yakusya':
				$data['bonus'] = '�_�b�V��';
				break;
			case 'Saber':
				$data['bonus'] = '�G���A�ړ�';
				break;
			case 'Discas':
				$data['bonus'] = 'SP����';
				break;
			case 'Nereid':
				$data['bonus'] = '�ˌ��␳';
				break;
			case 'Jinga':
				$data['bonus'] = '���b�N�I��';
				break;
			case 'Roji':
				$data['bonus'] = '���b(5)';
				break;
			case 'Buz':
				$data['bonus'] = '�����ړ�';
				break;
			case 'Randbalk':
				$data['bonus'] = '�d�ʑϐ�(150)';
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
// �l�̓����Ă��Ȃ��v�f���폜
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

// �A�Z���ۑ��pURL
function _getUrl($url){
    $url = str_replace('set.php', 'set_mobile.php', $url);
    $return = file_get_contents("http://tinyurl.com/api-create.php?url=http://".$url);
    return $return;
}
?>