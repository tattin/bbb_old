<?php /* Smarty version 2.6.25, created on 2012-05-22 10:29:59
         compiled from set.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'set.html', 230, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>BB�V�~�����[�gver1.00-��</title>
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
	// mode�߂�
	$("#mode").val("");
}
function escapeDQ(str){
	str = str.replace(/\"/g, "");	//"
	return str;
}
var arrFullSet = {
	'Cougar'     : '�d�ʑϐ�(150)',
	'HeavyGuard' : '���b(3)',
	'Shrike'     : '���s',
	'Zebra'      : '���G',
	'Enforcer'   : '�u�[�X�g',
	'Kefar'      : '�����z��',
	'Edge'       : '�����[�h',
	'Yakusya'    : '�_�b�V��',
	'Saber'      : '�G���A�ړ�',
	'Discas'     : 'SP����',
	'Nereid'     : '�ˌ��␳',
	'Jinga'      : '���b�N�I��',
	'Roji'       : '���b(5)',
	'Buz'        : '�����ړ�',
	'Randbalk'   : '�d�ʑϐ�(150)',
	''           : '�Ȃ�'
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
<input type="button" value="�A�Z��URL�擾" onClick="saveSubmit();" /><span id="url"></span>
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
						�@
					</td>
					<td width="100">
						<div class="at">@<span id="at_parts" class="at"><?php echo $this->_tpl_vars['at_parts']; ?>
</span>
						&nbsp;����<span id="down_parts" class="at"></span>%
						</div>
					</td>
				</tr>
				<!-- HEAD -->
				<tr>
					<td width="20">
						���F
					</td>
					<td width="100">
						<?php echo smarty_function_html_options(array('name' => 'head','options' => $this->_tpl_vars['arrHeadSelect'],'selected' => $this->_tpl_vars['data']['head'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /HEAD -->
				<!-- BODY -->
				<tr>
					<td>
						���F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'body','options' => $this->_tpl_vars['arrBodySelect'],'selected' => $this->_tpl_vars['data']['body'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /BODY -->
				<!-- ARM -->
				<tr>
					<td>
						�r�F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'arm','options' => $this->_tpl_vars['arrArmSelect'],'selected' => $this->_tpl_vars['data']['arm'],'class' => 'select'), $this);?>

					</td>
				</tr>
				<!-- /ARM -->
				<!-- LEG -->
				<tr>
					<td>
						�r�F
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
						��
					</th>
					<th width="125" bgcolor="#99ffcc" align="left">
						<div class="at">@<span id="at_assault" class="at"><?php echo $this->_tpl_vars['at_assault']; ?>
</span>
						&nbsp;����<span id="down_assault" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Assault_Main -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_main','options' => $this->_tpl_vars['arrAssaultMainSelect'],'selected' => $this->_tpl_vars['data']['assault_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Main -->
			<!-- Assault_Sub -->
				<tr>
					<td>
						���F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_sub','options' => $this->_tpl_vars['arrAssaultSubSelect'],'selected' => $this->_tpl_vars['data']['assault_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Sub -->
			<!-- Assault_Assist -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'assault_assist','options' => $this->_tpl_vars['arrAssaultAssistSelect'],'selected' => $this->_tpl_vars['data']['assault_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Assault_Assist -->
			<!-- Assault_Special -->
				<tr>
					<td>
						���F
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
						��
					</th>
					<th width="125" bgcolor="#ff99ff" align="left">
						<div class="at">@<span id="at_heavy" class="at"><?php echo $this->_tpl_vars['at_heavy']; ?>
</span>
						&nbsp;����<span id="down_heavy" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Heavy_Main -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_main','options' => $this->_tpl_vars['arrHeavyMainSelect'],'selected' => $this->_tpl_vars['data']['heavy_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Main -->
			<!-- Heavy_Sub -->
				<tr>
					<td>
						���F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_sub','options' => $this->_tpl_vars['arrHeavySubSelect'],'selected' => $this->_tpl_vars['data']['heavy_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Sub -->
			<!-- Heavy_Assist -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'heavy_assist','options' => $this->_tpl_vars['arrHeavyAssistSelect'],'selected' => $this->_tpl_vars['data']['heavy_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Heavy_Assist -->
			<!-- Heavy_Special -->
				<tr>
					<td>
						���F
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
						��
					</th>
					<th width="125" bgcolor="#ffff99" align="left">
						<div class="at">@<span id="at_snipe"><?php echo $this->_tpl_vars['at_snipe']; ?>
</span>
						&nbsp;����<span id="down_snipe" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Snipe_Main -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_main','options' => $this->_tpl_vars['arrSnipeMainSelect'],'selected' => $this->_tpl_vars['data']['snipe_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Main -->
			<!-- Snipe_Sub -->
				<tr>
					<td>
						���F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_sub','options' => $this->_tpl_vars['arrSnipeSubSelect'],'selected' => $this->_tpl_vars['data']['snipe_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Sub -->
			<!-- Snipe_Assist -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'snipe_assist','options' => $this->_tpl_vars['arrSnipeAssistSelect'],'selected' => $this->_tpl_vars['data']['snipe_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Snipe_Assist -->
			<!-- Snipe_Special -->
				<tr>
					<td>
						���F
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
						�x
					</th>
					<th width="125" bgcolor="#33ff99" align="left">
						<div class="at">@<span id="at_support" class="at"><?php echo $this->_tpl_vars['at_support']; ?>
</span>
						&nbsp;����<span id="down_support" class="at"></span>%
						</div>
					</th>
				</tr>
			<!-- Support_Main -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_main','options' => $this->_tpl_vars['arrSupportMainSelect'],'selected' => $this->_tpl_vars['data']['support_main'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Main -->
			<!-- Support_Sub -->
				<tr>
					<td>
						���F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_sub','options' => $this->_tpl_vars['arrSupportSubSelect'],'selected' => $this->_tpl_vars['data']['support_sub'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Sub -->
			<!-- Support_Assist -->
				<tr>
					<td>
						��F
					</td>
					<td>
						<?php echo smarty_function_html_options(array('name' => 'support_assist','options' => $this->_tpl_vars['arrSupportAssistSelect'],'selected' => $this->_tpl_vars['data']['support_assist'],'class' => 'select'), $this);?>

					</td>
				</tr>
			<!-- /Support_Assist -->
			<!-- Support_Special -->
				<tr>
					<td>
						���F
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
			�������ޯ�����x
		</td>
		<td colspan="2" align="center" bgcolor="#99ffcc" width="120">
			<table class="w120" border="0" width="120" cellpadding="0" cellspacing="0" summary="assault_ac">
			<tr>
				<td width="60" align="center">
					�ޯ��
				</td>
				<td width="85" align="center">
					<span id="speed_assault"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					���q
				</td>
				<td align="center">
					<span id="speed_assault_ld"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					�`�b
				</td>
				<td align="center">
					<span id="speed_assault_ac"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					�l�v
				</td>
				<td align="center">
					<span id="speed_assault_mw"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					�\�y
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
					�ޯ��
				</td>
				<td width="85" align="center">
					<span id="speed_heavy"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					���q
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
					�ޯ��
				</td>
				<td width="85" align="center">
					<span id="speed_snipe"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					���q
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
					�ޯ��
				</td>
				<td width="85" align="center">
					<span id="speed_support"></span>m/s
				</td>
			</tr>
			<tr>
				<td align="center">
					���q
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
		<button onClick="showChip();return false;">�`�b�v��\��/��\��</button>
	</td>
</tr>
<tr id="chip_row" style="display:none;">
	<td colspan="5" valign="top">
	<table border="0" rowspan="2" cellspacing="0" cellpadding="0" summary="chip_area" bgcolor="#DDDDDD">
		<tr>
			<td class="w165" width="145">
				<b>�@�\�ǉ��n</b>
			</td>
			<td class="w165" width="145">
				<b>�����n-�@��-</b>
			</td>
			<td class="w165" width="145">
				<b>�����n-����-</b>
			</td>
			<td class="w165" width="145">
				<b>�A�N�V��������</b>
			</td>
			<td class="w165" width="145">
				<b>�_�b�V������</b>
			</td>
		</tr>
		<tr>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- �@�\�ǉ� -->
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="hidan_chip[]" value="2" <?php if ($this->_tpl_vars['data']['hidan_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)��e�����\��
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="tentou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['tentou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)�]�|�ϐ�
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="camera_chip[]" value="1" <?php if ($this->_tpl_vars['data']['camera_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)��e���J��������
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="touka_chip[]" value="1" <?php if ($this->_tpl_vars['data']['touka_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)���߃��b�N�I���ێ�
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="anti_chip[]" value="1" <?php if ($this->_tpl_vars['data']['anti_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)�A���`�u���C�N
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="jidou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['jidou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)�����̐�����
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="touteki_chip[]" value="1" <?php if ($this->_tpl_vars['data']['touteki_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)���Ă��K��
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="tanchi_chip[]" value="2" <?php if ($this->_tpl_vars['data']['tanchi_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)�ݒu����T�m
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="idou_chip[]" value="2" <?php if ($this->_tpl_vars['data']['idou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)�ړ����ˌ��K��
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="koukando_chip[]" value="1" <?php if ($this->_tpl_vars['data']['koukando_chip']['0'] == 1): ?>checked<?php endif; ?> />
								(1)�����x���G
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="toujou_chip[]" value="1" <?php if ($this->_tpl_vars['data']['toujou_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)���敺��K��
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="kousoku_chip[]" value="2" <?php if ($this->_tpl_vars['data']['kousoku_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(2)�����[�U
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="145">
							<label>
								<input class="select" type="checkbox" name="repair_chip[]" value="1" <?php if ($this->_tpl_vars['data']['repair_chip']['0'] == 2): ?>checked<?php endif; ?> />
								(1)���y�A�|�b�h�K��
							</label>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="165" valign="top">
				<table class="w120" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- �@�̋��� -->
					<tr>
						<td width="145" colspan="2">
							�S��
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="armer_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['armer_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+1%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['armer_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(+2%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="vs_real_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_real_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(-4%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_real_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(-8%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="vs_blast_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_blast_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(-5%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_blast_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(-10%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">�j�F</td>
						<td width="125">
							<select class="select" name="vs_newd_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_newd_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(-3%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_newd_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(-6%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">�߁F</td>
						<td width="125">
							<select class="select" name="vs_kinsetsu_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['vs_kinsetsu_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(-5%)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['vs_kinsetsu_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(-10%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="w120" width="20">SB�F</td>
						<td width="125">
							<select class="select" name="bonus_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['weight_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							��
						</td>
					</tr>
					<tr>
						<td width="20">�ˁF</td>
						<td width="125">
							<select class="select" name="revision_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['revision_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+1%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['revision_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+3%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="search_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['search_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+15m)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['search_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(+45m)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							��
						</td>
					</tr>
					<tr>
						<td width="20">�u�F</td>
						<td width="125">
							<select class="select" name="boost_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['boost_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+2)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['boost_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+6)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">SP�F</td>
						<td width="125">
							<select class="select" name="sp_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['sp_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+3%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['sp_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+9%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							�r
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="change_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['change_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+2%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['change_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+6%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">�ہF</td>
						<td width="125">
							<select class="select" name="reload_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['reload_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+1%)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['reload_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+3%)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="145" colspan="2">
							�r
						</td>
					</tr>
					<tr>
						<td width="20">���F</td>
						<td width="125">
							<select class="select" name="walk_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['walk_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+0.27m/s)</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['walk_chip'] == 2): ?>selected<?php endif; ?> >�R�X�g�Q(+0.81m/s)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20">�d�F</td>
						<td width="125">
							<select class="select" name="weight_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['weight_chip'] == 1): ?>selected<?php endif; ?> >�R�X�g�P(+80)</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['weight_chip'] == 3): ?>selected<?php endif; ?> >�R�X�g�R(+250)</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="165" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- ���틭�� -->
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="bakuhuu_chip[]" value="2" <?php if ($this->_tpl_vars['data']['bakuhuu_chip']['0'] == 2): ?>checked<?php endif; ?> />
								�����͈͊g��
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="sokusya_chip[]" value="1" <?php if ($this->_tpl_vars['data']['sokusya_chip']['0'] == 1): ?>checked<?php endif; ?> />
								���e����
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="newd_chip[]" value="2" <?php if ($this->_tpl_vars['data']['newd_chip']['0'] == 2): ?>checked<?php endif; ?> />
								�j���[�h�З͏㏸
							</label>
						</td>
					</tr>
					<tr>
						<td class="w165" width="165">
							<label>
								<input class="select" type="checkbox" name="kinsetsu_chip[]" value="2" <?php if ($this->_tpl_vars['data']['kinsetsu_chip']['0'] == 2): ?>checked<?php endif; ?> />
								�ߐڍU������
							</label>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- �A�N�V���� -->
					<tr>
						<td class="w165" width="165">
							<select class="select" name="action_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['action_chip'] == 1): ?>selected<?php endif; ?> >���Ⴊ�݇T</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['action_chip'] == 2): ?>selected<?php endif; ?> >���Ⴊ�݇U</option>
								<option value="3" <?php if ($this->_tpl_vars['data']['action_chip'] == 3): ?>selected<?php endif; ?> >�N�C�b�N�^�[��</option>
								<option value="4" <?php if ($this->_tpl_vars['data']['action_chip'] == 4): ?>selected<?php endif; ?> >�^�b�N���T</option>
								<option value="5" <?php if ($this->_tpl_vars['data']['action_chip'] == 5): ?>selected<?php endif; ?> >�^�b�N���U</option>
							</select>
						</td>
					</tr>
				</table>
			</td>
			<td class="w165" width="145" valign="top">
				<table class="w165" border="0" cellspacing="0" cellpadding="0" bgcolor="#DDDDDD">
				<!-- �_�b�V�� -->
					<tr>
						<td class="w165" width="165">
							<select class="select" name="action_d_chip">
								<option value="">----</option>
								<option value="1" <?php if ($this->_tpl_vars['data']['action_d_chip'] == 1): ?>selected<?php endif; ?> >�����O�^�b�N��</option>
								<option value="2" <?php if ($this->_tpl_vars['data']['action_d_chip'] == 2): ?>selected<?php endif; ?> >�W�����v�L�b�N</option>
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
						<th width="60">���b����</th>
						<td width="60"><span id="armer_avg"></span>%</td>
					</tr>
					<tr>
						<th>���ߐ�</th>
						<td><span id="total_chip"></span>/<span id="chip"></span></td>
					</tr>
					<tr>
						<th>�ްŽ</th>
						<td><span id="bonus"></span></td>
					</tr>
				</table>
			</td>
		<!-- /TOTAL_DETAIL -->
		<!-- HEAD_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="head_detail">
					<tr>
						<th width="50">���b</th>
						<td width="30"><span id="head0_rank"></span></td>
						<td width="40"><span id="head0"></span>%</td>
					</tr>
					<tr>
						<th>�˕�</th>
						<td><span id="head1_rank"></span></td>
						<td><span id="head1"></span>%</td>
					</tr>
					<tr>
						<th>���G</th>
						<td><span id="head2_rank"></span></td>
						<td><span id="head2"></span>m</td>
					</tr>
					<tr>
						<th>ۯ�</th>
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
						<th width="60">���b</th>
						<td width="30"><span id="body0_rank"></span></td>
						<td width="60"><span id="body0"></span>%</td>
					</tr>
					<tr>
						<th>�ް��</th>
						<td><span id="body1_rank"></span></td>
						<td><span id="body1"></span>��</td>
					</tr>
					<tr>
						<th>�r�o</th>
						<td><span id="body2_rank"></span></td>
						<td><span id="body2"></span>%</td>
					</tr>
					<tr>
						<th>�����</th>
						<td><span id="body3_rank"></span></td>
						<td><span id="body3"></span>�b</td>
					</tr>
				</table>
			</td>
		<!-- /BODY_DETAIL -->
		<!-- ARM_DETAIL -->
			<td>
				<table class="child" border="0" cellspacing="0" cellpadding="0" summary="head_detail">
					<tr>
						<th width="60">���b</th>
						<td width="30"><span id="arm0_rank"></span></td>
						<td width="60"><span id="arm0"></span>%</td>
					</tr>
					<tr>
						<th>����</th>
						<td><span id="arm1_rank"></span></td>
						<td><span id="arm1"></span>%</td>
					</tr>
					<tr>
						<th>�۰��</th>
						<td><span id="arm2_rank"></span></td>
						<td><span id="arm2"></span>%</td>
					</tr>
					<tr>
						<th>����</th>
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
						<th width="60">���b</th>
						<td width="30"><span id="leg0_rank"></span></td>
						<td width="60"><span id="leg0"></span>%</td>
					</tr>
					<tr>
						<th>���s</th>
						<td><span id="leg1_rank"></span></td>
						<td><span id="leg1"></span>m/s</td>
					</tr>
					<tr>
						<th>�ޯ��</th>
						<td><span id="leg2_rank"></span></td>
						<td><span id="leg2"></span>m/s</td>
					</tr>
					<tr>
						<th>�d��</th>
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
created by ��������(<a href="http://twitter.com/tattin_bb">@tattin_bb</a>)<br />
&copy;SEGA
</div>
</body>
</html>