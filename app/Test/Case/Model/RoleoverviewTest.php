<?php
App::uses('Roleoverview', 'Model');

/**
 * Roleoverview Test Case
 *
 */
class RoleoverviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.roleoverview'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Roleoverview = ClassRegistry::init('Roleoverview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Roleoverview);

		parent::tearDown();
	}

}
