<?php

namespace App\View\Helper;

use Cake\View\Helper;

class FrontHelper extends Helper 
{
	public $helpers = ['Html'];
	
	public function showHierarchy($children) 
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
				$out .= $this->showHierarchy($department->children);
			}
		}
		return $out . "</ul>\n";
	}
	
	public function box(array $options = [])
	{
		$defaultOptions = ['color' => 'primary', 'padding' => true, 'collapse' => false, 'remove' => false,  'title' => '', 'content' => '', 'footer' => '', 'footerClass' => ''];
		$options = array_merge($defaultOptions, $options); // override defaultoptions
		
		$color = $options['color'];
		$padding = $options['padding'] ? '' : ' no-padding';
		$headerBorder = $options['padding'] ? ' with-border' : '';

		$collapse = $options['collapse'] ? '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>' : '';
		$remove = $options['remove'] ? '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>' : '';
		$tools = $collapse || $remove ? '<div class="box-tools pull-right">' . $collapse . $remove . '</div>' : '';
		
		$header = $options['title'] ? '<div class="box-header' . $headerBorder . '"><h3 class="box-title">' . $options['title'] . '</h3>' . $tools . '</div>' : '';
		$content = '<div class="box-body' . $padding . '">' . $options['content'] . '</div>';
		$footer = $options['footer'] ? '<div class="box-footer ' . $options['footerClass'] . '">' . $options['footer'] . '</div>' : '';
		
		return '<div class="box box-' . $color .'">' . $header . $content . $footer . '</div>';
	}
	
	public function modal(array $options = [])
	{
		$defaultOptions = ['title' => '', 'content' => '', 'footer' => ''];
		$options = array_merge($defaultOptions, $options); // override defaultoptions
		
		ob_start(); ?>
		<div class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title"><?= $options['title'] ?></h4>
					</div>
					<div class="modal-body"><?= $options['content'] ?></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<? return ob_get_clean();
	}
}