<?php
App::uses('TeachMe', 'Model');

/**
 * TeachMe Test Case
 *
 */
class TeachMeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teach_me',
		'app.account',
		'app.comment',
		'app.question',
		'app.seminar',
		'app.seminar_image',
		'app.tmp',
		'app.participant',
		'app.me_too'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeachMe = ClassRegistry::init('TeachMe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeachMe);

		parent::tearDown();
	}

}
