<?php /* Smarty version 2.6.25, created on 2012-06-25 13:01:47
         compiled from insert_sql.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'insert_sql.html', 13, false),array('modifier', 'count', 'insert_sql.html', 27, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=shift-jis">
<title>InsertParser</title>
<link rel="stylesheet" type="text/css" href="tw/css/bootstrap.css" />
<script type="text/javascript" src="tw/js/bootstrap.js"></script>
</head>
</head>
<body>
<div class="offset3 span6 offset3" style="margin-top:20px;">
	<form class="form-search" action="<?php echo ((is_array($_tmp=$this->_supers['server']['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method="post" name="form1">
		<div class="clearfix">
			<label for="prependedInput">format:[INSERT INTO <i>table</i>] (col1 [,col2 [,col...]]) [VALUES] (val1 [,val2 [,val...]])</label>
			<div class="input">
				<div class="input-prepend">
					<span class="add-on">SQL</span><input type="text" name="sql" value="<?php echo $this->_tpl_vars['data']['sql']; ?>
" id="prependedInput" class="medium"  />
				</div>
				<input type="hidden" name="mode" value="check" />
				<input type="submit" class="btn btn-info" value="表示" />
				<span style="color:red;"><?php echo $this->_tpl_vars['arrErr']['sql']; ?>
</span>
			</div>
		</div>
	</form>
	
	<?php if (count($this->_tpl_vars['arrList']) > 0): ?>
		<table class="table table-striped table-bordered table-condensed" width="600">
		<thead>
			<tr>
				<td width="300">col</td>
				<td width="300">val</td>
			</tr>
		</thead>
		<?php $_from = $this->_tpl_vars['arrList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
		<tbody>
			<tr>
				<td><?php echo $this->_tpl_vars['key']; ?>
</td>
				<td><?php echo $this->_tpl_vars['val']; ?>
</td>
			</tr>
		</tbody>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	<?php endif; ?>
</div>
</body>
</html>