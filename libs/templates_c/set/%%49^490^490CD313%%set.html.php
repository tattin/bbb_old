<?php /* Smarty version 2.6.25, created on 2012-05-22 10:29:59
         compiled from set.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'set.html', 230, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>BBシミュレートver1.00-α</title>
<!-- CSS AREA -->
<style type="text/css">
body{
	font-size : 12px;
}
select{
	margin : 0 0 0 0;
	width : 145px;
	font-size : 11px;
}
.at{
	color : #822020;
	margin-left : 2px;
}
table{
	width : 600px;
}
table .child{
	width : 165px;
	border : 0px;
	background-color : #DDDDDD;
}
th{
	font-weight : normal;
}
.spec td{
	height : 18px;
}
.child th{
}
.child td{
	background-color : #FFFFFF;
	text-align : center;
}
.parts td{
	background-color : #BBBBBB;
}
.assault td{
	background-color : #99ffcc;
}
.heavy td{
	background-color : #ff99ff;
}
.snipe td{
	background-color : #ffff99;
}
.support td{
	background-color : #33ff99;
}
.w120 {
	width : 120px;
}
.w145 {
	width : 145px;
}
.w165 {
	width : 165px;
}
#footer {
	margin-top : 10px;
	text-align : center;
	background-color : #BBBBBB;
	width:auto;
	height:26px;
	position:relative;
}
</style>
<!-- /CSS AREA -->
<!-- /JavaScript AREA -->
<script type="text/javascript" src="/set/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
var arrColor = {
	'E-' : '#DDDDDD', 'E' : '#CCCCCC', 'E+' : '#B8B8B8',
	'D-' : '#EEEEFF', 'D' : '#DDDDFF', 'D+' : '#CCCCFF',
	'C-' : '#DDFFDD', 'C' : '#CCFFCC', 'C+' : '#BBFFBB',
	'B-' : '#FFEECC', 'B' : '#FFDDBB', 'B+' : '#FFCCAA',
	'A-' : '#FFDDDD', 'A' : '#FFCCCC', 'A+' : '#FFBBBB'
	};
$(function(){
	$(".select").change(function(){
		getAssembleData();
	});
});
function setRankColor(){
	$("[id$='_rank']").each(function(){
		rank = $(this).html();
		color = arrColor[rank];
		$(this).parent().css("background-color", color);
		$(this).parent().next().css("background-color", color);
	});
}
function getAssembleData(){
	arrData = new Object();
	$(".select").each(function(){
		if($(this).attr("type") == 'checkbox'){
			if($(this).attr('checked')){
				arrData[$(this).attr("name")] = $(this).attr("value");
			}
		}else{
			arrData[$(this).attr("name")] = $(this).attr("value");
		}
	});
	arrData['mode'] = $("#mode").val();
	response = $.ajax({
		url         : '<?php echo @SITE_URL; ?>
set/set_ajax.php',
		async       : false,
		data        : arrData,
		dataType    : "text",
		success     : setAssembleData,
		error		: function(m1,m2,m3){
						alert(m1);
						alert(m2);
						alert(m3);
					  },
		type        : "POST"
	}).responseText;
	setRankColor();
	convertBonus();
	return false;
}
function setAssembleData(strReturn){
	strReturn = strReturn.substr(strReturn.indexOf("{") + 1, strReturn.indexOf("}") - strReturn.indexOf("{") - 1);
	tempReturn = strReturn.split(",");
	var arrReturn = new Object();
	for(i in tempReturn){
		target = tempReturn[i];
		arrTemp = target.split(":");
		k = escapeDQ(arrTemp[0]);
		v = escapeDQ(arrTemp[1]);
		if (k == 'url'){
			v = escapeDQ(arrTemp[1] + ':' + arrTemp[2]);
			v = v.replace(/\\/g, "");
			$("#" + k).html(v);
		}else{
			$("#" + k).html(v);
		}
	}
	if($("#url").html() == ":undefined"){
		$("#url").empty();
	}
	// mode戻す
	$("#mode").val("");
}
function escapeDQ(str){
	str = str.replace(/\"/g, "");	//"
	return str;
}
var arrFullSet = {
	'Cougar'     : '重量耐性(150)',
	'HeavyGuard' : '装甲(3)',
	'Shrike'     : '歩行',
	'Zebra'      : '索敵',
	'Enforcer'   : 'ブースト',
	'Kefar'      : '反動吸収',
	'Edge'       : 'リロード',
	'Yakusya'    : 'ダッシュ',
	'Saber'      : 'エリア移動',
	'Discas'     : 'SP供給',
	'Nereid'     : '射撃補正',
	'Jinga'      : 'ロックオン',
	'Roji'       : '装甲(5)',
	'Buz'        : '高速移動',
	'Randbalk'   : '重量耐性(150)',
	''           : 'なし'
}
function convertBonus(){
	bonus = $("#bonus").html();
	$("#bonus").html(arrFullSet[bonus]);
}
var flg = 'off';
function disp(){
	if(flg == 'on'){
		$("#explain").slideDown();
		flg = 'off';
	}else{
		$("#explain").slideUp();
		flg = 'on';
	}
}
function saveSubmit(){
	$("#mode").val("save");
	getAssembleData();
}
var is_disp_chip = flase;
function showChip(){
	if(is_disp_chip){
		$("#chip_row").slideUp();
		is_disp_chip = false;
	}else{
		$("#chip_row").slideDown();
		is_disp_chip = true;
	}
}
</script>
<!-- /JavaScript AREA -->
</head>
<body onload="saveSubmit();">
<input type="button" value="アセンURL取得" onClick="saveSubmit();" /><span id="url"></span>
<form action="/set/set_ajax.php" method="post" name="form1">
<input type="hidden" id="mode" name="mode" value="" />
<table border="0" cellpadding="0" cellspacing="0" summary="user_select_area">
<tr>
	<td>
	<table border="0" cellpadding="0" cellspacing="0" summary="user_select_space">
	<tr>
		<td colspan="2">
			<table class="child parts" border="0" cellpadding="0" cellspacing="0" summary="parts" bgcolor="#DDDDDD">
				<tr>
					<th width="20" bgcolor="#BBBBBB" align="left">
						機
					</td>
					<td width="100">
						<div class="at">@<span id="at_parts" class="at"><?php echo $this->_tpl_vars['at_parts']; ?>
</span>
						&nbsp;超過<span id="down_parts" class="at"></span>%
						</div>
					</td>
				</tr>
				<!-- HEAD -->
				<tr>
					<td width="20">
						頭：
					</td>
					<td width="100">
						<?php echo smarty_function_html_options(array('name' => 'head','options' => $this->_tpl_vars['arrHeadSelect'],'selected' => $this->_tpl_vars['data']['head'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /HEAD -->
				<!-- BODY -->
				<tr>
					<td>
						胴：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'body','options' => $this->_tpl_vars['arrBodySelect'],'selected' => $this->_tpl_vars['data']['body'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /BODY -->
				<!-- ARM -->
				<tr>
					<td>
						腕：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'arm','options' => $this->_tpl_vars['arrArmSelect'],'selected' => $this->_tpl_vars['data']['arm'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /ARM -->
				<!-- LEG -->
				<tr>
					<td>
						脚：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'leg','options' => $this->_tpl_vars['arrLegSelect'],'selected' => $this->_tpl_vars['data']['leg'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /LEG -->
			</table><!-- /TABLE parts -->
		</td>
		<td colspan="2">
			<table class="child assault" border="0" cellpadding="0" cellspacing="0" summary="assault" bgcolor="#DDDDDD">
				<tr>
					<th width="20" bgcolor="#99ffcc" align="left">
						麻
					</th>
					<th width="125" bgcolor="#99ffcc" align="left">
						<div class="at">@<span id="at_assault" class="at"><?php echo $this->_tpl_vars['at_assault']; ?>
</span>
						&nbsp;超過<span id="down_assault" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Assault_Main -->
				<tr>
					<td>
						主：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_main','options' => $this->_tpl_vars['arrAssaultMainSelect'],'selected' => $this->_tpl_vars['data']['assault_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Main -->
			<!-- Assault_Sub -->
				<tr>
					<td>
						副：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_sub','options' => $this->_tpl_vars['arrAssaultSubSelect'],'selected' => $this->_tpl_vars['data']['assault_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Sub -->
			<!-- Assault_Assist -->
				<tr>
					<td>
						補：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_assist','options' => $this->_tpl_vars['arrAssaultAssistSelect'],'selected' => $this->_tpl_vars['data']['assault_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Assist -->
			<!-- Assault_Special -->
				<tr>
					<td>
						特：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_special','options' => $this->_tpl_vars['arrAssaultSpecialSelect'],'selected' => $this->_tpl_vars['data']['assault_special'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Special -->
			</table>
			<!-- /TABLE assault -->
		</td>
		<td colspan="2">
			<table class="child heavy" border="0" cellpadding="0" cellspacing="0" summary="parts" bgcolor="#DDDDDD">
				<tr>
					<th width="20" bgcolor="#ff99ff" align="left">
						蛇
					</th>
					<th width="125" bgcolor="#ff99ff" align="left">
						<div class="at">@<span id="at_heavy" class="at"><?php echo $this->_tpl_vars['at_heavy']; ?>
</span>
						&nbsp;超過<span id="down_heavy" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Heavy_Main -->
				<tr>
					<td>
						主：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_main','options' => $this->_tpl_vars['arrHeavyMainSelect'],'selected' => $this->_tpl_vars['data']['heavy_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Main -->
			<!-- Heavy_Sub -->
				<tr>
					<td>
						副：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_sub','options' => $this->_tpl_vars['arrHeavySubSelect'],'selected' => $this->_tpl_vars['data']['heavy_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Sub -->
			<!-- Heavy_Assist -->
				<tr>
					<td>
						補：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_assist','options' => $this->_tpl_vars['arrHeavyAssistSelect'],'selected' => $this->_tpl_vars['data']['heavy_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Assist -->
			<!-- Heavy_Special -->
				<tr>
					<td>
						特：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_special','options' => $this->_tpl_vars['arrHeavySpecialSelect'],'selected' => $this->_tpl_vars['data']['heavy_special'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Special -->
			</table>
			<!-- /TABLE heavy -->
		</td>
		<td colspan="2">
			<table class="child snipe" border="0" cellpadding="0" cellspacing="0" summary="parts" bgcolor="#DDDDDD">
				<tr>
					<th width="20" bgcolor="#ffff99" align="left">
						砂
					</th>
					<th width="125" bgcolor="#ffff99" align="left">
						<div class="at">@<span id="at_snipe"><?php echo $this->_tpl_vars['at_snipe']; ?>
</span>
						&nbsp;超過<span id="down_snipe" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Snipe_Main -->
				<tr>
					<td>
						主：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_main','options' => $this->_tpl_vars['arrSnipeMainSelect'],'selected' => $this->_tpl_vars['data']['snipe_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Main -->
			<!-- Snipe_Sub -->
				<tr>
					<td>
						副：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_sub','options' => $this->_tpl_vars['arrSnipeSubSelect'],'selected' => $this->_tpl_vars['data']['snipe_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Sub -->
			<!-- Snipe_Assist -->
				<tr>
					<td>
						補：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_assist','options' => $this->_tpl_vars['arrSnipeAssistSelect'],'selected' => $this->_tpl_vars['data']['snipe_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Assist -->
			<!-- Snipe_Special -->
				<tr>
					<td>
						特：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_special','options' => $this->_tpl_vars['arrSnipeSpecialSelect'],'selected' => $this->_tpl_vars['data']['snipe_special'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Special -->
			</table>
			<!-- /TABLE snipe -->
		</td>
		<td colspan="2">
			<table class="child support" border="0" cellpadding="0" cellspacing="0" summary="parts">
				<tr>
					<th width="20" bgcolor="#33ff99" align="left">
						支
					</th>
					<th width="125" bgcolor="#33ff99" align="left">
						<div class="at">@<span id="at_support" class="at"><?php echo $this->_tpl_vars['at_support']; ?>
</span>
						&nbsp;超過<span id="down_support" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Support_Main -->
				<tr>
					<td>
						主：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_main','options' => $this->_tpl_vars['arrSupportMainSelect'],'selected' => $this->_tpl_vars['data']['support_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Main -->
			<!-- Support_Sub -->
				<tr>
					<td>
						副：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_sub','options' => $this->_tpl_vars['arrSupportSubSelect'],'selected' => $this->_tpl_vars['data']['support_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Sub -->
			<!-- Support_Assist -->
				<tr>
					<td>
						補：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_assist','options' => $this->_tpl_vars['arrSupportAssistSelect'],'selected' => $this->_tpl_vars['data']['support_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Assist -->
			<!-- Support_Special -->
				<tr>
					<td>
						特：
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_special','options' => $this->_tpl_vars['arrSupportSpecialSelect'],'selected' => $this->_tpl_vars['data']['support_special'],'class' => 'select'), $this);?>

					</td></tr>
			<!-- /Support_Special -->
			</table>
			<!-- /TABLE support -->
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#bbbbbb" width="120" align="center">
			兵装別ﾀﾞｯｼｭ速度
		</td>
		<td colspan="2" align="center" bgcolor="#99ffcc" width="120">
			<table class="w120" border="0" width="120" cellpadding="0" cellspacing="0" summary="assault_ac">
			<tr>
				<td width="60" align="center">
					ﾀﾞｯｼｭ
				</td>
				<td width="85" align="center">
					<span id="speed_assault"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					巡航
				</td>
				<td align="center">
					<span id="speed_assault_ld"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					ＡＣ
				</td>
				<td align="center">
					<span id="speed_assault_ac"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					ＭＷ
				</td>
				<td align="center">
					<span id="speed_assault_mw"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					箪笥
				</td>
				<td align="center">
					<span id="speed_assault_dis"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					MW2
				</td>
				<td align="center">
					<span id="speed_assault_mw2"></span>m/s
				</td>
			</tr>
			</table>
		</td>
		<td colspan="2" align="center" bgcolor="#ff99ff" width="120">
			<table class="w120" border="0" width="120" cellpadding="0" cellspacing="0" summary="heavy_ac">
			<tr>
				<td width="60" align="center">
					ﾀﾞｯｼｭ
				</td>
				<td width="85" align="center">
					<span id="speed_heavy"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					巡航
				</td>
				<td align="center">
					<span id="speed_heavy_ld"></span>m/s
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			</table>
		</td>
		<td colspan="2" align="center" bgcolor="#ffff99" width="120">
			<table class="w120" border="0" width="120" cellpadding="0" cellspacing="0" summary="snipe_ac">
			<tr>
				<td width="60" align="center">
					ﾀﾞｯｼｭ
				</td>
				<td width="85" align="center">
					<span id="speed_snipe"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					巡航
				</td>
				<td align="center">
					<span id="speed_snipe_ld"></span>m/s
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			</table>
		</td>
		<td colspan="2" align="center" bgcolor="#33ff99" width="120">
			<table class="w120" border="0" width="120" cellpadding="0" cellspacing="0" summary="support_ac">
			<tr>
				<td width="60" align="center">
					ﾀﾞｯｼｭ
				</td>
				<td width="85" align="center">
					<span id="speed_support"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					巡航
				</td>
				<td align="center">
					<span id="speed_support_ld"></span>m/s
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					-
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</td>
</tr>
<tr>
	<td colspan="5">
		<button onClick="showChip();return false;">チップを表示/非表示</button>
	</td>
</tr>
<tr id="chip_row" style="display:none;">
	<td colspan="5" valign="top">
	<table border="0" rowspan="2" cellspacing="0" cellpadding="0" summary="chip_area" bgcolor="#DDDDDD">
		<tr>
			<td class="w165" width="145">
				<b>機能追加系</b>
			</td>
			<td class="w165" width="145">
				<b>強化系-機体-</b>
			</td>
			<td class="w165" width="145">
				<b>強化系-武器-</b>
			</td>
			<td class="w165" width="145">
				<b>アクション動作</b>
			</td>
			<td class="w165" width="145">
				<b>ダッシュ動作</b>
			</td>
		</tr>
		<tr>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- 機能追加 -->
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="hidan_chip[]" value="2" <?php if ($this->_tpl_vars['data']['hidan_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)被弾方向表示
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="tentou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['tentou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)転倒耐性
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="camera_chip[]" value="1" <?php if ($this->_tpl_vars['data']['camera_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)被弾時カメラ制御
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="touka_chip[]" value="1" <?php if ($this->_tpl_vars['data']['touka_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)透過ロックオン維持
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="anti_chip[]" value="1" <?php if ($this->_tpl_vars['data']['anti_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)アンチブレイク
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="jidou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['jidou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)自動体勢制御
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="touteki_chip[]" value="1" <?php if ($this->_tpl_vars['data']['touteki_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)投てき適性
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="tanchi_chip[]" value="2" <?php if ($this->_tpl_vars['data']['tanchi_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)設置武器探知
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="idou_chip[]" value="2" <?php if ($this->_tpl_vars['data']['idou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)移動中射撃適性
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="koukando_chip[]" value="1" <?php if ($this->_tpl_vars['data']['koukando_chip']['0'] == 1): ?>checked<?php endif; ?> />
								(1)高感度索敵
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="toujou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['toujou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)搭乗兵器適正
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="kousoku_chip[]" value="2" <?php if ($this->_tpl_vars['data']['kousoku_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)高速充填
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="repair_chip[]" value="1" <?php if ($this->_tpl_vars['data']['repair_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)リペアポッド適正
							</label>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="165" valign="top">
				<table class="w120" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- 機体強化 -->
					<tr>
						<td width="145" colspan="2">
							全体
						</td>
					</tr>
					<tr>
						<td width="20">装：</td>
						<td width="125">
							<select class="select" name="armer_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['armer_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+1%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['armer_chip'] == 2): ?>selected<?php endif; ?> >コスト２(+2%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">実：</td>
						<td width="125">
							<select class="select" name="vs_real_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_real_chip'] == 1): ?>selected<?php endif; ?> >コスト１(-4%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_real_chip'] == 2): ?>selected<?php endif; ?> >コスト２(-8%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">爆：</td>
						<td width="125">
							<select class="select" name="vs_blast_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_blast_chip'] == 1): ?>selected<?php endif; ?> >コスト１(-5%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_blast_chip'] == 2): ?>selected<?php endif; ?> >コスト２(-10%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">ニ：</td>
						<td width="125">
							<select class="select" name="vs_newd_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_newd_chip'] == 1): ?>selected<?php endif; ?> >コスト１(-3%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_newd_chip'] == 2): ?>selected<?php endif; ?> >コスト２(-6%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">近：</td>
						<td width="125">
							<select class="select" name="vs_kinsetsu_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_kinsetsu_chip'] == 1): ?>selected<?php endif; ?> >コスト１(-5%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_kinsetsu_chip'] == 2): ?>selected<?php endif; ?> >コスト２(-10%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="w120" width="20">SB：</td>
						<td width="125">
							<select class="select" name="bonus_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['weight_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							頭
						</td>
					</tr>
					<tr>
						<td width="20">射：</td>
						<td width="125">
							<select class="select" name="revision_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['revision_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+1%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['revision_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+3%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">索：</td>
						<td width="125">
							<select class="select" name="search_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['search_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+15m)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['search_chip'] == 2): ?>selected<?php endif; ?> >コスト２(+45m)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							胴
						</td>
					</tr>
					<tr>
						<td width="20">ブ：</td>
						<td width="125">
							<select class="select" name="boost_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['boost_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+2)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['boost_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+6)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">SP：</td>
						<td width="125">
							<select class="select" name="sp_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['sp_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+3%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['sp_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+9%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							腕
						</td>
					</tr>
					<tr>
						<td width="20">武：</td>
						<td width="125">
							<select class="select" name="change_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['change_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+2%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['change_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+6%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">ﾘﾛ：</td>
						<td width="125">
							<select class="select" name="reload_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['reload_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+1%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['reload_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+3%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							脚
						</td>
					</tr>
					<tr>
						<td width="20">歩：</td>
						<td width="125">
							<select class="select" name="walk_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['walk_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+0.27m/s)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['walk_chip'] == 2): ?>selected<?php endif; ?> >コスト２(+0.81m/s)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">重：</td>
						<td width="125">
							<select class="select" name="weight_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['weight_chip'] == 1): ?>selected<?php endif; ?> >コスト１(+80)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['weight_chip'] == 3): ?>selected<?php endif; ?> >コスト３(+250)</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="165" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- 武器強化 -->
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="bakuhuu_chip[]" value="2" <?php if ($this->_tpl_vars['data']['bakuhuu_chip']['0'] == 2): ?>checked<?php endif; ?> />
								爆風範囲拡大
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="sokusya_chip[]" value="1" <?php if ($this->_tpl_vars['data']['sokusya_chip']['0'] == 1): ?>checked<?php endif; ?> />
								実弾速射
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="newd_chip[]" value="2" <?php if ($this->_tpl_vars['data']['newd_chip']['0'] == 2): ?>checked<?php endif; ?> />
								ニュード威力上昇
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="kinsetsu_chip[]" value="2" <?php if ($this->_tpl_vars['data']['kinsetsu_chip']['0'] == 2): ?>checked<?php endif; ?> />
								近接攻撃強化
							</label>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- アクション -->
					<tr>
						<td class="w165" width="165">
							<select class="select" name="action_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['action_chip'] == 1): ?>selected<?php endif; ?> >しゃがみⅠ</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['action_chip'] == 2): ?>selected<?php endif; ?> >しゃがみⅡ</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['action_chip'] == 3): ?>selected<?php endif; ?> >クイックターン</option>
								<option value="4" <?php if ($this->_tpl_vars['data']['action_chip'] == 4): ?>selected<?php endif; ?> >タックルⅠ</option>
								<option value="5" <?php if ($this->_tpl_vars['data']['action_chip'] == 5): ?>selected<?php endif; ?> >タックルⅡ</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- ダッシュ -->
					<tr>
						<td class="w165" width="165">
							<select class="select" name="action_d_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['action_d_chip'] == 1): ?>selected<?php endif; ?> >ロングタックル</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['action_d_chip'] == 2): ?>selected<?php endif; ?> >ジャンプキック</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</td>
</tr>
<!-- /TABLE user_select_space -->
<tr>
	<td>
		<table border="0" cellspacing="0" cellpadding="0" summary="spec" class="spec">
		<!-- TOTAL_DETAIL -->
		<tr>
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="total_detail">
					<tr>
						<th width="60">装甲平均</th>
						<td width="60"><span id="armer_avg"></span>%</td>
					</tr>
					<tr>
						<th>ﾁｯﾌﾟ数</th>
						<td><span id="total_chip"></span>/<span id="chip"></span></td>
					</tr>
					<tr>
						<th>ﾎﾞｰﾅｽ</th>
						<td><span id="bonus"></span></td>
					</tr>
				</table>
			</td>
		<!-- /TOTAL_DETAIL -->
		<!-- HEAD_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="head_detail">
					<tr>
						<th width="50">装甲</th>
						<td width="30"><span id="head0_rank"></span></td>
						<td width="40"><span id="head0"></span>%</td>
					</tr>
					<tr>
						<th>射補</th>
						<td><span id="head1_rank"></span></td>
						<td><span id="head1"></span>%</td>
					</tr>
					<tr>
						<th>索敵</th>
						<td><span id="head2_rank"></span></td>
						<td><span id="head2"></span>m</td>
					</tr>
					<tr>
						<th>ﾛｯｸ</th>
						<td><span id="head3_rank"></span></td>
						<td><span id="head3"></span>m</td>
					</tr>
				</table>
			</td>
		<!-- /HEAD_DETAIL -->
		<!-- BODY_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="body_detail">
					<tr>
						<th width="60">装甲</th>
						<td width="30"><span id="body0_rank"></span></td>
						<td width="60"><span id="body0"></span>%</td>
					</tr>
					<tr>
						<th>ﾌﾞｰｽﾄ</th>
						<td><span id="body1_rank"></span></td>
						<td><span id="body1"></span>回</td>
					</tr>
					<tr>
						<th>ＳＰ</th>
						<td><span id="body2_rank"></span></td>
						<td><span id="body2"></span>%</td>
					</tr>
					<tr>
						<th>ｴﾘﾁｪﾝ</th>
						<td><span id="body3_rank"></span></td>
						<td><span id="body3"></span>秒</td>
					</tr>
				</table>
			</td>
		<!-- /BODY_DETAIL -->
		<!-- ARM_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="head_detail">
					<tr>
						<th width="60">装甲</th>
						<td width="30"><span id="arm0_rank"></span></td>
						<td width="60"><span id="arm0"></span>%</td>
					</tr>
					<tr>
						<th>反動</th>
						<td><span id="arm1_rank"></span></td>
						<td><span id="arm1"></span>%</td>
					</tr>
					<tr>
						<th>ﾘﾛｰﾄﾞ</th>
						<td><span id="arm2_rank"></span></td>
						<td><span id="arm2"></span>%</td>
					</tr>
					<tr>
						<th>武変</th>
						<td><span id="arm3_rank"></span></td>
						<td><span id="arm3"></span>%</td>
					</tr>
				</table>
			</td>
		<!-- /ARM_DETAIL -->
		<!-- LEG_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="head_detail">
					<tr>
						<th width="60">装甲</th>
						<td width="30"><span id="leg0_rank"></span></td>
						<td width="60"><span id="leg0"></span>%</td>
					</tr>
					<tr>
						<th>歩行</th>
						<td><span id="leg1_rank"></span></td>
						<td><span id="leg1"></span>m/s</td>
					</tr>
					<tr>
						<th>ﾀﾞｯｼｭ</th>
						<td><span id="leg2_rank"></span></td>
						<td><span id="leg2"></span>m/s</td>
					</tr>
					<tr>
						<th>重耐</th>
						<td><span id="leg3_rank"></span></td>
						<td><span id="leg3">&nbsp;</span></td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- /LEG_DETAIL -->
		</table>
	</td>
</tr>
</table>
<!-- /TABLE spec -->
</form>
<div id="footer">
created by たっちん(<a href="http://twitter.com/tattin_bb">@tattin_bb</a>)<br />
&copy;SEGA
</div>
</body>
</html>