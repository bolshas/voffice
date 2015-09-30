<?php
echo $this->Form->create();
echo $this->Form->input('title');
echo $this->Form->input('description');
echo $this->Form->input('users._ids', ['options' => $users]);
echo $this->Form->input('customers._ids', ['options' => $customers]);

echo $this->Form->button('Save Meeting');

echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}
