<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class DepartmentsTableTest extends TestCase
{
    public $fixtures = ['app.departments'];

    public function setUp()
    {
        parent::setUp();
        $this->Departments = TableRegistry::get('Departments');
    }

    public function tearDown()
    {
        unset($this->Departments);
        parent::tearDown();
    }

    public function testInitialize()
    {
		$this->Departments->recover();
		$node = $this->Departments->get(2);
		$this->assertEquals($node->parent_id, 1);
    }
    
    public function testTreeList()
    {
    	$list = $this->Departments->find('treeList', ['spacer' => '-']);
		$this->assertContains('--Cards', $list);
    }
}
