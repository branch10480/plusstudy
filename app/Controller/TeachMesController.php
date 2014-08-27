<?php
App::uses('AppController', 'Controller');
/**
 * TeachMes Controller
 *
 * @property TeachMe $TeachMe
 * @property PaginatorComponent $Paginator
 */
class TeachMesController extends AppController {

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
 * ニーズ作成ページ
 * @return void
 */
	public function index() {
		// タイトル設定
		$this->set('title_for_layout', 'ニーズ登録');

		// エラーメッセージ初期化
		$eTitle = '';
		$eContent = '';	

		// 確認画面へ進むボタンが押された時
		if ($this->request->is('post')) {

			// フォームからデータ取得
			$title = $this->request->data['TeachMe']['title'];
			$content = $this->request->data['TeachMe']['content'];

			//-- バリデーションチェック --
			$validateResult = true;
			// ニーズタイトル
			if ($title === '') {
				$eTitle = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,20}/', $title)) {
				$eTitle = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 内容
			if ($content === '') {
				$eContent = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,50}/', $content)) {
				$eContent = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 受け渡し用Session作成
			$this->Session->write('newTeachme', $this->request->data);

			// 正しく入力されたら次画面へ
			if ($validateResult) {
				// 確認ページへ
				$this->redirect(array('action' => 'newTeachmeConfirm'));
			}
		}
		// セッションにデータが保存されている場合、フォームに自動入力する
		else if ($this->Session->check('newTeachme')) {
			$this->request->data = $this->Session->read('newTeachme');
		}			

		// Viewに値をセット
		$this->set(array(
			'eTitle' => $eTitle,
			'eContent' => $eContent
			));		
	}

/**
 * newTeachmeConfirm method
 * ニーズ登録確認ページ
 * @return void
 */
	public function newTeachmeConfirm() {
		// セッションが存在しなかったら(直接飛んできた)作成ページにリダイレクト
		if (!$this->Session->check('newTeachme')) {
			$this->redirect(array('action' => 'index'));
		}

		// セッションからデータを取得
		$newTeachme = $this->Session->read('newTeachme');
		$newTeachme = $newTeachme['TeachMe'];

		$this->set(array(
			'title' => $newTeachme['title'],
			'content' => $newTeachme['content']
			));
	}	

/**
 * register method
 * 登録完了画面
 * @return void
 */
	public function register() {
		// セッションがあればデータを登録する
		if ($this->Session->check('newTeachme')) {
			
			$newTeachme = $this->Session->read('newTeachme');
			$newTeachme = $newTeachme['TeachMe'];
			$param = array(
				'account_id' => $this->Session->read('Auth.id'),
				'title' => $newTeachme['title'],
				'content' => $newTeachme['content']
				);

			$this->TeachMe->create();
			$this->TeachMe->save($param);
			$this->Session->delete('newTeachme');
		}
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeachMe->exists($id)) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		$options = array('conditions' => array('TeachMe.' . $this->TeachMe->primaryKey => $id));
		$this->set('teachMe', $this->TeachMe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeachMe->create();
			if ($this->TeachMe->save($this->request->data)) {
				$this->Session->setFlash(__('The teach me has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teach me could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->TeachMe->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TeachMe->exists($id)) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeachMe->save($this->request->data)) {
				$this->Session->setFlash(__('The teach me has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teach me could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeachMe.' . $this->TeachMe->primaryKey => $id));
			$this->request->data = $this->TeachMe->find('first', $options);
		}
		$accounts = $this->TeachMe->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TeachMe->id = $id;
		if (!$this->TeachMe->exists()) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeachMe->delete()) {
			$this->Session->setFlash(__('The teach me has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teach me could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
