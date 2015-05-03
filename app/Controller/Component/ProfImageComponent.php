<?php
App::uses('Component', 'Controller');
class ProfImageComponent extends Component {

	// プロフィール画像のURLを取得
	public function getProfImage($controller) {
		$acc_data = $controller->Account->find('first', array(
			'conditions' => array(
				'id' => $controller->Session->read('Auth.id'),
			),
		));

		$url = $acc_data['Account']['img_ext'] === null ? NO_IMG_URL : PROF_IMG_PATH . $acc_data['Account']['id'] . '.' . $acc_data['Account']['img_ext'];

		return $url;
	}


}