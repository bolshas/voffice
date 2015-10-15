<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DepartmentTreeHelper extends Helper 
{
	public $helpers = ['Html'];
	
	public function show($children) 
	{
		$out = "<ul class=\"tree\">\n";
		foreach ($children as $department) {
			$out .= "<li><b>" . $this->Html->link($department->name, ['action' => 'edit', $department->id]) . "</b></li>\n";
			if (!empty($department->users)) {
				$out .= "<li><ul>\n";
				foreach($department->users as $user) {
					$out .= "<li>" . $user->name . " - " . $user->_joinData['title'] . "</li>\n";
				}
				$out .= "</ul></li>\n";
			}
			if (!empty($department->children)) {
				$out .= $this->show($department->children);
			}
		}
		return $out . "</ul>\n";
	}
}