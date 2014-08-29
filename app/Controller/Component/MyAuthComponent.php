<?php
App::uses('Component', 'Controller');
class MyAuthComponent extends Component {


	//----- ログイン前でも閲覧できるページ -----
	private $allowed = array(
		'Accounts' => array(
			'index',
			'startNewAcc',			// 新規会員登録メールアドレス入力ページ
			'sentMail',					// mailAdd確認メール送信完了ページ
		),
	);


	// 認証済みかどうか調べる
	public function isAuth($controller) {
		if($controller->Session->check('Auth.id')) {
			// 認証済み
		}
		else {
			// ログイン前でも閲覧できるページの場合は何もしない
			foreach ($this->allowed as $key => $val) {
				if ($controller->name !== $key) continue;
				for ($i=0; $i<count($this->allowed[$key]); $i++) {
					if ($controller->action === $this->allowed[$key][$i]) {
						return;
					}
				}
			}

			// ログイン画面へリダイレクト
			return $controller->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}
	}


}