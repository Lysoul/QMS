<?php
App::uses('Processoverview', 'Model');

/**
 * Processoverview Test Case
 *
 */
class ProcessoverviewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.processoverview'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Processoverview = ClassRegistry::init('Processoverview');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Processoverview);

		parent::tearDown();
	}

}
