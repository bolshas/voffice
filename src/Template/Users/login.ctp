<?php

echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('login');
echo $this->Form->end();