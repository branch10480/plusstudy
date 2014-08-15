<?php
App::uses('AppController', 'Controller');
/**
 * SeminarImages Controller
 *
 * @property SeminarImage $SeminarImage
 * @property PaginatorComponent $Paginator
 */
class SeminarImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('SeminarImage');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SeminarImage->recursive = 0;
		$this->set('seminarImages', $this->Paginator->paginate());
	}





/**
 * getSmnImgs method
 *
 * @param int $accountId
 * @return void
 */
	public function getSmnImgs( $accountId = null ) {

		$result = '';
		// if ($this->RequestHandler->isAjax()) {
			// 正常処理
			// if ($this->request->is('post')) {
				// $mailaddress = $_POST['id'];
				$this->layout = 'ajax';
				$loginId = $this->Session->read('Auth.id');

				if ($accountId === null) die('アカウントIDが指定されていません');

				$params = array(
					'conditions' => array(
						'SeminarImage.account_id' => $accountId,
						), //検索条件の配列
					'recursive' => 1, //int
					// 'fields' => array('Model.field1', 'DISTINCT Model.field2'), //フィールド名の配列
					// 'order' => array('Post.post_datetime DESC'), //並び順を文字列または配列で指定
					'order' => array('SeminarImage.id DESC'), //並び順を文字列または配列で指定
					// 'group' => array('Model.field'), //GROUP BYのフィールド
					// 'limit' => $this->read_limit, //int
					// 'page' => 1, //int
					// 'offset' => n, //int
					// 'callbacks' => true //falseの他に'before'、'after'を指定できます
					);
				$result = $this->SeminarImage->find('all', $params);
			// }
		// } else {
		// 	// 不正処理
		// }
		$this->set('result', $result);
	}
















/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SeminarImage->exists($id)) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		$options = array('conditions' => array('SeminarImage.' . $this->SeminarImage->primaryKey => $id));
		$this->set('seminarImage', $this->SeminarImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SeminarImage->create();
			if ($this->SeminarImage->save($this->request->data)) {
				$this->Session->setFlash(__('The seminar image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seminar image could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->SeminarImage->Account->find('list');
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
		if (!$this->SeminarImage->exists($id)) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SeminarImage->save($this->request->data)) {
				$this->Session->setFlash(__('The seminar image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seminar image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SeminarImage.' . $this->SeminarImage->primaryKey => $id));
			$this->request->data = $this->SeminarImage->find('first', $options);
		}
		$accounts = $this->SeminarImage->Account->find('list');
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
		$this->SeminarImage->id = $id;
		if (!$this->SeminarImage->exists()) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SeminarImage->delete()) {
			$this->Session->setFlash(__('The seminar image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The seminar image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
