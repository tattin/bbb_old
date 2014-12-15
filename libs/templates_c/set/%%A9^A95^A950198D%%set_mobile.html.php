<?php /* Smarty version 2.6.25, created on 2012-03-27 00:53:32
         compiled from set_mobile.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'set_mobile.html', 28, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>BBシミュレートver1.00-α(mobile)</title>
<style type="text/css">
<!--
.small{
	font-size: 10px;
}
//-->
</style>
</head>
<body style="font-size:small;">
<form action="/set/set_mobile.php" method="post" name="form1">
<input type="hidden" name="mode" value="edit1" />
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
	<input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['val']; ?>
" />
<?php endforeach; endif; unset($_from); ?>
<table width="200" border="0" cellpadding="0" cellspacing="0" summary="user_select_space">
	<!-- HEAD -->
	<tr bgcolor="#BBBBBB">
		<td width="40">
			頭
		</td>
		<td width="160">
			<?php echo smarty_function_html_options(array('name' => 'head','options' => $this->_tpl_vars['arrHeadSelect'],'selected' => $this->_tpl_vars['data']['head']), $this);?>

		</td>
	</tr>
	<!-- /HEAD -->
	<!-- BODY -->
	<tr bgcolor="#BBBBBB">
		<td>
			胴
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'body','options' => $this->_tpl_vars['arrBodySelect'],'selected' => $this->_tpl_vars['data']['body'],'class' => 'select'), $this);?>

		</td>
	</tr>
	<!-- /BODY -->
	<!-- ARM -->
	<tr bgcolor="#BBBBBB">
		<td>
			腕
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'arm','options' => $this->_tpl_vars['arrArmSelect'],'selected' => $this->_tpl_vars['data']['arm'],'class' => 'select'), $this);?>

		</td>
	</tr>
	<!-- /ARM -->
	<!-- LEG -->
	<tr bgcolor="#BBBBBB">
		<td>
			脚
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
			主
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_main','options' => $this->_tpl_vars['arrAssaultMainSelect'],'selected' => $this->_tpl_vars['data']['assault_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Main -->
<!-- Assault_Sub -->
	<tr bgcolor="#99FFCC">
		<td>
			副
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_sub','options' => $this->_tpl_vars['arrAssaultSubSelect'],'selected' => $this->_tpl_vars['data']['assault_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Sub -->
<!-- Assault_Assist -->
	<tr bgcolor="#99FFCC">
		<td>
			補
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_assist','options' => $this->_tpl_vars['arrAssaultAssistSelect'],'selected' => $this->_tpl_vars['data']['assault_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Assist -->
<!-- Assault_Special -->
	<tr bgcolor="#99FFCC">
		<td>
			特
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'assault_special','options' => $this->_tpl_vars['arrAssaultSpecialSelect'],'selected' => $this->_tpl_vars['data']['assault_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Assault_Special -->
<!-- Heavy_Main -->
	<tr bgcolor="#FF99FF">
		<td>
			主
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_main','options' => $this->_tpl_vars['arrHeavyMainSelect'],'selected' => $this->_tpl_vars['data']['heavy_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Main -->
<!-- Heavy_Sub -->
	<tr bgcolor="#FF99FF">
		<td>
			副
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_sub','options' => $this->_tpl_vars['arrHeavySubSelect'],'selected' => $this->_tpl_vars['data']['heavy_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Sub -->
<!-- Heavy_Assist -->
	<tr bgcolor="#FF99FF">
		<td>
			補
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_assist','options' => $this->_tpl_vars['arrHeavyAssistSelect'],'selected' => $this->_tpl_vars['data']['heavy_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Assist -->
<!-- Heavy_Special -->
	<tr bgcolor="#FF99FF">
		<td>
			特
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'heavy_special','options' => $this->_tpl_vars['arrHeavySpecialSelect'],'selected' => $this->_tpl_vars['data']['heavy_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Heavy_Special -->
<!-- Snipe_Main -->
	<tr bgcolor="#FFFF99">
		<td>
			主
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_main','options' => $this->_tpl_vars['arrSnipeMainSelect'],'selected' => $this->_tpl_vars['data']['snipe_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Main -->
<!-- Snipe_Sub -->
	<tr bgcolor="#FFFF99">
		<td>
			副
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_sub','options' => $this->_tpl_vars['arrSnipeSubSelect'],'selected' => $this->_tpl_vars['data']['snipe_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Sub -->
<!-- Snipe_Assist -->
	<tr bgcolor="#FFFF99">
		<td>
			補
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_assist','options' => $this->_tpl_vars['arrSnipeAssistSelect'],'selected' => $this->_tpl_vars['data']['snipe_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Assist -->
<!-- Snipe_Special -->
	<tr bgcolor="#FFFF99">
		<td>
			特
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'snipe_special','options' => $this->_tpl_vars['arrSnipeSpecialSelect'],'selected' => $this->_tpl_vars['data']['snipe_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Snipe_Special -->
<!-- Support_Main -->
	<tr bgcolor="#33FF99">
		<td>
			主
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_main','options' => $this->_tpl_vars['arrSupportMainSelect'],'selected' => $this->_tpl_vars['data']['support_main'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Main -->
<!-- Support_Sub -->
	<tr bgcolor="#33FF99">
		<td>
			副
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_sub','options' => $this->_tpl_vars['arrSupportSubSelect'],'selected' => $this->_tpl_vars['data']['support_sub'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Sub -->
<!-- Support_Assist -->
	<tr bgcolor="#33FF99">
		<td>
			補
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_assist','options' => $this->_tpl_vars['arrSupportAssistSelect'],'selected' => $this->_tpl_vars['data']['support_assist'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Assist -->
<!-- Support_Special -->
	<tr bgcolor="#33FF99">
		<td>
			特
		</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'support_special','options' => $this->_tpl_vars['arrSupportSpecialSelect'],'selected' => $this->_tpl_vars['data']['support_special'],'class' => 'select'), $this);?>

		</td>
	</tr>
<!-- /Support_Special -->
	<tr>
		<td colspan="2">
			<input type="submit" value="チップ選択へ" />
		</td>
	</tr>

</table>
<!-- /TABLE user_select_space -->
</form>

</body>
</html>