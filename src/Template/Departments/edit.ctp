<?
echo $this->Form->create();
echo $this->Form->input('name', ['default' => $department->name]);
echo $this->Form->input('parent_id', ['options' => $departments, 'default' => $department->parent_id]);
echo $this->Form->button('Update Department');
echo $this->Form->end();

if (isset($errors)) {
	pr($errors);
}