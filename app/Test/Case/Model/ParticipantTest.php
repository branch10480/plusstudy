<?php
App::uses('Participant', 'Model');

/**
 * Participant Test Case
 *
 */
class ParticipantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.participant',
		'app.seminar',
		'app.seminar_image',
		'app.account',
		'app.comment',
		'app.question',
		'app.me_too',
		'app.teach_me'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Participant = ClassRegistry::init('Participant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Participant);

		parent::tearDown();
	}

}
