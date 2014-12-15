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

// 超過計算後の生AC速度
function getACspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.6);
	return $speed;
}
// 超過計算後の箪笥速度
function getDISspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.3);
	return $speed;
}
// 超過計算後のMW速度
function getMWspeed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.25);
	return $speed;
}
// 超過計算後のMW2速度
function getMW2speed($speed){
	$speed = getDashAvg($speed);
	$speed = 16 + ($speed * 1.1);
	return $speed;
}

// フルセット計算用
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
// headの値を参照にしてID=>VALUE形式で返す
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
    // ファイル指定がない場合
        return array();
    }
    $array = array();
    $fp = fopen('../csv/'.$csv, "r");
    while($line = fgetcsv($fp)){
        $array[$line[6]] = $line;
    }
    return $array;
}

// 武器情報選択用に配列変換
function getIdValueList($array){
    $arrTemp = array();
    foreach($array as $key => $val){
        $arrTemp[$key] = $val['name'];
    }
    return $arrTemp;
}
/***** 各武器情報 *****/
function getAssaultMain(){
    $array = array(
         0 => array('name' => 'M90サブマシンガン',       'weight' => '140'),
         1 => array('name' => 'M90Cサブマシンガン',      'weight' => '160'),
         2 => array('name' => 'M91サブマシンガン',       'weight' => '200'),
         3 => array('name' => 'M99サーペント',           'weight' => '180'),
         4 => array('name' => 'ヴォルペ突撃銃',          'weight' => '180'),
         5 => array('name' => 'ヴォルペ突撃銃C',         'weight' => '170'),
         6 => array('name' => 'ヴォルペ突撃銃FAM',       'weight' => '200'),
         7 => array('name' => 'ヴォルペ・スコーピオ',    'weight' => '220'),
         8 => array('name' => 'ヴォルペ・メガロ',        'weight' => '240'),
         9 => array('name' => '電磁加速砲・壱式',        'weight' => '200'),
        10 => array('name' => '電磁加速砲・弐式',        'weight' => '210'),
        11 => array('name' => '電磁加速砲・特式',        'weight' => '230'),
        12 => array('name' => '電磁加速砲・紫電',        'weight' => '260'),
        13 => array('name' => 'VOLT-01',                 'weight' => '190'),
        14 => array('name' => 'VOLT-02',                 'weight' => '180'),
        15 => array('name' => 'VOLT-R',                  'weight' => '210'),
        16 => array('name' => 'VOLT-X',                  'weight' => '230'),
        17 => array('name' => 'VOLT-RX',                 'weight' => '250'),
        18 => array('name' => 'STAR-05',                 'weight' => '230'),
        19 => array('name' => 'STAR-10',                 'weight' => '220'),
        20 => array('name' => 'STAR-10C',                'weight' => '260'),
        24 => array('name' => 'STAR-20',                 'weight' => '250'),
        21 => array('name' => 'D90デュアル',             'weight' => '290'),
        22 => array('name' => 'D90カスタム',             'weight' => '270'),
        23 => array('name' => 'D92ジェイナス',           'weight' => '310'),
    );
    return $array;
}
function getAssaultSub(){
    $array = array(
		 0 => array('name' => '38型手榴弾',             'weight' => '80'),
		 1 => array('name' => '40型軽量手榴弾',         'weight' => '90'),
		 2 => array('name' => '41型強化手榴弾',         'weight' => '140'),
		 3 => array('name' => 'グレネードランチャー',   'weight' => '220'),
		 4 => array('name' => '多装Gランチャー',        'weight' => '250'),
		 5 => array('name' => '強化型Gランチャー',      'weight' => '330'),
		 6 => array('name' => '連射式Gランチャー',      'weight' => '320'),
		 7 => array('name' => '拡散型Gランチャー',      'weight' => '360'),
		 8 => array('name' => 'ミサイルスロアー',       'weight' => '350'),
		 9 => array('name' => 'MSL-ハイヴ',             'weight' => '360'),
		10 => array('name' => 'MSL-ナイダス',           'weight' => '380'),
		11 => array('name' => 'MSL-スウォーム',         'weight' => '420'),
		12 => array('name' => '39型クラッカー',         'weight' => '100'),
		13 => array('name' => '40型クラッカー',         'weight' => '110'),
		14 => array('name' => 'チェインボム',           'weight' => '140'),
		15 => array('name' => 'チェインボムS',          'weight' => '120'),
    );
    return $array;
}
function getAssaultAssist(){
    $array = array(
		 0 => array('name' => 'デュエルソード',     'weight' => '220'),
		 1 => array('name' => 'マーシャルソード',   'weight' => '460'),
		 2 => array('name' => 'SW-ティアダウナー',  'weight' => '650'),
		 3 => array('name' => 'ロングスピア',       'weight' => '190'),
		 4 => array('name' => 'ピアシングスピア',   'weight' => '340'),
		 5 => array('name' => 'SP-ペネトレーター',  'weight' => '480'),
		 6 => array('name' => 'リヒトメッサー',     'weight' => '180'),
		 7 => array('name' => 'リヒトメッサーⅡ',   'weight' => '300'),
		 8 => array('name' => 'LM-ジリオス',        'weight' => '390'),
		 9 => array('name' => 'スパークロッド',     'weight' => '200'),
		10 => array('name' => 'スパークロッドⅡ',   'weight' => '330'),
		11 => array('name' => 'SR-ヴァジュラ',      'weight' => '420'),
    );
    return $array;
}
function getAssaultSpecial(){
    $array = array(
    	0 => array('name' => 'アサルトチャージャー', 'weight' => '260'),
    	1 => array('name' => 'AC-マルチウェイ',   'weight' => '230'),
    	2 => array('name' => 'AC-ディスタンス', 'weight' => '300'),
    	3 => array('name' => 'AC-マルチウェイⅡ',  'weight' => '280'),
    );
    return $array;
}
function getHeavyMain(){
    $array = array(
		 0 => array('name' => 'ウィーゼル機関銃',       'weight' => '280'),
		 1 => array('name' => 'ウィーゼル機関銃R',      'weight' => '300'),
		 2 => array('name' => 'ウィーゼル・ラピッド',   'weight' => '320'),
		 3 => array('name' => 'ウィーゼル・コロナ',     'weight' => '340'),
		 4 => array('name' => 'GAXガトリングガン',      'weight' => '350'),
		 5 => array('name' => 'GAXエレファント',        'weight' => '400'),
		 6 => array('name' => 'GAXウッドペッカー',      'weight' => '380'),
		 7 => array('name' => 'GAXダイナソア',          'weight' => '460'),
		 8 => array('name' => '単式機関砲',             'weight' => '420'),
		 9 => array('name' => '単式機関砲・改',         'weight' => '440'),
		10 => array('name' => '双門機関砲',             'weight' => '500'),
		11 => array('name' => '双門機関砲・怒竜',       'weight' => '530'),
		12 => array('name' => 'ヴルカンLG1',            'weight' => '270'),
		13 => array('name' => 'ヴルカンLG2',            'weight' => '280'),
		14 => array('name' => 'ヴルカンMC',             'weight' => '320'),
		15 => array('name' => 'ヴルカン・ラヴァ',       'weight' => '310'),
		16 => array('name' => 'LAC-グローム',           'weight' => '440'),
		17 => array('name' => 'LAC-グロームβ',         'weight' => '460'),
		18 => array('name' => 'LAC-グロームγ',         'weight' => '540'),
    );
    return $array;
}
function getHeavySub(){
    $array = array(
		 0 => array('name' => 'サワードロケット',       'weight' => '480'),
		 1 => array('name' => 'サワード・カスタム',     'weight' => '500'),
		 2 => array('name' => 'サワード・バラージ',     'weight' => '490'),
		 3 => array('name' => 'サワード・コング',       'weight' => '540'),
		 4 => array('name' => 'サワード・スマイト',     'weight' => '490'),
		 5 => array('name' => 'プラズマカノン',         'weight' => '450'),
		 6 => array('name' => 'プラズマカノンMk-2',     'weight' => '460'),
		 7 => array('name' => 'プラズマカノンXM',       'weight' => '500'),
		 8 => array('name' => 'プラズマカノン・ネオ',   'weight' => '480'),
		 9 => array('name' => 'プラズマカノンUG',       'weight' => '470'),
		10 => array('name' => 'チャージカノン',         'weight' => '490'),
		11 => array('name' => 'チャージカノンMk-2',     'weight' => '500'),
		12 => array('name' => 'チャージカノンC',        'weight' => '530'),
		13 => array('name' => '試験型MLRS',             'weight' => '520'),
		14 => array('name' => '高速型MLRS',             'weight' => '550'),
		15 => array('name' => '強化型MLRS',             'weight' => '600'),
		16 => array('name' => '多連装型MLRS',           'weight' => '620'),
		17 => array('name' => 'シーカーロケット',       'weight' => '470'),
		18 => array('name' => 'トライシーカー',         'weight' => '510'),
		19 => array('name' => 'パワードシーカー',       'weight' => '520'),
    );
    return $array;
}
function getHeavyAssist(){
    $array = array(
		0 => array('name' => 'ECMグレネード',           'weight' => '140'),
		1 => array('name' => '試験型ECMグレネード',     'weight' => '160'),
		2 => array('name' => '新型ECMグレネード',       'weight' => '120'),
		6 => array('name' => '改良型ECMグレネード',     'weight' => '170'),
		3 => array('name' => 'アームパイク',            'weight' => '230'),
		4 => array('name' => 'ヘヴィパイク',            'weight' => '260'),
		5 => array('name' => 'ラベージパイク',          'weight' => '300'),
    );
    return $array;
}
function getHeavySpecial(){
    $array = array(
		 0 => array('name' => 'タイタン榴弾砲',     'weight' => '900'),
		 1 => array('name' => 'コロッサス榴弾砲',   'weight' => '940'),
		 2 => array('name' => 'アトラント榴弾砲',   'weight' => '1010'),
		 3 => array('name' => 'ギガノト榴弾砲',     'weight' => '1050'),
		 4 => array('name' => 'エアバスターT10',    'weight' => '720'),
		 5 => array('name' => 'エアバスターT25',    'weight' => '890'),
		 6 => array('name' => 'エアバスターXHR ',   'weight' => '930'),
		 7 => array('name' => 'エアバスターT30',    'weight' => '660'),
		 8 => array('name' => 'バリアユニット',     'weight' => '710'),
		 9 => array('name' => 'バリアユニットβ',   'weight' => '680'),
		10 => array('name' => 'UAD-レモラ',         'weight' => '600'),
		11 => array('name' => 'UAD-ケリブ',         'weight' => '620'),
    );
    return $array;
}
function getSnipeMain(){
    $array = array(
		 0 => array('name' => '38式狙撃銃',            'weight' => '200'),
		 1 => array('name' => '38式狙撃銃・改',        'weight' => '240'),
		 2 => array('name' => '38式狙撃銃・新式',      'weight' => '210'),
		 3 => array('name' => '38式狙撃銃・遠雷',      'weight' => '260'),
		 5 => array('name' => 'イーグルアイV44',       'weight' => '190'),
		 6 => array('name' => 'イーグルアイTF',        'weight' => '170'),
		 7 => array('name' => 'イーグルアイ・ゼロ',    'weight' => '230'),
		 8 => array('name' => 'イーグルアイVX',        'weight' => '240'),
		 9 => array('name' => 'バトルライフル',        'weight' => '190'),
		10 => array('name' => 'バトルライフルBF',      'weight' => '210'),
		11 => array('name' => 'バトルライフルBF2',     'weight' => '230'),
		12 => array('name' => '炸薬狙撃銃',            'weight' => '320'),
		13 => array('name' => '炸薬狙撃銃・改',        'weight' => '300'),
		14 => array('name' => '炸薬狙撃銃・連式',      'weight' => '360'),
		15 => array('name' => 'LZ-デイライト',         'weight' => '250'),
		16 => array('name' => 'LZ-デイライトS',        'weight' => '260'),
		17 => array('name' => 'LZ-トライアド',         'weight' => '280'),
		18 => array('name' => 'LZ-ヴェスパイン',       'weight' => '300'),
		19 => array('name' => 'ブレイザー',            'weight' => '290'),
		20 => array('name' => 'ブレイザーRF',          'weight' => '320'),
		21 => array('name' => 'ブレイザー・アグニ',    'weight' => '350'),
		22 => array('name' => 'ブレイザー・バースト',  'weight' => '360'),
    );
    return $array;
}
function getSnipeSub(){
    $array = array(
		 0 => array('name' => 'マーゲイM40',            'weight' => '100'),
		 1 => array('name' => 'マーゲイ・カスタム',     'weight' => '120'),
		 2 => array('name' => 'マーゲイRF',             'weight' => '140'),
		 3 => array('name' => 'マーゲイ・ストライフ',   'weight' => '130'),
		 4 => array('name' => 'マーゲイ・バリアンス',   'weight' => '150'),
		 5 => array('name' => 'レヴェラー',             'weight' => '120'),
		 6 => array('name' => 'レヴェラーC',            'weight' => '130'),
		 7 => array('name' => 'レヴェラーR',            'weight' => '140'),
		 8 => array('name' => 'レヴェラー・ブルート',   'weight' => '160'),
		 9 => array('name' => 'レヴェラーRR',           'weight' => '150'),
		10 => array('name' => 'ジャンプマイン',         'weight' => '150'),
		11 => array('name' => 'ジャンプマインS ',       'weight' => '160'),
		12 => array('name' => 'ジャンプマインV',        'weight' => '200'),
		13 => array('name' => 'スティッキーボム',       'weight' => '120'),
		14 => array('name' => 'スティッキーボムS',      'weight' => '130'),
		15 => array('name' => 'ワイドショット',         'weight' => '140'),
		16 => array('name' => 'ワイドショットTF',       'weight' => '160'),
		17 => array('name' => 'ワイドショットX',        'weight' => '170'),
    );
    return $array;
}
function getSnipeAssist(){
    $array = array(
    	0 => array('name' => 'セントリーガンSMG',  'weight' => '380'),
    	1 => array('name' => 'セントリーガンAC',   'weight' => '410'),
    	2 => array('name' => 'セントリーガンLZ',   'weight' => '420'),
    	3 => array('name' => '高振動ブレード',     'weight' => '160'),
    	4 => array('name' => '新型高振動ブレード', 'weight' => '170'),
    	5 => array('name' => '強化高振動ブレード', 'weight' => '250'),
    );
    return $array;
}
function getSnipeSpecial(){
    $array = array(
    	 0 => array('name' => 'シールド発生装置',           'weight' => '320'),
    	 1 => array('name' => 'シールド発生装置・改',       'weight' => '380'),
    	 2 => array('name' => '高出力シールド',             'weight' => '400'),
    	 3 => array('name' => '光学迷彩・試作型',           'weight' => '260'),
    	 4 => array('name' => '光学迷彩・実用型',           'weight' => '330'),
    	 5 => array('name' => '光学迷彩・耐久型',           'weight' => '340'),
    	 6 => array('name' => 'マグネタイザー',             'weight' => '350'),
    	 7 => array('name' => 'マグネタイザーβ',           'weight' => '390'),
    	 8 => array('name' => 'マグネタイザーγ',           'weight' => '410'),
    	 9 => array('name' => '照準補正装置・試験',         'weight' => '280'),
    	10 => array('name' => '照準補正装置・耐久',         'weight' => '250'),
    );
    return $array;
}
function getSupportMain(){
    $array = array(
	     0 => array('name' => 'スマックショット',       'weight' => '180'),
	     1 => array('name' => 'ワイドスマック',         'weight' => '240'),
	     2 => array('name' => 'クイックスマック',       'weight' => '170'),
	     3 => array('name' => 'スマックショットSP',     'weight' => '220'),
	     5 => array('name' => 'ASG-スィーパー',         'weight' => '180'),
	     6 => array('name' => 'ASG-スィーパーR',        'weight' => '230'),
	     7 => array('name' => 'ASG-アヴァランチ',       'weight' => '260'),
	     8 => array('name' => 'ASG-スィーパーRX',       'weight' => '200'),
	     9 => array('name' => 'LSG-アブローラ',         'weight' => '230'),
	    10 => array('name' => 'LSG-アブローラβ',       'weight' => '270'),
	    11 => array('name' => 'LSG-アブローラγ',       'weight' => '210'),
	    12 => array('name' => 'LSG-ラドゥガ',           'weight' => '280'),
	    13 => array('name' => 'ネイルガン',             'weight' => '140'),
	    14 => array('name' => 'アッパーネイル',         'weight' => '160'),
	    15 => array('name' => 'ネイルガンTF',           'weight' => '170'),
	    16 => array('name' => 'ラピッドネイル',         'weight' => '220'),
	    17 => array('name' => 'スパージネイル',         'weight' => '180'),
	    18 => array('name' => 'ハガードM50',            'weight' => '170'),
	    19 => array('name' => 'ハガード・カスタム',     'weight' => '160'),
	    20 => array('name' => 'ハガードRF',             'weight' => '190'),
    );
    return $array;
}
function getSupportSub(){
    $array = array(
		 0 => array('name' => 'ヘヴィマイン',       'weight' => '260'),
		 1 => array('name' => 'ヘヴィマインS',      'weight' => '240'),
		 2 => array('name' => 'ヘヴィマインV',      'weight' => '320'),
		 3 => array('name' => 'リモートボム',       'weight' => '300'),
		 4 => array('name' => 'リムペットボムS',    'weight' => '260'),
		 5 => array('name' => 'リムペットボムV',    'weight' => '360'),
		 6 => array('name' => '44型浮遊機雷',       'weight' => '180'),
		 7 => array('name' => '44型浮遊機雷S',      'weight' => '200'),
		12 => array('name' => '45型浮遊機雷',       'weight' => '240'),
		 8 => array('name' => 'ホバーマイン',       'weight' => '220'),
		 9 => array('name' => 'ホバーマインS',      'weight' => '250'),
		10 => array('name' => 'N60デトネーター',    'weight' => '290'),
		11 => array('name' => 'N60デトネーターR',   'weight' => '320'),
    );
    return $array;
}
function getSupportAssist(){
    $array = array(
    	 0 => array('name' => 'ラーク偵察機',       'weight' => '400'),
    	 1 => array('name' => 'ファルコン偵察機',   'weight' => '420'),
    	 2 => array('name' => 'アウル偵察機',       'weight' => '460'),
    	 3 => array('name' => 'ロビン偵察機',       'weight' => '410'),
    	 4 => array('name' => '索敵センサー',       'weight' => '350'),
    	 5 => array('name' => '小型索敵センサー',   'weight' => '280'),
    	 6 => array('name' => '広域索敵センサー',   'weight' => '400'),
    	 7 => array('name' => '軽量索敵センサー',   'weight' => '250'),
    	 8 => array('name' => 'スタナーJ',          'weight' => '320'),
    	 9 => array('name' => 'スタナーJ2',         'weight' => '350'),
    	10 => array('name' => 'スタナーK',          'weight' => '370'),
    	11 => array('name' => '弾薬BOX',            'weight' => '300'),
    );
    return $array;
}
function getSupportSpecial(){
    $array = array(
    	0 => array('name' => 'リペアユニット',      'weight' => '560'),
    	1 => array('name' => 'リペアユニットβ',    'weight' => '600'),
    	2 => array('name' => 'リペアユニットγ',    'weight' => '620'),
    	3 => array('name' => 'リペアポスト',        'weight' => '480'),
    	4 => array('name' => 'リペアポストβ',      'weight' => '520'),
    	5 => array('name' => 'リペアポストγ',      'weight' => '530'),
    	6 => array('name' => 'リペアショット',      'weight' => '490'),
    	7 => array('name' => 'リペアショットβ',    'weight' => '540'),
    	8 => array('name' => 'リペアショットγ',    'weight' => '510'),
    );
    return $array;
}

// 値を表記に変換
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
// 装甲
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


// 配列でも文字列でも全部まとめて文字コード変換
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