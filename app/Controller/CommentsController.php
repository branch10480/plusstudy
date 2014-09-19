<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// 直接アクセスの場合はTOPへリダイレクト
		if($this->request->is('get')) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}
		// Ajaxでコメント追加処理を行う
		if($this->request->is('ajax')) {
			// データ追加
			$this->Comment->create(false);
			$param = array(
				'question_id' => $this->request->data['question_id'],
				'account_id' => $this->Session->read('Auth.id'),
				'content' => $this->request->data['content']
				);
			$newRecord = $this->Comment->save($param);

			// 追加したレコードのidを元に情報を取得する
			$options = array('conditions' => array('Comment.id' => $newRecord['id']));
			$comment = $this->Comment->find('first', $options);

			// Viewに情報を渡す
			$this->autoRender = false;
			$this->autoLayout = false;
			$response = array(
				'comment' => $comment['Comment'],
				'account' => $comment['Account']);
			$this->header('Content-Type: application/json');
			return json_encode($response);
			exit();
		}
		// エラー
		$this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id) {
	}
}
