<?php /* Smarty version 2.6.25, created on 2012-03-28 01:40:25
         compiled from set_spec.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'set_spec.html', 24, false),array('function', 'html_options', 'set_spec.html', 272, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>BB�V�~�����[�gver1.00-��(mobile)</title>
<style type="text/css">
<!--
.small{
	font-size: 10px;
}
//-->
</style>
</head>
<body style="font-size:small;">
<?php if ($this->_tpl_vars['data']['url'] != ''): ?>
���̃y�[�W��URL<br />
<input type="text" size="25" name="disp_url" value="<?php echo $this->_tpl_vars['data']['url']; ?>
" /><br />
<?php endif; ?>
<a href="#user_select_space">���͂�</a>
<table width="240" border="0" cellpadding="0" cellspacing="0" summary="specs">
	<tr align="center">
		<td colspan="4" bgcolor="#AAAAAA" width="240">
			�@�̃f�[�^&nbsp;@<?php echo $this->_tpl_vars['data']['at_parts']; ?>
&nbsp;����<?php echo ((is_array($_tmp=@$this->_tpl_vars['data']['down_parts'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
%
		</td>
	</tr>
	<tr align="center">
		<th colspan="2" bgcolor="#DDDDDD">
			���b����
		</th>
		<td colspan="2" bgcolor="#FFFFFF">
			<?php echo $this->_tpl_vars['data']['armer_avg']; ?>
%
		</td>
	</tr>
	<tr align="center">
		<th colspan="2" bgcolor="#DDDDDD">
			���ߐ�
		</th>
		<td colspan="2" bgcolor="#FFFFFF">
			<?php echo $this->_tpl_vars['data']['total_chip']; ?>
/<?php echo $this->_tpl_vars['data']['chip']; ?>

		</td>
	</tr>
	<tr align="center">
		<th colspan="2" bgcolor="#DDDDDD">
			�ްŽ
		</th>
		<td colspan="2" bgcolor="#FFFFFF">
			<?php echo ((is_array($_tmp=@$this->_tpl_vars['data']['bonus'])) ? $this->_run_mod_handler('default', true, $_tmp, '�Ȃ�') : smarty_modifier_default($_tmp, '�Ȃ�')); ?>

		</td>
	</tr>
	<tr align="center">
		<th colspan="4" bgcolor="#BBBBBB">
			�����`�b�v
		</th>
	</tr>
	<tr align="center">
		<td bgcolor="#DDDDDD">���b</td>
		<td bgcolor="#DDDDDD">�˕�</td>
		<td bgcolor="#DDDDDD">�r�o</td>
		<td bgcolor="#DDDDDD">����</td>
	</tr>
	<tr align="center">
		<td>
			<?php if ($this->_tpl_vars['data']['armer_chip']): ?>
				�R�X�g<?php echo $this->_tpl_vars['data']['armer_chip']; ?>

			<?php else: ?>
				�Ȃ�
			<?php endif; ?>
		</td>
		<td>
			<?php if ($this->_tpl_vars['data']['revision_chip']): ?>
				�R�X�g<?php echo $this->_tpl_vars['data']['revision_chip']; ?>

			<?php else: ?>
				�Ȃ�
			<?php endif; ?>
		</td>
		<td>
			<?php if ($this->_tpl_vars['data']['sp_chip']): ?>
				�R�X�g<?php echo $this->_tpl_vars['data']['sp_chip']; ?>

			<?php else: ?>
				�Ȃ�
			<?php endif; ?>
		</td>
		<td>
			<?php if ($this->_tpl_vars['data']['change_chip']): ?>
				�R�X�g<?php echo $this->_tpl_vars['data']['change_chip']; ?>

			<?php else: ?>
				�Ȃ�
			<?php endif; ?>
		</td>
	</tr>
	<tr align="center">
		<td bgcolor="#DDDDDD">�d��</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
	</tr>
	<tr align="center">
		<td>
			<?php if ($this->_tpl_vars['data']['weight_chip']): ?>
				�R�X�g<?php echo $this->_tpl_vars['data']['weight_chip']; ?>

			<?php else: ?>
				�Ȃ�
			<?php endif; ?>
		</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
		<td bgcolor="#DDDDDD">&nbsp;</td>
	</tr>
	<tr align="center">
		<td colspan="2" bgcolor="#BBBBBB" width="120">
			��<br /><?php echo $this->_tpl_vars['arrHeadSelect'][$this->_tpl_vars['data']['head']]; ?>

		</td>
		<td colspan="2" bgcolor="#BBBBBB" width="120">
			��<br /><?php echo $this->_tpl_vars['arrBodySelect'][$this->_tpl_vars['data']['body']]; ?>

		</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<th width="60">���b</th>
		<th width="60">�˕�</th>
		<th width="60">���b</th>
		<th width="60">�ް��</th>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['head0_color']; ?>
"><?php echo $this->_tpl_vars['data']['head0_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['head1_color']; ?>
"><?php echo $this->_tpl_vars['data']['head1_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['body0_color']; ?>
"><?php echo $this->_tpl_vars['data']['body0_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['body1_color']; ?>
"><?php echo $this->_tpl_vars['data']['body1_rank']; ?>
</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['head0_color']; ?>
"><?php echo $this->_tpl_vars['data']['head0']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['head1_color']; ?>
"><?php echo $this->_tpl_vars['data']['head1']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['body0_color']; ?>
"><?php echo $this->_tpl_vars['data']['body0']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['body1_color']; ?>
"><?php echo $this->_tpl_vars['data']['body1']; ?>
��</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<th>���G</th>
		<th>ۯ�</th>
		<th>�r�o</th>
		<th>�����</th>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td bgcolor="<?php echo $this->_tpl_vars['data']['head2_color']; ?>
"><?php echo $this->_tpl_vars['data']['head2_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['head3_color']; ?>
"><?php echo $this->_tpl_vars['data']['head3_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['body2_color']; ?>
"><?php echo $this->_tpl_vars['data']['body2_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['body3_color']; ?>
"><?php echo $this->_tpl_vars['data']['body3_rank']; ?>
</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td bgcolor="<?php echo $this->_tpl_vars['data']['head2_color']; ?>
"><?php echo $this->_tpl_vars['data']['head2']; ?>
m</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['head3_color']; ?>
"><?php echo $this->_tpl_vars['data']['head3']; ?>
m</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['body2_color']; ?>
"><?php echo $this->_tpl_vars['data']['body2']; ?>
%</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['body3_color']; ?>
"><?php echo $this->_tpl_vars['data']['body3']; ?>
�b</td>
	</tr>
	<tr align="center">
		<td colspan="2" bgcolor="#BBBBBB" width="120">
			�r<br /><?php echo $this->_tpl_vars['arrArmSelect'][$this->_tpl_vars['data']['arm']]; ?>

		</td>
		<td colspan="2" bgcolor="#BBBBBB" width="120">
			�r<br /><?php echo $this->_tpl_vars['arrLegSelect'][$this->_tpl_vars['data']['leg']]; ?>

		</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<th width="60">���b</th>
		<th width="60">����</th>
		<th width="60">���b</th>
		<th width="60">���s</th>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['arm0_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm0_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['arm1_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm1_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['leg0_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg0_rank']; ?>
</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['leg1_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg1_rank']; ?>
</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['arm0_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm0']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['arm1_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm1']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['leg0_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg0']; ?>
%</td>
		<td width="30" bgcolor="<?php echo $this->_tpl_vars['data']['leg1_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg1']; ?>
m/s</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<th>�۰��</th>
		<th>����</th>
		<th>�ޯ��</th>
		<th>�d��</th>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td bgcolor="<?php echo $this->_tpl_vars['data']['arm2_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm2_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['arm3_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm3_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['leg2_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg2_rank']; ?>
</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['leg3_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg3_rank']; ?>
</td>
	</tr>
	<tr align="center" bgcolor="#DDDDDD">
		<td bgcolor="<?php echo $this->_tpl_vars['data']['arm2_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm2']; ?>
%</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['arm3_color']; ?>
"><?php echo $this->_tpl_vars['data']['arm3']; ?>
%</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['leg2_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg2']; ?>
m/s</td>
		<td bgcolor="<?php echo $this->_tpl_vars['data']['leg3_color']; ?>
"><?php echo $this->_tpl_vars['data']['leg3']; ?>
</td>
	</tr>
	<tr align="center" bgcolor="#66DD99">
		<td colspan="4">��&nbsp;@<?php echo $this->_tpl_vars['data']['at_assault']; ?>
&nbsp;����<?php echo $this->_tpl_vars['data']['down_assault']; ?>
%</td>
	</tr>
	<tr align="center" bgcolor="#99FFCC">
		<th colspan="2">�ޯ��</th>
		<th colspan="2">���q</th>
	</tr>
	<tr align="center" bgcolor="#99FFCC">
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_assault']; ?>
m/s</td>
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_assault_ld']; ?>
m/s</td>
	</tr>
	<tr align="center" bgcolor="#99FFCC">
		<th>��AC</th>
		<th>MW</th>
		<th>�\�y</th>
		<th>MW2</th>
	</tr>
	<tr align="center" bgcolor="#99FFCC">
		<td><?php echo $this->_tpl_vars['data']['speed_assault_ac']; ?>
m/s</td>
		<td><?php echo $this->_tpl_vars['data']['speed_assault_mw']; ?>
m/s</td>
		<td><?php echo $this->_tpl_vars['data']['speed_assault_dis']; ?>
m/s</td>
		<td><?php echo $this->_tpl_vars['data']['speed_assault_mw2']; ?>
m/s</td>
	</tr>
	<tr align="center" bgcolor="#FF66DD">
		<td colspan="4">��&nbsp;@<?php echo $this->_tpl_vars['data']['at_heavy']; ?>
&nbsp;����<?php echo $this->_tpl_vars['data']['down_heavy']; ?>
%</td>
	</tr>
	<tr align="center" bgcolor="#FF99FF">
		<th colspan="2">�ޯ��</th>
		<th colspan="2">���q</th>
	</tr>
	<tr align="center" bgcolor="#FF99FF">
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_heavy']; ?>
m/s</td>
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_heavy_ld']; ?>
m/s</td>
	</tr>
	<tr align="center" bgcolor="#FFCC33">
		<td colspan="4">��&nbsp;@<?php echo $this->_tpl_vars['data']['at_snipe']; ?>
&nbsp;����<?php echo $this->_tpl_vars['data']['down_snipe']; ?>
%</td>
	</tr>
	<tr align="center" bgcolor="#FFFF99">
		<th colspan="2">�ޯ��</th>
		<th colspan="2">���q</th>
	</tr>
	<tr align="center" bgcolor="#FFFF99">
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_snipe']; ?>
m/s</td>
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_snipe_ld']; ?>
m/s</td>
	</tr>
	<tr align="center" bgcolor="#33CC99">
		<td colspan="4">�x&nbsp;@<?php echo $this->_tpl_vars['data']['at_support']; ?>
&nbsp;����<?php echo $this->_tpl_vars['data']['down_support']; ?>
%</td>
	</tr>
	<tr align="center" bgcolor="#33FF99">
		<th colspan="2">�ޯ��</th>
		<th colspan="2">���q</th>
	</tr>
	<tr align="center" bgcolor="#33FF99">
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_support']; ?>
m/s</td>
		<td colspan="2"><?php echo $this->_tpl_vars['data']['speed_support_ld']; ?>
m/s</td>
	</tr>
</table>
<!-- /TABLE specs -->
<a name="user_select_space"></a>
<br />
<br />
<form action="/set/set_mobile.php" method="post" name="form1">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
	<?php if ($this->_tpl_vars['key'] != 'mode'): ?>
	<input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['val']; ?>
" />
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<table width="200" border="0" cellpadding="0" cellspacing="0" summary="user_select_space">
	<!-- HEAD -->
	<tr bgcolor="#BBBBBB">
		<td width="40">
			��
		</td>
		<td width="160">
			<?php echo smarty_function_html_options(array('name' => 'head','options' => $this->_tpl_vars['arrHeadSelect'],'selected' => $this->_tpl_vars['data']['head']), $this);?>

		</td>
	</tr>
	<!-- /HEAD -->
	<!-- BODY -->
	<tr bgcolor="#BBBBBB">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'body','options' => $this->_tpl_vars['arrBodySelect'],'selected' => $this->_tpl_vars['data']['body'],'class' => 'select'), $this);?>

		</td>
	</tr>
	<!-- /BODY -->
	<!-- ARM -->
	<tr bgcolor="#BBBBBB">
		<td>
			�r
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'arm','options' => $this->_tpl_vars['arrArmSelect'],'selected' => $this->_tpl_vars['data']['arm'],'class' => 'select'), $this);?>

		</td>
	</tr>
	<!-- /ARM -->
	<!-- LEG -->
	<tr bgcolor="#BBBBBB">
		<td>
			�r
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'leg','options' => $this->_tpl_vars['arrLegSelect'],'selected' => $this->_tpl_vars['data']['leg'],'class' => 'select'), $this);?>

		</td>
	</tr>
	<!-- /LEG -->
<!-- /TABLE parts -->
<!-- Assault_Main -->
	<tr bgcolor="#99FFCC">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_main','options' => $this->_tpl_vars['arrAssaultMainSelect'],'selected' => $this->_tpl_vars['data']['assault_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Main -->
<!-- Assault_Sub -->
	<tr bgcolor="#99FFCC">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_sub','options' => $this->_tpl_vars['arrAssaultSubSelect'],'selected' => $this->_tpl_vars['data']['assault_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Sub -->
<!-- Assault_Assist -->
	<tr bgcolor="#99FFCC">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_assist','options' => $this->_tpl_vars['arrAssaultAssistSelect'],'selected' => $this->_tpl_vars['data']['assault_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Assist -->
<!-- Assault_Special -->
	<tr bgcolor="#99FFCC">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_special','options' => $this->_tpl_vars['arrAssaultSpecialSelect'],'selected' => $this->_tpl_vars['data']['assault_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Special -->
<!-- Heavy_Main -->
	<tr bgcolor="#FF99FF">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_main','options' => $this->_tpl_vars['arrHeavyMainSelect'],'selected' => $this->_tpl_vars['data']['heavy_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Main -->
<!-- Heavy_Sub -->
	<tr bgcolor="#FF99FF">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_sub','options' => $this->_tpl_vars['arrHeavySubSelect'],'selected' => $this->_tpl_vars['data']['heavy_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Sub -->
<!-- Heavy_Assist -->
	<tr bgcolor="#FF99FF">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_assist','options' => $this->_tpl_vars['arrHeavyAssistSelect'],'selected' => $this->_tpl_vars['data']['heavy_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Assist -->
<!-- Heavy_Special -->
	<tr bgcolor="#FF99FF">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_special','options' => $this->_tpl_vars['arrHeavySpecialSelect'],'selected' => $this->_tpl_vars['data']['heavy_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Special -->
<!-- Snipe_Main -->
	<tr bgcolor="#FFFF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_main','options' => $this->_tpl_vars['arrSnipeMainSelect'],'selected' => $this->_tpl_vars['data']['snipe_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Main -->
<!-- Snipe_Sub -->
	<tr bgcolor="#FFFF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_sub','options' => $this->_tpl_vars['arrSnipeSubSelect'],'selected' => $this->_tpl_vars['data']['snipe_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Sub -->
<!-- Snipe_Assist -->
	<tr bgcolor="#FFFF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_assist','options' => $this->_tpl_vars['arrSnipeAssistSelect'],'selected' => $this->_tpl_vars['data']['snipe_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Assist -->
<!-- Snipe_Special -->
	<tr bgcolor="#FFFF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_special','options' => $this->_tpl_vars['arrSnipeSpecialSelect'],'selected' => $this->_tpl_vars['data']['snipe_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Special -->
<!-- Support_Main -->
	<tr bgcolor="#33FF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_main','options' => $this->_tpl_vars['arrSupportMainSelect'],'selected' => $this->_tpl_vars['data']['support_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Main -->
<!-- Support_Sub -->
	<tr bgcolor="#33FF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_sub','options' => $this->_tpl_vars['arrSupportSubSelect'],'selected' => $this->_tpl_vars['data']['support_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Sub -->
<!-- Support_Assist -->
	<tr bgcolor="#33FF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_assist','options' => $this->_tpl_vars['arrSupportAssistSelect'],'selected' => $this->_tpl_vars['data']['support_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Assist -->
<!-- Support_Special -->
	<tr bgcolor="#33FF99">
		<td>
			��
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_special','options' => $this->_tpl_vars['arrSupportSpecialSelect'],'selected' => $this->_tpl_vars['data']['support_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Special -->
</table>
<!-- /TABLE user_select_space -->
	<input type="submit" name="submit_res" value="�ĕ\��" />
	<input type="submit" name="submit_res" value="�`�b�v�I����" />
</form>
</body>
</html>