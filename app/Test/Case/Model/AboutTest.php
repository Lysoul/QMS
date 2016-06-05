<?php
App::uses('About', 'Model');

/**
 * About Test Case
 *
 */
class AboutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.about'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->About = ClassRegistry::init('About');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->About);

		parent::tearDown();
	}

}
