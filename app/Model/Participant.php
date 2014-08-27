<?php
App::uses('AppModel', 'Model');
/**
 * Participant Model
 *
 * @property Seminar $Seminar
 * @property Account $Account
 */
class Participant extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Seminar' => array(
			'className' => 'Seminar',
			'foreignKey' => 'seminar_id',
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
