<div class="page-header">
	<h2 id="page_title" class="page-title">
		<?php echo ($this->current_user->id !== $_user->id) ? sprintf(lang('user_edit_title'), $_user->display_name) : lang('profile_edit') ?>
	</h2>	
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


<?php echo form_open_multipart('', array('id'=>'user_edit','class'=>'form-horizontal'));?>

<fieldset id="profile_fields">
	<legend><?php echo lang('user_details_section') ?></legend>

	<div class="control-group">
		<label for="display_name" class="control-label">
			<?php echo lang('profile_display_name'); ?>
		</label>
		<div class="controls">
			<input type="text" name="display_name" value="<?php echo set_value('display_name', $display_name) ?>" >
		</div>
	</div>

	<?php foreach($profile_fields as $field) { if($field['input']) { ?>
		<div class="control-group">
			<label for="<?php echo $field['field_slug']; ?>" class="control-label">
				<?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?>
				<?php if ($field['required']){ ?> <span>*</span><?php } ?>
			</label>
			<div class="controls">
				<?php echo $field['input']; ?>
				<?php if($field['instructions']) { echo '<p class="help-block">'.$field['instructions'].'</p>'; } ?>
			</div>
		</div>
	<?php } } ?>
</fieldset>

<fieldset id="user_names">
	<legend><?php echo lang('user_email_label') ?></legend>
	<div class="control-group">
		<label for="email" class="control-label">
			<?php echo lang('user_email_label'); ?>
		</label>
		<div class="controls">
			<?php echo form_input('email', $_user->email); ?>
		</div>
	</div>
</fieldset>

<fieldset id="user_password">
	<legend><?php echo lang('user_password_section') ?></legend>
	<div class="control-group">
		<label for="password" class="control-label">
			<?php echo lang('user_password'); ?>
		</label>
		<div class="controls">
			<?php echo form_password('password', '', 'autocomplete="off"'); ?>
		</div>
	</div>
</fieldset>

<?php if (Settings::get('api_enabled') and Settings::get('api_user_keys')): ?>
	
<script>
jQuery(function($) {
	
	$('input#generate_api_key').click(function(){
		
		var url = "<?php echo site_url('api/ajax/generate_key') ?>",
			$button = $(this);
		
		$.post(url, function(data) {
			$button.prop('disabled', true);
			$('span#api_key').text(data.api_key).parent('li').show();
		}, 'json');
		
	});
	
});
</script>
	
<fieldset>
	<legend><?php echo lang('profile_api_section') ?></legend>
	
	<ul>
		<li <?php $api_key or print('style="display:none"') ?>><?php echo sprintf(lang('api:key_message'), '<span id="api_key">'.$api_key.'</span>'); ?></li>
		<li>
			<input type="button" id="generate_api_key" value="<?php echo lang('api:generate_key') ?>" />
		</li>
	</ul>

</fieldset>
<?php endif; ?>

<div class="form-actions">
	<button class="btn btn-primary" type="submit" name=""><?php echo lang('profile_save_btn') ?></button>		
</div>

<?php echo form_close(); ?>

