<?php
/**
 * SeminarFixture
 *
 */
class SeminarFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'seminar_image_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'reservation_limit' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'place' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'teach_me_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'gj' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'start' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'end' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'upper_limit' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'seminar_image_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'reservation_limit' => '2014-08-27 09:09:57',
			'place' => 'Lorem ipsum dolor sit amet',
			'account_id' => 1,
			'teach_me_id' => 1,
			'gj' => 1,
			'start' => '2014-08-27 09:09:57',
			'end' => '2014-08-27 09:09:57',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'upper_limit' => 1
		),
	);

}
