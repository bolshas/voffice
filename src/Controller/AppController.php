<?php

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
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
