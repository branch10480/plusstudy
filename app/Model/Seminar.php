<?php
App::uses('AppModel', 'Model');
/**
 * Seminar Model
 *
 * @property SeminarImage $SeminarImage
 * @property Account $Account
 * @property TeachMe $TeachMe
 * @property Participant $Participant
 * @property Question $Question
 */
class Seminar extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SeminarImage' => array(
			'className' => 'SeminarImage',
			'foreignKey' => 'seminar_image_id',
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
		),
		'TeachMe' => array(
			'className' => 'TeachMe',
			'foreignKey' => 'teach_me_id',
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
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'seminar_id',
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
			'foreignKey' => 'seminar_id',
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
	 *  Method Name
	 *
	 * @return  format
	 */
	public function suspendCfValidate( $data = null ) {

		if ($data == null) return false;

		$dsc = $data['Seminar']['suspend_dsc'];
		$msg = '';
		$bl = false;
		if ($dsc == '') {
			$msg = '※ 必ず参加者へのメッセージを入力してください';
		} else if (strlen($dsc) < 100) {
			$msg = '※ メッセージは100字以上お書きください';
		} else {
			$bl = true;
		}

		return array(
			'result' => $bl,
			'msg' => $msg
			);

	}

}
