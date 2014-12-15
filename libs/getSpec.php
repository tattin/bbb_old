<?php
require_once 'bootstrap.php';
require_once 'include_csv.php';
require_once 'getList.php';

define('WEIGHT_BONUS', 150);    // 玖珂
define('ARMER_BONUS1', 3);      // 蛇
define('ARMER_BONUS2', 5);      // 路地

function getAllSpec($data = array()){
    // Ajax返却用配列
    $arrReturn = array();
    // POST値がない場合GET値を格納
    $data = $_GET;
    if(isset($_POST) && count($_POST) > 0){
        unset($data);
        $data = $_POST;
    }

    // ランクを具体的数値に変換する為の配列を用意
    $arrMap = getMapping();
    $arrArmer    = getArmer();
    $arrLockOn   = getLockOn();
    $arrRevision = getRevision();
    $arrSearch   = getSearch();
    $arrBoost    = getBoost();
    $arrSP       = getSP();
    $arrArea     = getArea();
    $arrReload   = getReload();
    $arrChange   = getChange();
    $arrRecoil   = getRecoil();
    $arrWalk     = getWalk();
    $arrDash     = getDash();
    $arrLongDash = getLongDash();
    // 麻武器
    $arrAssaultMain    = getAssaultMain();
    $arrAssaultSub     = getAssaultSub();
    $arrAssaultAssist  = getAssaultAssist();
    $arrAssaultSpecial = getAssaultSpecial();
    // 蛇武器
    $arrHeavyMain      = getHeavyMain();
    $arrHeavySub       = getHeavySub();
    $arrHeavyAssist    = getHeavyAssist();
    $arrHeavySpecial   = getHeavySpecial();
    // 砂武器
    $arrSnipeMain      = getSnipeMain();
    $arrSnipeSub       = getSnipeSub();
    $arrSnipeAssist    = getSnipeAssist();
    $arrSnipeSpecial   = getSnipeSpecial();
    // 支武器
    $arrSupportMain    = getSupportMain();
    $arrSupportSub     = getSupportSub();
    $arrSupportAssist  = getSupportAssist();
    $arrSupportSpecial = getSupportSpecial();


    $arrHeadSpec = getHeadSpec($data['head']);
    $arrBodySpec = getBodySpec($data['body']);
    $arrArmSpec  = getArmSpec($data['arm']);
    $arrLegSpec  = getLegSpec($data['leg']);


    $head0 = $arrArmer[   $arrHeadSpec['2']];  // 装甲
    $head1 = $arrRevision[$arrHeadSpec['3']];  // 射撃補正
    $head2 = $arrSearch[  $arrHeadSpec['4']];  // 索敵
    $head3 = $arrLockOn[  $arrHeadSpec['5']];  // ロックオン
    $body0 = $arrArmer[   $arrBodySpec['2']];  // 装甲
    $body1 = $arrBoost[   $arrBodySpec['3']];  // ブースト
    $body2 = $arrSP[      $arrBodySpec['4']];  // SP
    $body3 = $arrArea[    $arrBodySpec['5']];  // エリア移動
    $arm0  = $arrArmer[   $arrArmSpec['2']];   // 装甲
    $arm1  = $arrRecoil[  $arrArmSpec['3']];   // 反動
    $arm2  = $arrReload[  $arrArmSpec['4']];   // リロード
    $arm3  = $arrChange[  $arrArmSpec['5']];   // 武器変更
    $leg0  = $arrArmer[   $arrLegSpec['2']];   // 装甲
    $leg1  = $arrWalk[    $arrLegSpec['3']];   // 歩行
    $leg2  = $arrDash[    $arrLegSpec['4']];   // ダッシュ
    $leg3  = $arrLegSpec['1'];   // 重量耐性

    // 平均装甲
    $armer_avg = ($head0 + $body0 + $arm0 + $leg0) / 4;

    $head0_rank = $arrMap[$arrHeadSpec['2']];  // 装甲
    $head1_rank = $arrMap[$arrHeadSpec['3']];  // 射撃補正
    $head2_rank = $arrMap[$arrHeadSpec['4']];  // 索敵
    $head3_rank = $arrMap[$arrHeadSpec['5']];  // ロックオン
    $body0_rank = $arrMap[$arrBodySpec['2']];  // 装甲
    $body1_rank = $arrMap[$arrBodySpec['3']];  // ブースト
    $body2_rank = $arrMap[$arrBodySpec['4']];  // SP
    $body3_rank = $arrMap[$arrBodySpec['5']];  // エリア移動
    $arm0_rank  = $arrMap[$arrArmSpec['2']];   // 装甲
    $arm1_rank  = $arrMap[$arrArmSpec['3']];   // 反動
    $arm2_rank  = $arrMap[$arrArmSpec['4']];   // リロード
    $arm3_rank  = $arrMap[$arrArmSpec['5']];   // 武器変更
    $leg0_rank  = $arrMap[$arrLegSpec['2']];   // 装甲
    $leg1_rank  = $arrMap[$arrLegSpec['3']];   // 歩行
    $leg2_rank  = $arrMap[$arrLegSpec['4']];   // ダッシュ
    $leg3_rank  = $arrMap[$arrLegSpec['5']];   // 重量耐性

    $total_weight   = $arrHeadSpec['1'] + $arrBodySpec['1'] + $arrArmSpec['1'];
    $at_assault     = $arrAssaultMain[$data['assault_main']]['weight']     + $arrAssaultSub[$data['assault_sub']]['weight']
                    + $arrAssaultAssist[$data['assault_assist']]['weight'] + $arrAssaultSpecial[$data['assault_special']]['weight']
                    + $total_weight;
    $at_heavy       = $arrHeavyMain[$data['heavy_main']]['weight']         + $arrHeavySub[$data['heavy_sub']]['weight']
                    + $arrHeavyAssist[$data['heavy_assist']]['weight']     + $arrHeavySpecial[$data['heavy_special']]['weight']
                    + $total_weight;
    $at_snipe       = $arrSnipeMain[$data['snipe_main']]['weight']         + $arrSnipeSub[$data['snipe_sub']]['weight']
                    + $arrSnipeAssist[$data['snipe_assist']]['weight']     + $arrSnipeSpecial[$data['snipe_special']]['weight']
                    + $total_weight;
    $at_support     = $arrSupportMain[$data['support_main']]['weight']     + $arrSupportSub[$data['support_sub']]['weight']
                    + $arrSupportAssist[$data['support_assist']]['weight'] + $arrSupportSpecial[$data['support_special']]['weight']
                    + $total_weight;

    $at_parts   = $arrLegSpec['1'] - $total_weight;
    $at_assault = $arrLegSpec['1'] - $at_assault;
    $at_heavy   = $arrLegSpec['1'] - $at_heavy;
    $at_snipe   = $arrLegSpec['1'] - $at_snipe;
    $at_support = $arrLegSpec['1'] - $at_support;

    $chip = $arrHeadSpec['7'] + $arrBodySpec['7'] + $arrArmSpec['7'] + $arrLegSpec['7'];
    if(isset($data['revision_chip']) && $data['revision_chip'] != ''){
    	switch($data['revision_chip']){
    		case '1' :
    			$head1 += 1;
    			break;
    		case '3' :
    			$head1 += 3;
    			break;
    	}
    }
    if(isset($data['search_chip']) && $data['search_chip'] != ''){
    	switch($data['search_chip']){
    		case '1' :
    			$head2 += 15;
    			break;
    		case '2' :
    			$head2 += 45;
    			break;
    	}
    }
    if(isset($data['weight_chip']) && $data['weight_chip'] != ''){
    	switch($data['weight_chip']){
    		case '1' :
    			$at_parts   += 80;
    			$at_assault += 80;
    			$at_heavy   += 80;
    			$at_snipe   += 80;
    			$at_support += 80;
    			$leg3       += 80;
    			break;
    		case '3' :
    			$at_parts   += 250;
    			$at_assault += 250;
    			$at_heavy   += 250;
    			$at_snipe   += 250;
    			$at_support += 250;
    			$leg3       += 250;
    			break;
    	}
    }
    if(isset($data['armer_chip']) && $data['armer_chip'] != ''){
    	switch($data['armer_chip']){
    		case '1' :
    			$head0     += 1;
    			$body0     += 1;
    			$arm0      += 1;
    			$leg0      += 1;
    			$armer_avg += 1;
    			break;
    		case '2' :
    			$head0     += 2;
    			$body0     += 2;
    			$arm0      += 2;
    			$leg0      += 2;
    			$armer_avg += 2;
    			break;
    	}
    }
    if(isset($data['boost_chip']) && $data['boost_chip'] != ''){
        switch($data['boost_chip']){
            case '1':
                $body1 += 2;
                break;
            case '3':
                $body1 += 6;
                break;
        }
    }
    if(isset($data['sp_chip']) && $data['sp_chip'] != ''){
    	switch($data['sp_chip']){
    		case '1' :
    			$body2 += 3;
    			break;
    		case '3' :
    			$body2 += 9;
    			break;
    	}
    }
    if(isset($data['change_chip']) && $data['change_chip'] != ''){
    	switch($data['change_chip']){
    		case '1' :
    			$arm3 += 2;
    			break;
    		case '3' :
    			$arm3 += 6;
    			break;
    	}
    }
    if(isset($data['reload_chip']) && $data['reload_chip'] != ''){
    	switch($data['reload_chip']){
    		case '1' :
    			$arm2 += 1;
    			break;
    		case '3' :
    			$arm2 += 3;
    			break;
    	}
    }
    if(isset($data['walk_chip']) && $data['walk_chip'] != ''){
    	switch($data['walk_chip']){
    		case '1' :
    			$leg1 += 0.27;
    			break;
    		case '2' :
    			$leg1 += 0.81;
    			break;
    	}
    }
    $has_bonus_chip = false;
    if(isset($data['bonus_chip']) && $data['bonus_chip'] != ''){
        $has_bonus_chip = true;
    }
    
    $total_chip = 0;
    foreach($data as $key => $val){
        if($key == 'action_chip' || $key == 'action_d_chip'){
            continue;
        }
        if(preg_match('/_chip$/', $key) && isset($data[$key]) && $data[$key] != ''){
            if(is_array($val)){
                $total_chip += $val[0];
            }else{
                $total_chip += $val;
            }
        }
    }
    if(isset($data['action_chip'])){
        if($data['action_chip'] == '1' || $data['action_chip'] == '3' || $data['action_chip'] == '4'){
            $total_chip += 1;
        }elseif($data['action_chip'] == '2' || $data['action_chip'] == '5'){
            $total_chip += 2;
        }
    }
    if(isset($data['action_d_chip'])){
        if($data['action_d_chip'] == '1'){
            $total_chip += 1;
        }elseif($data['action_d_chip'] == '2'){
            $total_chip += 2;
        }
    }
    $fullset = getFullSet($data['head'], $data['body'], $data['arm'], $data['leg']);
    // ボーナス判定
    $bonus = $fullset;
    switch($fullset){
    	case 'Cougar':
    		$at_parts   += 150;
    		$at_assault += 150;
    		$at_heavy   += 150;
    		$at_snipe   += 150;
    		$at_support += 150;
    		$leg3       += 150;
    		if($has_bonus_chip){
        		$at_parts   += 150;
        		$at_assault += 150;
        		$at_heavy   += 150;
        		$at_snipe   += 150;
        		$at_support += 150;
        		$leg3       += 150;
    		}
    		break;
    	case 'HeavyGuard':
    		$head0     += 3;
    		$body0     += 3;
    		$arm0      += 3;
    		$leg0      += 3;
    		$armer_avg += 3;
    		if($has_bonus_chip){
        		$head0     += 3;
        		$body0     += 3;
        		$arm0      += 3;
        		$leg0      += 3;
        		$armer_avg += 3;
    		}
    		break;
    	case 'Shrike':
    		$leg1 += 1.62;
    		if($has_bonus_chip){
    		    $leg1 += 1.62;
    		}
    		break;
    	case 'Zebra':
    		$head2 += 15;
    		if($has_bonus_chip){
    		    $head2 += 15;
    		}
    		break;
    	case 'Enforcer':
			$body1 += 3;
    		if($has_bonus_chip){
			    $body1 += 3;
    		}
    		break;
    	case 'Kefar':
    		$arm1 += 5;
    		if($has_bonus_chip){
    		    $arm1 += 5;
    		}
    		break;
    	case 'Edge':
    		$arm2 += 3;
    		if($has_bonus_chip){
    		    $arm2 += 3;
    		}
    		break;
    	case 'Yakusya':
    		$leg2 += 0.6;
    		if($has_bonus_chip){
    		    $leg2 += 0.6;
    		}
    		break;
    	case 'Saber':
    		$body3 -= 0.5;
    		if($has_bonus_chip){
    		    $body3 -= 0.5;
    		}
    		break;
    	case 'Discas':
    		$body2 += 5;
    		if($has_bonus_chip){
    		    $body2 += 5;
    		}
    		break;
    	case 'Nereid':
    		$head1 += 4;
    		if($has_bonus_chip){
    		    $head1 += 4;
    		}
    		break;
    	case 'Jinga':
    		$head3 += 5;
    		if($has_bonus_chip){
    		    $head3 += 5;
    		}
    		break;
    	case 'Roji':
    		$head0     += 5;
    		$body0     += 5;
    		$arm0      += 5;
    		$leg0      += 5;
    		$armer_avg += 5;
    		if($has_bonus_chip){
        		$head0     += 5;
        		$body0     += 5;
        		$arm0      += 5;
        		$leg0      += 5;
        		$armer_avg += 5;
    		}
    		break;
    	case 'Buz':
    		$leg2 += 0;
    		if($has_bonus_chip){
    		    $leg2 += 0;
    		}
    		break;
    	case 'Randbalk':
    		$at_parts   += 150;
    		$at_assault += 150;
    		$at_heavy   += 150;
    		$at_snipe   += 150;
    		$at_support += 150;
    		$leg3       += 150;
    		if($has_bonus_chip){
        		$at_parts   += 150;
        		$at_assault += 150;
        		$at_heavy   += 150;
        		$at_snipe   += 150;
        		$at_support += 150;
        		$leg3       += 150;
    		}
    		break;
    	default :
    		break;
    }
    $url = '';
    if(isset($data['mode']) && $data['mode'] == 'save'){
        $url = convert_url($data);
    }
    // ブースト容量からステップ回数を計算
    $body1 = _convertBoostCapacity($body1);
    
    list($rate_parts,   $down_parts)   = getSpeedRate($at_parts);
    list($rate_assault, $down_assault) = getSpeedRate($at_assault);
    list($rate_heavy,   $down_heavy)   = getSpeedRate($at_heavy);
    list($rate_snipe,   $down_snipe)   = getSpeedRate($at_snipe);
    list($rate_support, $down_support) = getSpeedRate($at_support);
    $speed_assault = number_format($leg2 * $rate_assault,2);
    $speed_heavy   = number_format($leg2 * $rate_heavy  ,2);
    $speed_snipe   = number_format($leg2 * $rate_snipe  ,2);
    $speed_support = number_format($leg2 * $rate_support,2);

    $speed_assault_ld  = number_format(getDashAvg($speed_assault), 2);
    $speed_assault_ac  = number_format(getACspeed($speed_assault),2);
    $speed_assault_mw  = number_format(getMWspeed($speed_assault),2);
    $speed_assault_mw2 = number_format(getMW2speed($speed_assault),2);
    $speed_assault_dis = number_format(getDISspeed($speed_assault),2);
    $speed_heavy_ld    = number_format(getDashAvg($speed_heavy), 2);
    $speed_snipe_ld    = number_format(getDashAvg($speed_snipe), 2);
    $speed_support_ld  = number_format(getDashAvg($speed_snipe), 2);
    $arrReturn = array(
        'at_parts'   => $at_parts,
        'at_assault' => $at_assault,
        'at_heavy'   => $at_heavy,
        'at_snipe'   => $at_snipe,
        'at_support' => $at_support,
        // 機体
        'armer_avg'  => $armer_avg,
        'chip'       => $chip,
        'total_chip' => $total_chip,
        'bonus'      => $bonus,
        'url'        => $url,
        // 超過
        'down_parts'   => $down_parts,
        'down_assault' => $down_assault,
        'down_heavy'   => $down_heavy,
        'down_snipe'   => $down_snipe,
        'down_support' => $down_support,
        // ダッシュ速度
        'speed_assault' => $speed_assault,
        'speed_heavy'   => $speed_heavy,
        'speed_snipe'   => $speed_snipe,
        'speed_support' => $speed_support,
        // 巡航速度
        'speed_assault_ld' => $speed_assault_ld,
        'speed_heavy_ld'   => $speed_heavy_ld,
        'speed_snipe_ld'   => $speed_snipe_ld,
        'speed_support_ld' => $speed_support_ld,
        // AC速度
        'speed_assault_ac'  => $speed_assault_ac,
        'speed_assault_mw'  => $speed_assault_mw,
        'speed_assault_mw2' => $speed_assault_mw2,
        'speed_assault_dis' => $speed_assault_dis,
        // 各部位
        'head0' => $head0, 'head1' => $head1, 'head2' => $head2, 'head3' => $head3,
        'body0' => $body0, 'body1' => $body1, 'body2' => $body2, 'body3' => $body3,
        'arm0'  => $arm0,  'arm1'  => $arm1,  'arm2'  => $arm2,  'arm3'  => $arm3,
        'leg0'  => $leg0,  'leg1'  => $leg1,  'leg2'  => $leg2,  'leg3'  => $leg3,
        // 表記
        'head0_rank' => $head0_rank, 'head1_rank' => $head1_rank, 'head2_rank' => $head2_rank, 'head3_rank' => $head3_rank,
        'body0_rank' => $body0_rank, 'body1_rank' => $body1_rank, 'body2_rank' => $body2_rank, 'body3_rank' => $body3_rank,
        'arm0_rank'  => $arm0_rank,  'arm1_rank'  => $arm1_rank,  'arm2_rank'  => $arm2_rank,  'arm3_rank'  => $arm3_rank,
        'leg0_rank'  => $leg0_rank,  'leg1_rank'  => $leg1_rank,  'leg2_rank'  => $leg2_rank,  'leg3_rank'  => $leg3_rank,
    );
    $data = array_merge($data, $arrReturn);
    return $data;
}

function getHeadSpec($id){
    $arrHead = getHeadList();
    return $arrHead[$id];
}
function getBodySpec($id){
    $arrBody = getBodyList();
    return $arrBody[$id];
}
function getArmSpec($id){
    $arrArm = getArmList();
    return $arrArm[$id];
}
function getLegSpec($id){
    $arrLeg = getLegList();
    return $arrLeg[$id];
}
function convert_url($array){
    $url = str_replace("http://", "", SITE_URL."set/set.php?");
    foreach($array as $key => $val){
        if (    !preg_match('/^speed_/', $key)
             && !preg_match('/^down_/',  $key)
             && !preg_match('/^at_/',    $key)
             && !preg_match('/^[head|body|arm|leg]+[0-9]+/', $key)
        ){
            if(is_array($val)){
                $url .= $key.'='.$val[0].'&';
            }else{
                $url .= $key.'='.$val.'&';
            }
        }
    }
    $url = substr($url, 0, -1);
    $url = file_get_contents("http://tinyurl.com/api-create.php?url=http://".$url);
    return $url;
}
// return rate percent
function getSpeedRate($at){
    $rate = 1;
    $down = 0;
    if($at < 0){
        $at /= -10;
        $down = ceil($at / 4);
        $rate = 1 - ($at * 0.0025);
    }
    return array($rate, $down);
}
function _convertBoostCapacity($body1){
    $step = ceil($body1 / 12);
    // あまり
    $l_step = $body1 % 12;
    if($l_step == 0){
        $step++;
    }
    return $step;
}

?>