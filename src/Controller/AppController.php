<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
	public function beforeFilter(Event $event)
    {
		$str = 'lessc -s --no-color less/main.less --clean-css="--s0" css/main.css 2>&1';
		$exec = null;
		$exec = shell_exec($str); //uncomment to update LESS files
		if ($exec) {
			$this->autoRender = false;
			echo '<pre>' . $exec . '</pre>'; // print error message to screen.
		}
	}
	
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
        	'authenticate' => [
        		'Form' => [
        			'fields' => ['username' => 'email']
        		]
        	]
        ]);
    }
}
