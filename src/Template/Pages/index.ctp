<?php
echo $this->Html->css('/css/plugins/select2.min.css', ['block' => true]);
echo $this->Html->script('/js/plugins/select2.min.js', ['block' => true]);
echo $this->Html->scriptBlock("$('.select2').select2({tags: true});", ['block' => true]);
echo $this->Form->select('aaa', ['bbbaaaaaaaa', 'cccscsdcsdcsdcc'], ['class'=> 'form-control select2', 'multiple']);

?>