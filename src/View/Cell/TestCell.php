<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Test cell
 */
class TestCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    	if (isset($this->request->params['pass'][0])) {
    		$id = $this->request->params['pass'][0];
    		$this->loadModel('Users');
			try {
				$user = $this->Users->get($id, ['contain' => 'Meetings']);
			} catch (RecordNotFoundException $ex) {
				$this->Flash->error($ex->getMessage());
				return $this->redirect(['action' => 'index']);
			}
			$this->set('user', $this->Users->find('Meetings', ['Users.id' => $id])->first());
    	}
    	else {
       	}
    }
}
