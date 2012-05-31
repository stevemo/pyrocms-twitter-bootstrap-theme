<div class="page-header">
	<h1><?php echo lang('user_login_header') ?></h1>
</div>

<?php if( validation_errors() ): ?>
<div class="row">
	<div class="alert alert-block alert-error span8">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><?php echo lang('general_error_label'); ?>!</h4>
		<?php echo validation_errors(); ?>
	</div>
</div>
<?php endif; ?>
		
<?php echo form_open('users/login', array('id'=>'login','class'=>'form-horizontal'), array('redirect_to' => $redirect_to)); ?>	
	<fieldset>
		<div class="control-group">
			<label for="email" class="control-label">
				<?php echo lang('user_email'); ?>
			</label>
			<div class="controls">
				<input type="email" name="email" class="span3" value="<?php echo set_value('email', ''); ?>" placeholder="<?php echo lang('user_email'); ?>">
			</div>
		</div>

		<div class="control-group">
			<label for="password" class="control-label">
				<?php echo lang('user_password'); ?>
			</label>
			<div class="controls">
				<input type="password" id="password" name="password" maxlength="20" class="span3" placeholder="<?php echo lang('user_password'); ?>" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">
				<?php echo lang('user_remember'); ?>
			</label>
			<div class="controls">
				<?php echo form_checkbox('remember', '1', FALSE); ?>
			</div>
		</div>

		<div class="form-actions">
			<button class="btn btn-primary" type="submit" name="btnLogin"><?php echo lang('user_login_btn') ?></button>		
		</div>

		<?php echo anchor('users/reset_pass', lang('user_reset_password_link'));?>
	</fieldset>
<?php echo form_close(); ?>