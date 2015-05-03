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
 * Ajaxでコメントの追加処理を行う
 * @return void
 */
	public function add() {
		// ログインしていなかったら追加処理は行わない
	   	if(!$this->Session->check('Auth')) {
			exit();
		}

		// ajaxテンプレート化
		$this->layout = "ajax";

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
			$options = array('conditions' => array('Comment.id' => $newRecord['Comment']['id']));
			$comment = $this->Comment->find('first', $options);

			// Viewに情報を渡す
			$this->autoRender = false;
			$this->autoLayout = false;
			$response = array(
				'comment' => $comment['Comment'],
				'account' => $comment['Account']);
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		// エラー
		$this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
	}

/**
 * get method
 * Ajaxで追加されたコメントを取得する
 * @return void
 */
	public function get() {
		// 直接アクセスの場合はTOPへリダイレクト
		if($this->request->is('get')) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// ajaxテンプレート化
		$this->layout = "ajax";

		// Ajax処理
		if($this->request->is('ajax')) {
			// 該当する質問のコメントを取得
			$options = array(
				'conditions' => array('question_id' => $this->request->data['question_id']),
				);
			$comments = $this->Comment->find('all', $options);

			// 件数が増えていたらデータ取得
			$this->autoRender = false;
			$this->autoLayout = false;
			if($this->request->data['cnt'] < count($comments)) {
				$response = array(
					'result' => true,
					'comment' => $comments[$this->request->data['cnt']]['Comment'],
					'account' => $comments[$this->request->data['cnt']]['Account']);
			}
			else {
				$response = array('result' => false);
			}
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
	}
}
