<?php
echo $this->Form->create();
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('Add user');
echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}