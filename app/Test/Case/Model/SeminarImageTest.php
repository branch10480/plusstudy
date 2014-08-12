<?php
App::uses('SeminarImage', 'Model');

/**
 * SeminarImage Test Case
 *
 */
class SeminarImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.seminar_image',
		'app.account',
		'app.comment',
		'app.question',
		'app.seminar',
		'app.teach_me',
		'app.me_too',
		'app.participant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SeminarImage = ClassRegistry::init('SeminarImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SeminarImage);

		parent::tearDown();
	}

}
