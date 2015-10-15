<?php
echo $this->Html->scriptBlock("$('form,input,select,textarea').attr('autocomplete', 'off');", ['block' => true]);
?>
<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add User</h3>
				<div class="box-body">
					<?php
					echo $this->Form->create();
					?>
					<input style="display:none" type="email" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepasswordremembered"/>
					<?
					echo $this->Form->input('name');
					echo $this->Form->input('email');
					echo $this->Form->input('password');
					echo $this->Form->submit(__('Save'));
					?>					
				</div>
			</div>
		</div>	
	</div>
</div>


<?php
if (isset($errors)) {
	pr($errors);
}