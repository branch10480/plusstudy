<?php
/**
 * MeTooFixture
 *
 */
class MeTooFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'teach_me_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'resolved' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'teach_me_id' => 1,
			'account_id' => 1,
			'resolved' => 'Lorem ipsum dolor sit ame'
		),
	);

}
