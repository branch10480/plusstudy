<?php
App::uses('Component', 'Controller');
class MyAuthComponent extends Component {

	// 認証済みかどうか調べる
    public function isAuth($controller) {
   		if($controller->Session->check('id')) {
			// 認証済み
		} 
		else {
			// 今ログイン画面なら何もしない
			if($controller->name === 'Accounts' && 
			   $controller->action === 'index') {
				return;
			}

			// ログイン画面へリダイレクト
			return $controller->redirect(array('controller' => 'Accounts', 'action' => 'index'));				
		}
    }
}