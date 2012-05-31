<?php if ( ! empty($error_string)):?>
<div class="row">
	<div class="alert alert-block alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><?php echo lang('general_error_label'); ?>!</h4>
		<?php echo $error_string;?>
	</div>
</div>
<?php endif; ?>

<div class="row">
	<div class="account-container">
		<div class="account-content clearfix">

			<h1><?php echo lang('user_register_header') ?></h1>

			<p>
				<span id="active_step" class="label label-info"><?php echo lang('user_register_step1') ?></span> -&gt;
				<span class="label"><?php echo lang('user_register_step2') ?></span>
			</p>

			<?php echo form_open('register', array('id' => 'register', 'class'=>'form-horizontal')); ?>

				<?php if ( ! Settings::get('auto_username')): ?>
					<div class="control-group">
						<label for="username" class="control-label">
							<?php echo lang('user_username') ?>
						</label>
						<div class="controls">
							<input type="text" name="username" maxlength="100" value="<?php echo $_user->username; ?>" />
						</div>
					</div>
				<?php endif; ?>

				<div class="control-group">
					<label for="email" class="control-label">
						<?php echo lang('user_email') ?>
					</label>
					<div class="controls">
						<input type="text" name="email" maxlength="100" value="<?php echo $_user->email; ?>" />
						<?php echo form_input('d0ntf1llth1s1n', ' ', 'class="default-form" style="display:none"'); ?>
					</div>
				</div>

				<div class="control-group">
					<label for="password" class="control-label">
						<?php echo lang('user_password') ?>
					</label>
					<div class="controls">
						<input type="password" name="password" maxlength="100" />
					</div>
				</div>

				<?php foreach($profile_fields as $field) { if($field['required'] and $field['field_slug'] != 'display_name') { ?>
					<div class="control-group">
						<label for="<?php echo $field['field_slug']; ?>" class="control-label">
							<?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?>
						</label>
						<div class="controls">
							<?php echo $field['input']; ?>
						</div>
					</div>
				<?php } } ?>

				<div class="form-actions">
					<button class="btn btn-primary" type="submit" name="btnSubmit"><?php echo lang('user_register_btn') ?></button>		
				</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>