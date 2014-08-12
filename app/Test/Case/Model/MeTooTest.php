<?php
App::uses('MeToo', 'Model');

/**
 * MeToo Test Case
 *
 */
class MeTooTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.me_too',
		'app.account',
		'app.comment',
		'app.question',
		'app.seminar',
		'app.teach_me',
		'app.participant',
		'app.seminar_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MeToo = ClassRegistry::init('MeToo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeToo);

		parent::tearDown();
	}

}
