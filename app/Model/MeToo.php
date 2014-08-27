<?php
App::uses('AppModel', 'Model');
/**
 * MeToo Model
 *
 * @property TeachMe $TeachMe
 * @property Account $Account
 */
class MeToo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TeachMe' => array(
			'className' => 'TeachMe',
			'foreignKey' => 'teach_me_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
