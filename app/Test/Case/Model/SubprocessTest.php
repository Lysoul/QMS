<?php
App::uses('Subprocess', 'Model');

/**
 * Subprocess Test Case
 *
 */
class SubprocessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subprocess',
		'app.process',
		'app.activity',
		'app.template'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subprocess = ClassRegistry::init('Subprocess');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subprocess);

		parent::tearDown();
	}

}
