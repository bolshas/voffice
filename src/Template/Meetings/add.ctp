<?php
echo $this->Html->css('/css/plugins/select2.min.css', ['block' => true]);
echo $this->Html->script('/js/plugins/select2.min.js', ['block' => true]);
echo $this->Html->scriptBlock("$('select').select2();", ['block' => true]);

echo $this->Form->create();
echo $this->Form->input('title');
echo $this->Form->input('description');
echo $this->Form->input('users._ids', ['options' => $users]);
echo $this->Form->input('customers._ids', ['options' => $customers]);

echo $this->Form->submit('Save Meeting');

echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}
?>
