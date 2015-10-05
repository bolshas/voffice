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
        
        $this->Departments->save($this->Departments->newEntity(['name' => 'root']));
        $this->Departments->save($this->Departments->newEntity(['name' => 'corporate', 'parent_id' => 1]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'leasing', 'parent_id' => 2]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'cards', 'parent_id' => 1]));
        $this->Departments->save($this->Departments->newEntity(['name' => 'corporate', 'parent_id' => 4]));
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
		$this->assertContains('--corporate', $list);
    }
}
