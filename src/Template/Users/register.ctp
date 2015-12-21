<?php
echo $this->Html->css('/plugins/iCheck/square/blue.css', ['block' => true]);
echo $this->Html->script('/plugins/iCheck/icheck.min.js', ['block' => true]);
echo $this->Html->scriptBlock("
	$(function () {
		$('#email').focus();
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    ", ['block' => true]);
    
$this->Form->templates([
		'inputContainer' => '{{content}}',
		'submitContainer' => '{{content}}'
	]);
?>

<div class="login-box">
	<div class="login-logo">
		<a href="/"><b>Virtual</b>Office</a>
	</div>
  	<div class="login-box-body">
        <p class="login-box-msg">Register to <b>Vitual</b>Office</p>

		<?= $this->Form->create(); ?>
		<input style="display:none" type="email" name="fakeusernameremembered"/>
		<input style="display:none" type="password" name="fakepasswordremembered"/>
		
		<div class="form-group has-feedback <?= array_key_exists('name', $errors) ? 'has-error' : '' ?>">
			<?= $this->Form->input('name', ['label' => false, 'placeholder' => 'Your name', 'aria-describedby' => 'help-block-name']); ?>
			<span class="fa fa-user form-control-feedback"></span>
			<span id="help-block-email" class="help-block"><?= array_key_exists('name', $errors) ? implode(" ", $errors['name']) : '' ?></span>
		</div>
		
		<div class="form-group has-feedback <?= array_key_exists('email', $errors) ? 'has-error' : '' ?>">
			<?= $this->Form->input('email', ['label' => false, 'placeholder' => 'Email', 'aria-describedby' => 'help-block-email']); ?>
			<span class="fa fa-envelope form-control-feedback"></span>
			<span id="help-block-email" class="help-block"><?= array_key_exists('email', $errors) ? implode(" ", $errors['email']) : '' ?></span>
		</div>
		
		<div class="form-group has-feedback <?= array_key_exists('password', $errors) ? 'has-error' : '' ?>">
			<?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Password', 'aria-describedby' => 'help-block-password']); ?>
			<span class="fa fa-lock form-control-feedback"></span>
			<span id="help-block-password" class="help-block"><?= array_key_exists('password', $errors) ? implode(" ", $errors['password']) : '' ?></span>
		</div>
		
		<div class="form-group has-feedback">
			<?= $this->Form->input('password-conf', ['label' => false, 'type' => 'password', 'placeholder' => 'Confirm password']); ?>
			<span class="fa fa-lock form-control-feedback"></span>
		</div>
		
		<div class="form-group has-feedback">
			<?= $this->Form->submit('Register', ['class' => 'btn btn-primary btn-block btn-flat']); ?>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>