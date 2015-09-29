<?php
echo $this->Form->create();
echo $this->Form->input('name');
echo $this->Form->input('address');
echo $this->Form->input('phoneNumber');
echo $this->Form->input('email');
echo $this->Form->input('corporateId');
echo $this->Form->input('user_id', ['options' => $users]);

echo $this->Form->button('Add Customer');

echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}
