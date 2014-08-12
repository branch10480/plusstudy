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
 *
 * @return void
 */
	public function index() {

		$msg = '';

	   	if($this->Session->check('id')) {
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
				$this->Session->write('id', $account['Account']['id']);
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
 *
 * @return void
 */
	public function top() {	

		$msg = '';
		if($this->request->is('post')) {
			// ログアウト
			$this->Session->delete('id');
			return $this->redirect(array('action' => 'index'));			
		}

		if($this->Session->check('id')) {
			// セッションのIDを元にデータを取得ｓる
			$options = array(
				'conditions' => array(
						'Account.' . $this->Account->primaryKey => $this->Session->read('id')
					)
			);
			$account = $this->Account->find('first', $options);
			$msg = 'こんにちは'.$account['Account']['mailaddress'].'さん';
		}

		$this->set("msg", $msg);
	}

/**
 * profile method
 * プロフィールページ
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile($id = null) {

		// idが入っていなかったら自分のidを入れる
		if($id === null) {
			$id = $this->Session->read('id');
		}

		// 指定されたIDを元にアカウント情報を取得してViewに渡す
		$options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
		$this->set('account', $this->Account->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Account->create();
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Account->exists($id)) {
			throw new NotFoundException(__('Invalid account'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Account.' . $this->Account->primaryKey => $id));
			$this->request->data = $this->Account->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Account->id = $id;
		if (!$this->Account->exists()) {
			throw new NotFoundException(__('Invalid account'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Account->delete()) {
			$this->Session->setFlash(__('The account has been deleted.'));
		} else {
			$this->Session->setFlash(__('The account could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
