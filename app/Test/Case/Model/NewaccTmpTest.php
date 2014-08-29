<?php
App::uses('NewaccTmp', 'Model');

/**
 * NewaccTmp Test Case
 *
 */
class NewaccTmpTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.newacc_tmp'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NewaccTmp = ClassRegistry::init('NewaccTmp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NewaccTmp);

		parent::tearDown();
	}

}
