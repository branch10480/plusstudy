<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 * @property Comment $Comment
 * @property MeToo $MeToo
 * @property Participant $Participant
 * @property Question $Question
 * @property SeminarImage $SeminarImage
 * @property Seminar $Seminar
 * @property TeachMe $TeachMe
 */
class Account extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'MeToo' => array(
			'className' => 'MeToo',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SeminarImage' => array(
			'className' => 'SeminarImage',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Seminar' => array(
			'className' => 'Seminar',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TeachMe' => array(
			'className' => 'TeachMe',
			'foreignKey' => 'account_id',
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


	/**
	 * gradeValidate method
	 *
	 * @return  boolean
	 */
	public function gradeValidate( $data = null ) {

		if ($data == null) return false;
		// debug($data);
		if (!isset($data['Account']['course'])) return false;
		if (!isset($data['Account']['grade'])) return false;

		$retVal = true;

		if ($data['Account']['course'] == 2 && $data['Account']['grade'] > 2) {
			$retVal = false;
		}

		return $retVal;
	}

}
