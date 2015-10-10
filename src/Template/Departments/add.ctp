<?php
echo $this->Form->create();
echo $this->Form->input('name');
echo $this->Form->input('parent_id', ['options' => $departments]);
echo $this->Form->button('Add Department');
echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}
