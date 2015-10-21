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
        <p class="login-box-msg">Sign in to start your session</p>

		<?= $this->Form->create(); ?>
		<input style="display:none" type="email" name="fakeusernameremembered"/>
		<input style="display:none" type="password" name="fakepasswordremembered"/>
		
		<div class="form-group has-feedback">
			<?= $this->Form->input('email', ['label' => false, 'placeholder' => 'Email']); ?>
			<span class="fa fa-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Password']); ?>
			<span class="fa fa-lock form-control-feedback"></span>
		</div>
			
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label>
						<?= $this->Form->checkBox('rememberMe', ['hiddenField' => false]); ?> Remember Me
					</label>
				</div>
			</div>
			<div class="col-xs-4">
				<?= $this->Form->submit('Sign in', ['class' => 'btn btn-primary btn-block btn-flat']); ?>
			</div>
		</div>
		<?= $this->Form->end(); ?>
	</div>
</div>