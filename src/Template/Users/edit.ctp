<?php
echo $this->Form->create();
echo $this->Form->input('name', ['default' => $user->name]);
echo $this->Form->input('email', ['default' => $user->email]);
echo $this->Form->input('password');
echo $this->Form->button('Update user');
echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}