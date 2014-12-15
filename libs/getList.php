<?php

function getFullSet($head, $body, $arm, $leg){
	$arrCougar     = getCougar();
	$arrHeavyGuard = getHeavyGuard();
	$arrShrike     = getShrike();
	$arrZebra      = getZebra();
	$arrEnforcer   = getEnforcer();
	$arrKefar      = getKefar();
	$arrEdge       = getEdge();
	$arrYakusya    = getYakusya();
	$arrSaber      = getSaber();
	$arrDiscas     = getDiscas();
	$arrNereid     = getNereid();
	$arrJinga      = getJinga();
	$arrRoji       = getRoji();
	$arrBuz        = getBuz();
	$arrRandbalk   = getRandbalk();
	
	if(in_array($head, $arrCougar) && in_array($body, $arrCougar) && in_array($arm, $arrCougar) && in_array($leg, $arrCougar)){
		return 'Cougar';
	}
	if(in_array($head, $arrHeavyGuard) && in_array($body, $arrHeavyGuard) && in_array($arm, $arrHeavyGuard) && in_array($leg, $arrHeavyGuard)){
		return 'HeavyGuard';
	}
	if(in_array($head, $arrShrike) && in_array($body, $arrShrike) && in_array($arm, $arrShrike) && in_array($leg, $arrShrike)){
		return 'Shrike';
	}
	if(in_array($head, $arrZebra) && in_array($body, $arrZebra) && in_array($arm, $arrZebra) && in_array($leg, $arrZebra)){
		return 'Zebra';
	}
	if(in_array($head, $arrEnforcer) && in_array($body, $arrEnforcer) && in_array($arm, $arrEnforcer) && in_array($leg, $arrEnforcer)){
		return 'Enforcer';
	}
	if(in_array($head, $arrKefar) && in_array($body, $arrKefar) && in_array($arm, $arrKefar) && in_array($leg, $arrKefar)){
		return 'Kefar';
	}
	if(in_array($head, $arrEdge) && in_array($body, $arrEdge) && in_array($arm, $arrEdge) && in_array($leg, $arrEdge)){
		return 'Edge';
	}
	if(in_array($head, $arrYakusya) && in_array($body, $arrYakusya) && in_array($arm, $arrYakusya) && in_array($leg, $arrYakusya)){
		return 'Yakusya';
	}
	if(in_array($head, $arrSaber) && in_array($body, $arrSaber) && in_array($arm, $arrSaber) && in_array($leg, $arrSaber)){
		return 'Saber';
	}
	if(in_array($head, $arrDiscas) && in_array($body, $arrDiscas) && in_array($arm, $arrDiscas) && in_array($leg, $arrDiscas)){
		return 'Discas';
	}
	if(in_array($head, $arrNereid) && in_array($body, $arrNereid) && in_array($arm, $arrNereid) && in_array($leg, $arrNereid)){
		return 'Nereid';
	}
	if(in_array($head, $arrJinga) && in_array($body, $arrJinga) && in_array($arm, $arrJinga) && in_array($leg, $arrJinga)){
		return 'Jinga';
	}
	if(in_array($head, $arrRoji) && in_array($body, $arrRoji) && in_array($arm, $arrRoji) && in_array($leg, $arrRoji)){
		return 'Roji';
	}
	if(in_array($head, $arrBuz) && in_array($body, $arrBuz) && in_array($arm, $arrBuz) && in_array($leg, $arrBuz)){
		return 'Buz';
	}
	if(in_array($head, $arrRandbalk) && in_array($body, $arrRandbalk) && in_array($arm, $arrRandbalk) && in_array($leg, $arrRandbalk)){
		return 'Randbalk';
	}
	return '';
}

function getDashAvg($speed){
	$speed = ($speed * 0.6);
	return $speed;
}

// ���ߌv�Z��̐�AC���x
function getACspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.6);
	return $speed;
}
// ���ߌv�Z��̒\�y���x
function getDISspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.3);
	return $speed;
}
// ���ߌv�Z���MW���x
function getMWspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.25);
	return $speed;
}
// ���ߌv�Z���MW2���x
function getMW2speed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.1);
	return $speed;
}

// �t���Z�b�g�v�Z�p
function getCougar(){
	$array = array('1', '2', '23', '45');
	return $array;
}
function getHeavyGuard(){
	$array = array('3', '4', '5');
	return $array;
}
function getShrike(){
	$array = array('6', '7', '8');
	return $array;
}
function getZebra(){
	$array = array('9', '10', '11');
	return $array;
}
function getEnforcer(){
	$array = array('12', '13', '18');
	return $array;
}
function getKefar(){
	$array = array('14', '15', '19');
	return $array;
}
function getEdge(){
	$array = array('16', '17', '20');
	return $array;
}
function getYakusya(){
	$array = array('21', '22', '30');
	return $array;
}
function getSaber(){
	$array = array('24', '25', '28');
	return $array;
}
function getDiscas(){
	$array = array('26', '27', '29');
	return $array;
}
function getNereid(){
	$array = array('31', '32', '33');
	return $array;
}
function getJinga(){
	$array = array('34', '35', '38');
	return $array;
}
function getRoji(){
	$array = array('36', '37', '39');
	return $array;
}
function getBuz(){
	$array = array('40', '41', '42');
	return $array;
}
function getRandbalk(){
	$array = array('43', '44');
	return $array;
}

function getHeadSelectList(){
    $array = getHeadList();
    $array = getSelectList($array);
    return $array;
}
function getBodySelectList(){
    $array = getBodyList();
    $array = getSelectList($array);
    return $array;
}
function getArmSelectList(){
    $array = getArmList();
    $array = getSelectList($array);
    return $array;
}
function getLegSelectList(){
    $array = getLegList();
    $array = getSelectList($array);
    return $array;
}
// head�̒l���Q�Ƃɂ���ID=>VALUE�`���ŕԂ�
function getSelectList($array){
    $arrTemp = array();
    foreach($array as $key => $val){
        $arrTemp[$val[6]] = $val[0].'('.$val[7].')';
    }
    return $arrTemp;
}

function getHeadList(){
	$array = array();
	$array = getListFromCSV('head27.csv');
	return $array;
}
function getBodyList(){
	$array = array();
	$array = getListFromCSV('body27.csv');
	return $array;
}
function getArmList(){
	$array = array();
	$array = getListFromCSV('arm27.csv');
	return $array;
}
function getLegList(){
	$array = array();
	$array = getListFromCSV('leg27.csv');
	return $array;
}
function getListFromCSV($csv = ''){
    if($csv == '' || !file_exists('../csv/'.$csv)){
    // �t�@�C���w�肪�Ȃ��ꍇ
        return array();
    }
    $array = array();
    $fp = fopen('../csv/'.$csv, "r");
    while($line = fgetcsv($fp)){
        $array[$line[6]] = $line;
    }
    return $array;
}

// ������I��p�ɔz��ϊ�
function getIdValueList($array){
    $arrTemp = array();
    foreach($array as $key => $val){
        $arrTemp[$key] = $val['name'];
    }
    return $arrTemp;
}
/***** �e������ *****/
function getAssaultMain(){
    $array = array(
         0 => array('name' => 'M90�T�u�}�V���K��',       'weight' => '140'),
         1 => array('name' => 'M90C�T�u�}�V���K��',      'weight' => '160'),
         2 => array('name' => 'M91�T�u�}�V���K��',       'weight' => '200'),
         3 => array('name' => 'M99�T�[�y���g',           'weight' => '180'),
         4 => array('name' => '���H���y�ˌ��e',          'weight' => '180'),
         5 => array('name' => '���H���y�ˌ��eC',         'weight' => '170'),
         6 => array('name' => '���H���y�ˌ��eFAM',       'weight' => '200'),
         7 => array('name' => '���H���y�E�X�R�[�s�I',    'weight' => '220'),
         8 => array('name' => '���H���y�E���K��',        'weight' => '240'),
         9 => array('name' => '�d�������C�E�뎮',        'weight' => '200'),
        10 => array('name' => '�d�������C�E��',        'weight' => '210'),
        11 => array('name' => '�d�������C�E����',        'weight' => '230'),
        12 => array('name' => '�d�������C�E���d',        'weight' => '260'),
        13 => array('name' => 'VOLT-01',                 'weight' => '190'),
        14 => array('name' => 'VOLT-02',                 'weight' => '180'),
        15 => array('name' => 'VOLT-R',                  'weight' => '210'),
        16 => array('name' => 'VOLT-X',                  'weight' => '230'),
        17 => array('name' => 'VOLT-RX',                 'weight' => '250'),
        18 => array('name' => 'STAR-05',                 'weight' => '230'),
        19 => array('name' => 'STAR-10',                 'weight' => '220'),
        20 => array('name' => 'STAR-10C',                'weight' => '260'),
        24 => array('name' => 'STAR-20',                 'weight' => '250'),
        21 => array('name' => 'D90�f���A��',             'weight' => '290'),
        22 => array('name' => 'D90�J�X�^��',             'weight' => '270'),
        23 => array('name' => 'D92�W�F�C�i�X',           'weight' => '310'),
    );
    return $array;
}
function getAssaultSub(){
    $array = array(
		 0 => array('name' => '38�^��֒e',             'weight' => '80'),
		 1 => array('name' => '40�^�y�ʎ�֒e',         'weight' => '90'),
		 2 => array('name' => '41�^������֒e',         'weight' => '140'),
		 3 => array('name' => '�O���l�[�h�����`���[',   'weight' => '220'),
		 4 => array('name' => '����G�����`���[',        'weight' => '250'),
		 5 => array('name' => '�����^G�����`���[',      'weight' => '330'),
		 6 => array('name' => '�A�ˎ�G�����`���[',      'weight' => '320'),
		 7 => array('name' => '�g�U�^G�����`���[',      'weight' => '360'),
		 8 => array('name' => '�~�T�C���X���A�[',       'weight' => '350'),
		 9 => array('name' => 'MSL-�n�C��',             'weight' => '360'),
		10 => array('name' => 'MSL-�i�C�_�X',           'weight' => '380'),
		11 => array('name' => 'MSL-�X�E�H�[��',         'weight' => '420'),
		12 => array('name' => '39�^�N���b�J�[',         'weight' => '100'),
		13 => array('name' => '40�^�N���b�J�[',         'weight' => '110'),
		14 => array('name' => '�`�F�C���{��',           'weight' => '140'),
		15 => array('name' => '�`�F�C���{��S',          'weight' => '120'),
    );
    return $array;
}
function getAssaultAssist(){
    $array = array(
		 0 => array('name' => '�f���G���\�[�h',     'weight' => '220'),
		 1 => array('name' => '�}�[�V�����\�[�h',   'weight' => '460'),
		 2 => array('name' => 'SW-�e�B�A�_�E�i�[',  'weight' => '650'),
		 3 => array('name' => '�����O�X�s�A',       'weight' => '190'),
		 4 => array('name' => '�s�A�V���O�X�s�A',   'weight' => '340'),
		 5 => array('name' => 'SP-�y�l�g���[�^�[',  'weight' => '480'),
		 6 => array('name' => '���q�g���b�T�[',     'weight' => '180'),
		 7 => array('name' => '���q�g���b�T�[�U',   'weight' => '300'),
		 8 => array('name' => 'LM-�W���I�X',        'weight' => '390'),
		 9 => array('name' => '�X�p�[�N���b�h',     'weight' => '200'),
		10 => array('name' => '�X�p�[�N���b�h�U',   'weight' => '330'),
		11 => array('name' => 'SR-���@�W����',      'weight' => '420'),
    );
    return $array;
}
function getAssaultSpecial(){
    $array = array(
    	0 => array('name' => '�A�T���g�`���[�W���[', 'weight' => '260'),
    	1 => array('name' => 'AC-�}���`�E�F�C',   'weight' => '230'),
    	2 => array('name' => 'AC-�f�B�X�^���X', 'weight' => '300'),
    	3 => array('name' => 'AC-�}���`�E�F�C�U',  'weight' => '280'),
    );
    return $array;
}
function getHeavyMain(){
    $array = array(
		 0 => array('name' => '�E�B�[�[���@�֏e',       'weight' => '280'),
		 1 => array('name' => '�E�B�[�[���@�֏eR',      'weight' => '300'),
		 2 => array('name' => '�E�B�[�[���E���s�b�h',   'weight' => '320'),
		 3 => array('name' => '�E�B�[�[���E�R���i',     'weight' => '340'),
		 4 => array('name' => 'GAX�K�g�����O�K��',      'weight' => '350'),
		 5 => array('name' => 'GAX�G���t�@���g',        'weight' => '400'),
		 6 => array('name' => 'GAX�E�b�h�y�b�J�[',      'weight' => '380'),
		 7 => array('name' => 'GAX�_�C�i�\�A',          'weight' => '460'),
		 8 => array('name' => '�P���@�֖C',             'weight' => '420'),
		 9 => array('name' => '�P���@�֖C�E��',         'weight' => '440'),
		10 => array('name' => '�o��@�֖C',             'weight' => '500'),
		11 => array('name' => '�o��@�֖C�E�{��',       'weight' => '530'),
		12 => array('name' => '�����J��LG1',            'weight' => '270'),
		13 => array('name' => '�����J��LG2',            'weight' => '280'),
		14 => array('name' => '�����J��MC',             'weight' => '320'),
		15 => array('name' => '�����J���E�����@',       'weight' => '310'),
		16 => array('name' => 'LAC-�O���[��',           'weight' => '440'),
		17 => array('name' => 'LAC-�O���[����',         'weight' => '460'),
		18 => array('name' => 'LAC-�O���[����',         'weight' => '540'),
    );
    return $array;
}
function getHeavySub(){
    $array = array(
		 0 => array('name' => '�T���[�h���P�b�g',       'weight' => '480'),
		 1 => array('name' => '�T���[�h�E�J�X�^��',     'weight' => '500'),
		 2 => array('name' => '�T���[�h�E�o���[�W',     'weight' => '490'),
		 3 => array('name' => '�T���[�h�E�R���O',       'weight' => '540'),
		 4 => array('name' => '�T���[�h�E�X�}�C�g',     'weight' => '490'),
		 5 => array('name' => '�v���Y�}�J�m��',         'weight' => '450'),
		 6 => array('name' => '�v���Y�}�J�m��Mk-2',     'weight' => '460'),
		 7 => array('name' => '�v���Y�}�J�m��XM',       'weight' => '500'),
		 8 => array('name' => '�v���Y�}�J�m���E�l�I',   'weight' => '480'),
		 9 => array('name' => '�v���Y�}�J�m��UG',       'weight' => '470'),
		10 => array('name' => '�`���[�W�J�m��',         'weight' => '490'),
		11 => array('name' => '�`���[�W�J�m��Mk-2',     'weight' => '500'),
		12 => array('name' => '�`���[�W�J�m��C',        'weight' => '530'),
		13 => array('name' => '�����^MLRS',             'weight' => '520'),
		14 => array('name' => '�����^MLRS',             'weight' => '550'),
		15 => array('name' => '�����^MLRS',             'weight' => '600'),
		16 => array('name' => '���A���^MLRS',           'weight' => '620'),
		17 => array('name' => '�V�[�J�[���P�b�g',       'weight' => '470'),
		18 => array('name' => '�g���C�V�[�J�[',         'weight' => '510'),
		19 => array('name' => '�p���[�h�V�[�J�[',       'weight' => '520'),
    );
    return $array;
}
function getHeavyAssist(){
    $array = array(
		0 => array('name' => 'ECM�O���l�[�h',           'weight' => '140'),
		1 => array('name' => '�����^ECM�O���l�[�h',     'weight' => '160'),
		2 => array('name' => '�V�^ECM�O���l�[�h',       'weight' => '120'),
		6 => array('name' => '���ǌ^ECM�O���l�[�h',     'weight' => '170'),
		3 => array('name' => '�A�[���p�C�N',            'weight' => '230'),
		4 => array('name' => '�w���B�p�C�N',            'weight' => '260'),
		5 => array('name' => '���x�[�W�p�C�N',          'weight' => '300'),
    );
    return $array;
}
function getHeavySpecial(){
    $array = array(
		 0 => array('name' => '�^�C�^���֒e�C',     'weight' => '900'),
		 1 => array('name' => '�R���b�T�X�֒e�C',   'weight' => '940'),
		 2 => array('name' => '�A�g�����g�֒e�C',   'weight' => '1010'),
		 3 => array('name' => '�M�K�m�g�֒e�C',     'weight' => '1050'),
		 4 => array('name' => '�G�A�o�X�^�[T10',    'weight' => '720'),
		 5 => array('name' => '�G�A�o�X�^�[T25',    'weight' => '890'),
		 6 => array('name' => '�G�A�o�X�^�[XHR ',   'weight' => '930'),
		 7 => array('name' => '�G�A�o�X�^�[T30',    'weight' => '660'),
		 8 => array('name' => '�o���A���j�b�g',     'weight' => '710'),
		 9 => array('name' => '�o���A���j�b�g��',   'weight' => '680'),
		10 => array('name' => 'UAD-������',         'weight' => '600'),
		11 => array('name' => 'UAD-�P���u',         'weight' => '620'),
    );
    return $array;
}
function getSnipeMain(){
    $array = array(
		 0 => array('name' => '38���_���e',            'weight' => '200'),
		 1 => array('name' => '38���_���e�E��',        'weight' => '240'),
		 2 => array('name' => '38���_���e�E�V��',      'weight' => '210'),
		 3 => array('name' => '38���_���e�E����',      'weight' => '260'),
		 5 => array('name' => '�C�[�O���A�CV44',       'weight' => '190'),
		 6 => array('name' => '�C�[�O���A�CTF',        'weight' => '170'),
		 7 => array('name' => '�C�[�O���A�C�E�[��',    'weight' => '230'),
		 8 => array('name' => '�C�[�O���A�CVX',        'weight' => '240'),
		 9 => array('name' => '�o�g�����C�t��',        'weight' => '190'),
		10 => array('name' => '�o�g�����C�t��BF',      'weight' => '210'),
		11 => array('name' => '�o�g�����C�t��BF2',     'weight' => '230'),
		12 => array('name' => '�y��_���e',            'weight' => '320'),
		13 => array('name' => '�y��_���e�E��',        'weight' => '300'),
		14 => array('name' => '�y��_���e�E�A��',      'weight' => '360'),
		15 => array('name' => 'LZ-�f�C���C�g',         'weight' => '250'),
		16 => array('name' => 'LZ-�f�C���C�gS',        'weight' => '260'),
		17 => array('name' => 'LZ-�g���C�A�h',         'weight' => '280'),
		18 => array('name' => 'LZ-���F�X�p�C��',       'weight' => '300'),
		19 => array('name' => '�u���C�U�[',            'weight' => '290'),
		20 => array('name' => '�u���C�U�[RF',          'weight' => '320'),
		21 => array('name' => '�u���C�U�[�E�A�O�j',    'weight' => '350'),
		22 => array('name' => '�u���C�U�[�E�o�[�X�g',  'weight' => '360'),
    );
    return $array;
}
function getSnipeSub(){
    $array = array(
		 0 => array('name' => '�}�[�Q�CM40',            'weight' => '100'),
		 1 => array('name' => '�}�[�Q�C�E�J�X�^��',     'weight' => '120'),
		 2 => array('name' => '�}�[�Q�CRF',             'weight' => '140'),
		 3 => array('name' => '�}�[�Q�C�E�X�g���C�t',   'weight' => '130'),
		 4 => array('name' => '�}�[�Q�C�E�o���A���X',   'weight' => '150'),
		 5 => array('name' => '�����F���[',             'weight' => '120'),
		 6 => array('name' => '�����F���[C',            'weight' => '130'),
		 7 => array('name' => '�����F���[R',            'weight' => '140'),
		 8 => array('name' => '�����F���[�E�u���[�g',   'weight' => '160'),
		 9 => array('name' => '�����F���[RR',           'weight' => '150'),
		10 => array('name' => '�W�����v�}�C��',         'weight' => '150'),
		11 => array('name' => '�W�����v�}�C��S ',       'weight' => '160'),
		12 => array('name' => '�W�����v�}�C��V',        'weight' => '200'),
		13 => array('name' => '�X�e�B�b�L�[�{��',       'weight' => '120'),
		14 => array('name' => '�X�e�B�b�L�[�{��S',      'weight' => '130'),
		15 => array('name' => '���C�h�V���b�g',         'weight' => '140'),
		16 => array('name' => '���C�h�V���b�gTF',       'weight' => '160'),
		17 => array('name' => '���C�h�V���b�gX',        'weight' => '170'),
    );
    return $array;
}
function getSnipeAssist(){
    $array = array(
    	0 => array('name' => '�Z���g���[�K��SMG',  'weight' => '380'),
    	1 => array('name' => '�Z���g���[�K��AC',   'weight' => '410'),
    	2 => array('name' => '�Z���g���[�K��LZ',   'weight' => '420'),
    	3 => array('name' => '���U���u���[�h',     'weight' => '160'),
    	4 => array('name' => '�V�^���U���u���[�h', 'weight' => '170'),
    	5 => array('name' => '�������U���u���[�h', 'weight' => '250'),
    );
    return $array;
}
function getSnipeSpecial(){
    $array = array(
    	 0 => array('name' => '�V�[���h�������u',           'weight' => '320'),
    	 1 => array('name' => '�V�[���h�������u�E��',       'weight' => '380'),
    	 2 => array('name' => '���o�̓V�[���h',             'weight' => '400'),
    	 3 => array('name' => '���w���ʁE����^',           'weight' => '260'),
    	 4 => array('name' => '���w���ʁE���p�^',           'weight' => '330'),
    	 5 => array('name' => '���w���ʁE�ϋv�^',           'weight' => '340'),
    	 6 => array('name' => '�}�O�l�^�C�U�[',             'weight' => '350'),
    	 7 => array('name' => '�}�O�l�^�C�U�[��',           'weight' => '390'),
    	 8 => array('name' => '�}�O�l�^�C�U�[��',           'weight' => '410'),
    	 9 => array('name' => '�Ə��␳���u�E����',         'weight' => '280'),
    	10 => array('name' => '�Ə��␳���u�E�ϋv',         'weight' => '250'),
    );
    return $array;
}
function getSupportMain(){
    $array = array(
	     0 => array('name' => '�X�}�b�N�V���b�g',       'weight' => '180'),
	     1 => array('name' => '���C�h�X�}�b�N',         'weight' => '240'),
	     2 => array('name' => '�N�C�b�N�X�}�b�N',       'weight' => '170'),
	     3 => array('name' => '�X�}�b�N�V���b�gSP',     'weight' => '220'),
	     5 => array('name' => 'ASG-�X�B�[�p�[',         'weight' => '180'),
	     6 => array('name' => 'ASG-�X�B�[�p�[R',        'weight' => '230'),
	     7 => array('name' => 'ASG-�A���@�����`',       'weight' => '260'),
	     8 => array('name' => 'ASG-�X�B�[�p�[RX',       'weight' => '200'),
	     9 => array('name' => 'LSG-�A�u���[��',         'weight' => '230'),
	    10 => array('name' => 'LSG-�A�u���[����',       'weight' => '270'),
	    11 => array('name' => 'LSG-�A�u���[����',       'weight' => '210'),
	    12 => array('name' => 'LSG-���h�D�K',           'weight' => '280'),
	    13 => array('name' => '�l�C���K��',             'weight' => '140'),
	    14 => array('name' => '�A�b�p�[�l�C��',         'weight' => '160'),
	    15 => array('name' => '�l�C���K��TF',           'weight' => '170'),
	    16 => array('name' => '���s�b�h�l�C��',         'weight' => '220'),
	    17 => array('name' => '�X�p�[�W�l�C��',         'weight' => '180'),
	    18 => array('name' => '�n�K�[�hM50',            'weight' => '170'),
	    19 => array('name' => '�n�K�[�h�E�J�X�^��',     'weight' => '160'),
	    20 => array('name' => '�n�K�[�hRF',             'weight' => '190'),
    );
    return $array;
}
function getSupportSub(){
    $array = array(
		 0 => array('name' => '�w���B�}�C��',       'weight' => '260'),
		 1 => array('name' => '�w���B�}�C��S',      'weight' => '240'),
		 2 => array('name' => '�w���B�}�C��V',      'weight' => '320'),
		 3 => array('name' => '�����[�g�{��',       'weight' => '300'),
		 4 => array('name' => '�����y�b�g�{��S',    'weight' => '260'),
		 5 => array('name' => '�����y�b�g�{��V',    'weight' => '360'),
		 6 => array('name' => '44�^���V�@��',       'weight' => '180'),
		 7 => array('name' => '44�^���V�@��S',      'weight' => '200'),
		12 => array('name' => '45�^���V�@��',       'weight' => '240'),
		 8 => array('name' => '�z�o�[�}�C��',       'weight' => '220'),
		 9 => array('name' => '�z�o�[�}�C��S',      'weight' => '250'),
		10 => array('name' => 'N60�f�g�l�[�^�[',    'weight' => '290'),
		11 => array('name' => 'N60�f�g�l�[�^�[R',   'weight' => '320'),
    );
    return $array;
}
function getSupportAssist(){
    $array = array(
    	 0 => array('name' => '���[�N��@�@',       'weight' => '400'),
    	 1 => array('name' => '�t�@���R����@�@',   'weight' => '420'),
    	 2 => array('name' => '�A�E����@�@',       'weight' => '460'),
    	 3 => array('name' => '���r����@�@',       'weight' => '410'),
    	 4 => array('name' => '���G�Z���T�[',       'weight' => '350'),
    	 5 => array('name' => '���^���G�Z���T�[',   'weight' => '280'),
    	 6 => array('name' => '�L����G�Z���T�[',   'weight' => '400'),
    	 7 => array('name' => '�y�ʍ��G�Z���T�[',   'weight' => '250'),
    	 8 => array('name' => '�X�^�i�[J',          'weight' => '320'),
    	 9 => array('name' => '�X�^�i�[J2',         'weight' => '350'),
    	10 => array('name' => '�X�^�i�[K',          'weight' => '370'),
    	11 => array('name' => '�e��BOX',            'weight' => '300'),
    );
    return $array;
}
function getSupportSpecial(){
    $array = array(
    	0 => array('name' => '���y�A���j�b�g',      'weight' => '560'),
    	1 => array('name' => '���y�A���j�b�g��',    'weight' => '600'),
    	2 => array('name' => '���y�A���j�b�g��',    'weight' => '620'),
    	3 => array('name' => '���y�A�|�X�g',        'weight' => '480'),
    	4 => array('name' => '���y�A�|�X�g��',      'weight' => '520'),
    	5 => array('name' => '���y�A�|�X�g��',      'weight' => '530'),
    	6 => array('name' => '���y�A�V���b�g',      'weight' => '490'),
    	7 => array('name' => '���y�A�V���b�g��',    'weight' => '540'),
    	8 => array('name' => '���y�A�V���b�g��',    'weight' => '510'),
    );
    return $array;
}

// �l��\�L�ɕϊ�
function getMapping(){
    $array = array(
         '1' => 'E-',  '2' => 'E',  '3' => 'E+',
         '4' => 'D-',  '5' => 'D',  '6' => 'D+',
         '7' => 'C-',  '8' => 'C',  '9' => 'C+',
        '10' => 'B-', '11' => 'B', '12' => 'B+',
        '13' => 'A-', '14' => 'A', '15' => 'A+'
    );
    return $array;
}
// ���b
function getArmer(){
    $array = array(
         '1' => '00',   '2' => '68',   '3' => '75', 
         '4' => '75',   '5' => '81',   '6' => '87', 
         '7' => '00',   '8' => '95',   '9' => '100', 
        '10' => '105', '11' => '110', '12' => '115', 
        '13' => '00',  '14' => '122', '15' => '129', 
    );
    return $array;
}
function getLockOn(){
    $array = array(
         '1' => '00',   '2' => '30',   '3' => '40', 
         '4' => '45',   '5' => '50',   '6' => '60', 
         '7' => '65',   '8' => '70',   '9' => '75', 
        '10' => '85',  '11' => '90',  '12' => '100', 
        '13' => '110', '14' => '115', '15' => '120', 
    );
    return $array;
}
function getRevision(){
    $array = array(
         '1' => '00',   '2' => '76',   '3' => '00', 
         '4' => '84',   '5' => '00',   '6' => '00', 
         '7' => '96',   '8' => '100',  '9' => '00', 
        '10' => '108', '11' => '112', '12' => '116', 
        '13' => '120', '14' => '00',  '15' => '130', 
    );
    return $array;
}
function getSearch(){
    $array = array(
         '1' => '00',   '2' => '105',  '3' => '120', 
         '4' => '135',  '5' => '150',  '6' => '165', 
         '7' => '180',  '8' => '195',  '9' => '210', 
        '10' => '225', '11' => '00',  '12' => '255', 
        '13' => '280', '14' => '00',  '15' => '300', 
    );
    return $array;
}
function getBoost(){
    $array = array(
         '1' => '0',  '2' => '60',   '3' => '70', 
         '4' => '75',  '5' => '80',   '6' => '85', 
         '7' => '90',  '8' => '95',   '9' => '100', 
        '10' => '105', '11' => '110', '12' => '115', 
        '13' => '120','14' => '125', '15' => '130', 
    );
    return $array;
}
function getSP(){
    $array = array(
         '1' => '0',    '2' => '50',  '3' => '65', 
         '4' => '0',    '5' => '90',  '6' => '100', 
         '7' => '110',  '8' => '120',  '9' => '135', 
        '10' => '145', '11' => '150', '12' => '160', 
        '13' => '170', '14' => '0',  '15' => '200', 
    );
    return $array;
}
function getArea(){
    $array = array(
         '1' => '0',    '2' => '7.0', '3' => '0', 
         '4' => '0',    '5' => '6.0', '6' => '0', 
         '7' => '5.5',  '8' => '0',   '9' => '5.0', 
        '10' => '4.5', '11' => '0',  '12' => '4', 
        '13' => '3.5', '14' => '0',  '15' => '3.0', 
    );
    return $array;
}
function getReload(){
    $array = array(
         '1' => '0',    '2' => '70',   '3' => '80', 
         '4' => '85',   '5' => '90',   '6' => '95', 
         '7' => '100',  '8' => '105',  '9' => '110', 
        '10' => '115', '11' => '120', '12' => '125', 
        '13' => '135', '14' => '140', '15' => '145', 
    );
    return $array;
}
function getChange(){
    $array = array(
         '1' => '0',    '2' => '70',   '3' => '0', 
         '4' => '80',   '5' => '90',   '6' => '0', 
         '7' => '100',  '8' => '105',  '9' => '110', 
        '10' => '120', '11' => '0',   '12' => '130', 
        '13' => '0',   '14' => '140', '15' => '150', 
    );
    return $array;
}
function getRecoil(){
    $array = array(
         '1' => '0',    '2' => '75',   '3' => '80', 
         '4' => '85',   '5' => '90',   '6' => '95', 
         '7' => '100',  '8' => '105',  '9' => '110', 
        '10' => '115', '11' => '120', '12' => '125', 
        '13' => '130', '14' => '135', '15' => '140', 
    );
    return $array;
}
function getWalk(){
    $array = array(
         '1' => '00',    '2' => '4.68',  '3' => '5.22', 
         '4' => '00',    '5' => '5.85',  '6' => '6.30', 
         '7' => '6.75',  '8' => '00',    '9' => '7.20', 
        '10' => '7.65', '11' => '8.10', '12' => '8.55', 
        '13' => '8.73', '14' => '00',   '15' => '9.45', 
    );
    return $array;
}
function getDash(){
    $array = array(
         '1' => '00',     '2' => '17.40',  '3' => '00', 
         '4' => '00',     '5' => '19.50',  '6' => '00', 
         '7' => '21.00',  '8' => '00',     '9' => '22.50', 
        '10' => '00',    '11' => '24.00', '12' => '24.60', 
        '13' => '25.50', '14' => '26.10', '15' => '27.00', 
    );
    return $array;
}
function getLongDash(){
    $array = array(
         '1' => '00',     '2' => '10.44',  '3' => '00', 
         '4' => '00',     '5' => '11.70',  '6' => '00', 
         '7' => '12.60',  '8' => '00',     '9' => '13.50', 
        '10' => '00',    '11' => '14.4',  '12' => '14.76', 
        '13' => '15.30', '14' => '15.66', '15' => '16.20', 
    );
    return $array;
}
function getWeightLimit(){
    $array = array(
         '1' => '',   '2' => '',   '3' => '', 
         '4' => '',   '5' => '',   '6' => '', 
         '7' => '',   '8' => '',   '9' => '', 
        '10' => '', '11' => '', '12' => '', 
        '13' => '',  '14' => '', '15' => '', 
    );
    return $array;
}


// �z��ł�������ł��S���܂Ƃ߂ĕ����R�[�h�ϊ�
function mb_convert_encoding_recursive($data, $to = 'SJIS', $from = 'UTF-8'){
  if(is_array($data)){
    foreach($data as $key => $val){
      $data[$key] = mb_convert_encoding_recursive($val, $to, $from);
    }
  }else{
    $data = mb_convert_encoding($data, $to, $from);
  }
  return $data;
}

?>