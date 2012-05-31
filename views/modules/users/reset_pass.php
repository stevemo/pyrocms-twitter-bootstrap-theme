<div class="page-header">
	<h2><?php echo lang('user_reset_password_title');?></h2>
</div>

<?php if(!empty($error_string)):?>
<div class="row">
	<div class="alert alert-block alert-error span8">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?php echo $error_string;?>
	</div>
</div>
<?php endif;?>

<?php if(!empty($success_string)): ?>
<div class="row">
	<div class="alert alert-block alert-success span8">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<?php echo $success_string;?>
	</div>
</div>
<?php else: ?>

<?php echo form_open('users/reset_pass', array('id'=>'reset-pass','class'=>'form-horizontal')); ?>
<fieldset>
	<legend><?php echo lang('user_reset_instructions'); ?></legend>

	<div class="control-group">
		<label for="email" class="control-label">
			<?php echo lang('user_email'); ?>
		</label>
		<div class="controls">
			<input type="email" name="email" value="<?php echo set_value('email') ?>" placeholder="<?php echo lang('user_email'); ?>">
		</div>
	</div>

	<div class="control-group">
		<label for="user_name" class="control-label">
			<?php echo lang('user_username'); ?>
		</label>
		<div class="controls">
			<input type="text" name="user_name" maxlength="40" value="<?php echo set_value('user_name'); ?>" placeholder="<?php echo lang('user_username'); ?>">
		</div>
	</div>

	<div class="form-actions">
		<button class="btn btn-primary" type="submit" name="btnSubmit"><?php echo lang('user_reset_pass_btn'); ?></button>	
	</div>


</fieldset>

<?php echo form_close(); ?>
	
<?php endif; ?>