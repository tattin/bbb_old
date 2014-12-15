<?php /* Smarty version 2.6.25, created on 2012-03-26 13:52:18
         compiled from set_chip.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>BBシミュレートver1.00-α</title>

</head>
<body>
<form action="/set/set_mobile.php" method="post" name="form1">
<input type="hidden" name="mode" value="chip" />
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
	<input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['val']; ?>
" />
<?php endforeach; endif; unset($_from); ?>
<table border="0" cellpadding="0" cellspacing="0" summary="user_select_space">
<tr bgcolor="#BBBBBB">
	<td width="20">装：</td>
	<td>
		<select class="select" name="armer_chip">
			<option value="">----</option>
			<option value="1" <?php if ($this->_tpl_vars['data']['armer_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
			<option value="2" <?php if ($this->_tpl_vars['data']['armer_chip'] == 2): ?>selected<?php endif; ?> >コスト２</option>
		</select>
	</td>
</tr>
<tr bgcolor="#BBBBBB">
	<td width="20">射：</td>
	<td width="100">
		<select class="select" name="revision_chip">
			<option value="">----</option>
			<option value="1" <?php if ($this->_tpl_vars['data']['revision_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
			<option value="3" <?php if ($this->_tpl_vars['data']['revision_chip'] == 3): ?>selected<?php endif; ?> >コスト３</option>
		</select>
	</td>
</tr>
<tr bgcolor="#BBBBBB">
	<td width="20">SP：</td>
	<td width="100">
		<select class="select" name="sp_chip">
			<option value="">----</option>
			<option value="1" <?php if ($this->_tpl_vars['data']['sp_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
			<option value="3" <?php if ($this->_tpl_vars['data']['sp_chip'] == 3): ?>selected<?php endif; ?> >コスト３</option>
		</select>
	</td>
</tr>
<tr bgcolor="#BBBBBB">
	<td width="20">武：</td>
	<td width="100">
		<select class="select" name="change_chip">
			<option value="">----</option>
			<option value="1" <?php if ($this->_tpl_vars['data']['change_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
			<option value="3" <?php if ($this->_tpl_vars['data']['change_chip'] == 3): ?>selected<?php endif; ?> >コスト３</option>
		</select>
	</td>
</tr>
<tr bgcolor="#BBBBBB">
	<td width="20">重：</td>
	<td width="100">
		<select class="select" name="weight_chip">
			<option value="">----</option>
			<option value="1" <?php if ($this->_tpl_vars['data']['weight_chip'] == 1): ?>selected<?php endif; ?> >コスト１</option>
			<option value="3" <?php if ($this->_tpl_vars['data']['weight_chip'] == 3): ?>selected<?php endif; ?> >コスト３</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="submit" value="性能を表示" />
	</td>
</tr>
</table>
<!-- /TABLE user_select_space -->
</form>

</body>
</html>