<?php
App::uses('Seminar', 'Model');

/**
 * Seminar Test Case
 *
 */
class SeminarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.seminar',
		'app.seminar_image',
		'app.account',
		'app.comment',
		'app.question',
		'app.me_too',
		'app.participant',
		'app.teach_me'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Seminar = ClassRegistry::init('Seminar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Seminar);

		parent::tearDown();
	}

}
