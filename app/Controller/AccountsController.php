<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Account $Account
 * @property PaginatorComponent $Paginator
 */
class AccountsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('Account', 'Seminar', 'Participant', 'TeachMe');
	public $components = array('Paginator', 'MyAuth');

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
			// 認証済みかどうか調べる
			$this->MyAuth->isAuth($this);
		}

/**
 * index method
 * ログインページ
 * @return void
 */
	public function index() {

		$this->set('title_for_layout', 'PlusStudy ログイン');
		$msg = '';

	   	if($this->Session->check('Auth')) {
			// ログイン済み
			return $this->redirect(array('action' => 'top'));
		}

		if ($this->request->is('post')) {
			$options = array(
				'conditions' => array(
						'Account.mailaddress' => $this->request->data('Account.mailaddress'),
						'Account.passwd' => $this->request->data('Account.passwd')
					)
			);
			if($this->Account->find('count', $options) === 1) {

				// セッションにIDを格納
				$account = $this->Account->find('first', $options);
				$this->Session->write('Auth.id', $account['Account']['id']);
				return $this->redirect(array('action' => 'top'));
			}
			else {

				$msg = 'ユーザ名またはパスワードが間違っています';

				/* セッションテスト
				$this->Session->write('backdata', $this->request->data);
				$backdata = $this->Session->read('backdata');
				$this->request->data['Account'] = $backdata['Account'];
				*/
			}
		}

		$this->set('msg', $msg);
	}

/**
 * top method
 * トップページ
 * @return void
 */
	public function top() {

		$this->set('title_for_layout', 'PlusStudy');
		$msg = '';
		if($this->request->is('post')) {
			// ログアウト
			$this->Session->delete('Auth');
			return $this->redirect(array('action' => 'index'));
		}

		if($this->Session->check('Auth')) {
			// セッションのIDを元にデータを取得ｓる
			$options = array(
				'conditions' => array(
						'Account.' . $this->Account->primaryKey => $this->Session->read('Auth.id')
					)
			);
			$account = $this->Account->find('first', $options);
			$msg = 'こんにちは、' . $account['Account']['last_name'] . $account['Account']['first_name'] . 'さん　';
		}

		$this->set("msg", $msg);

		// ニーズ一覧を取得
		$this->set('teachmes', $this->TeachMe->find('all'));

		// セミナー一覧を取得
		$this->set('seminars', $this->Seminar->find('all'));
	}

/**
 * profile method
 * プロフィールページ
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function profile($id = null) {

		// idが入っていなかったら自分のidを入れる
		if($id === null) {
			$id = $this->Session->read('Auth.id');
		}

		// 指定されたIDを元にアカウント情報を取得してViewに渡す
		$options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
		$account = $this->Account->find('first', $options);
		$this->set('account', $account);

		// ページタイトル設定
		$this->set('title_for_layout', 'プロフィール - ' . $account['Account']['last_name'] . $account['Account']['first_name']);

		// その人が主催している勉強会の情報を取得する
		$options = array(
			'conditions' => array(
					'Seminar.account_id' => $id
				)
		);
		$this->set('myseminars', $this->Seminar->find('all', $options));

		// その人が参加予定の勉強会のIDを取得する
		$options = array(
			'conditions' => array(
					'Participant.account_id' => $id
				)
		);
		$participants = $this->Participant->find('all', $options);

		// 参加予定のIDを元に勉強会の情報を取得する
		$partseminars = array();
		foreach($participants as $participant) {
			$options = array(
				'conditions' => array(
					'Seminar.id' => $participant['Participant']['seminar_id']
				)
			);
			$partseminars[] = $this->Seminar->find('first', $options);
		}
		$this->set('partseminars', $partseminars);
	}
}