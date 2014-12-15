<?php

require_once 'bootstrap.php';
$tmpl_name = 'insert_sql.html';

$arrList = array();
$arrErr  = array();
$data    = array();
// mode�킽�����Ƃ�����
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

// �G���[�`�F�b�N
// �G���[�������TRUE
function _hasError(&$arrErr, $arrParams){
	$result = false;
	if(!isset($arrParams['sql']) || strlen(str_replace(array(' ', '�@'), array('', ''), ($arrParams['sql']))) == 0){
		$arrErr['sql'] = '<br />SQL���𐳂������͂��Ă�������';
		$result = true;
	}
	return $result;
}


function sqlParse($arrParams, &$arrErr){
    $sql = $arrParams['sql'];
    
    $arrQuote   = array("'", "\"", "`");    // �N�H�[�g�����z��
    $arrBracket = array("in" => "(", "out" => ")");          // �J�b�R�����z��
    
    $strStr      = "";         // ������i�[�p�ϐ�
    $strQuote    = "";         // �N�H�[�g�����i�[�p�ϐ�
    $in_quote    = false;      // " ' ` �̒����
    $in_bracket  = false;      // ()    �̒����
    $arrStr      = array();    // ������i�[�p�ϐ�
    $cnt         = 0;          // ������i�[�p�ϐ���Key
    $bracket_cnt = 0;          // ����ڂ̃J�b�R��
    for($i = 0; $i < strlen($sql); $i++){
        $strCurrent = $sql[$i];
        /********* ���肱������ *********/
        if(!$in_quote && in_array($strCurrent, $arrQuote) && $in_bracket){
            // �N�H�[�g�O�ŃN�H�[�g�����߂ĂłĂ����Ƃ��N�H�[�g���ɓ���
            $in_quote = true;
            $strQuote = $strCurrent;
            continue;
        }
        if($in_quote && $strCurrent == $strQuote){
            // �N�H�[�g�O����
            $in_quote = false;
            $strQuote = "";
            continue;
        }
        if(!$in_bracket && $strCurrent == $arrBracket['in'] && !$in_quote){
            // �N�H�[�g�O��S�J�b�R�o�����A�J�b�R���ɓ���
            $in_bracket = true;
            $bracket_cnt++;
            continue;
        }
        if($in_bracket && $strCurrent == $arrBracket['out']){
            // �J�b�R����E�J�b�R�o�����A�J�b�R�O�ɏo��
            $in_bracket = false;
            $cnt++;
            continue;
        }
        
        $strStr .= $strCurrent;
        /********* ���肱���܂� *********/
        if(!$in_bracket && !$in_quote){
            continue;
        }

        if($in_bracket && !$in_quote && $strCurrent == ','){
        // �J�b�R�����N�H�[�g�O��','���łĂ����Ƃ�
            $strCurrent = "";
            $cnt++;
        }
        if(!$in_quote && strlen(trim($strCurrent)) == 0){
        // �󕶎��Ȃ�X���[
            continue;
        }
        if(!isset($arrStr[$bracket_cnt]) || !is_array($arrStr[$bracket_cnt])){
        // �͂��߂Ăł��ꍇ�A������
            $arrStr[$bracket_cnt] = array();
            $cnt = 0;
        }
        if(!isset($arrStr[$bracket_cnt][$cnt]) || $arrStr[$bracket_cnt][$cnt] == null){
        // �͂��߂Ăł��ꍇ�A������
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
                $arrErr['sql'] = '<br />�� col�ɓ����l���܂܂�Ă��܂��B';
            }
            $arrRet[$val] = $arrVal[$key];
        }
        return $arrRet;
    }
    
}

?>