<?php
foreach($departmentsList as $department) {
	echo $department . "<br>" . "\n";
}
echo $this->Html->link('Add department', ['action' => 'add']);