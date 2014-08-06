<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Seminar $Seminar
 * @property Account $Account
 * @property Comment $Comment
 */
class Question extends AppModel {


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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'question_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
